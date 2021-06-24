@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row">
            <div class="d-flex justify-content-end main-top-margin">
                <a href="{{ route('upload_video') }}" class="btn btn-primary">Upload Video</a>
            </div>
        </div>

        <div class="row">    
            <div class="d-flex justify-content-center sub-top-padding">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Video Name</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td><a href="{{ route('view_video', [$video->id]) }}">{{$video->title }}</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
@endsection