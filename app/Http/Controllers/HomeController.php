<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data['videos'] = Video::all();
        
        return view('index', $data);
    }
}
