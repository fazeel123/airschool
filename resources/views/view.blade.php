@extends('layouts.app')

@push('css')
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
@endpush

@section('content')

<div class="container">
    <div class="row">

        <div class="d-flex justify-content-center main-top-margin">
            <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
        </div>
        
        <div class="d-flex justify-content-center sub-top-padding">
            <video-js id="play_video" class="vjs-default-skin" controls preload="auto" width="700" height="300">
                <source src="{{ $streamUrl }}" type="application/x-mpegURL">
            </video-js>
        </div>
    </div>
</div>
    
@endsection

@push('js')

    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js"></script>

    <script>
        var player = videojs('play_video');
    </script>
@endpush