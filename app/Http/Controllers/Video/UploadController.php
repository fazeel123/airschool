<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use Owenoj\LaravelGetId3\GetId3;

class UploadController extends Controller
{
    public function index() 
    {

        return view('upload');
    }

    public function storeVideo(Request $request) 
    {

        if ($request->hasFile('video')) {

            $file = $request->file('video');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            // $destinationPath = public_path('/videos');
            // $file->move($destinationPath, $filename);
        
            $file->storeAs('videos', $filename);

            $path = Storage::path("videos/" . $filename);

            $getID3 = new \getID3;

            $info = $getID3->analyze($path);

            dd($info['filesize']);

            // $video = new Video;
            // $video->video_name = $filename;
            // $video->save();

        } else {
                dd('Request Has No File');
        }

        return redirect()->route('upload_video')->with('success', 'Video Upload Successfully!');

        // $file = $getID3->analyze($video->getRealPath());

    }
}
