<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreVideoRequest;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'video' => 'required|file|mimetypes:video/mp4,video/mpeg,video/x-matroska',
        ]);

        if ($validate->fails()) {

            return response()->json(['errors' => $validate->errors()->all()]);
        
        } else {

            $video = Video::create([
                'disk'          => 'videos_disk',
                'original_name' => $request->video->getClientOriginalName(),
                'path'          => $request->video->store('videos', 'videos_disk'),
                'title'         => $request->title,
            ]);

            ConvertVideoForDownloading::dispatch($video);
            ConvertVideoForStreaming::dispatch($video);

            return response()->json(['success' => 'Video Upload Successfully!']);
        }
    }

    public function view($id) {
        
        $data['streamUrl'] = asset('streamable_videos/' . $id . '.m3u8');
        return view('view', $data);
    }
}
