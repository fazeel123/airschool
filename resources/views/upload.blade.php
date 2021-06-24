@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="d-flex justify-content-center main-top-margin">
                <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
            </div>
            
            <div class="d-flex justify-content-center main-top-margin">
                <h1>Upload Video</h1>
            </div>
            
            <div class="d-flex justify-content-center sub-top-padding content-border">
                {{-- action="{{ route('store_video') }}" --}}
                <form id="video_submit" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="upload_video">Upload Video: </label>
                        <input type="file" class="form-control" name="video" id="upload_video">
                    </div>
                    <button type="submit" class="btn btn-success sub-top-margin" id="save">Upload</button>
                    
                    <div class="d-flex justify-content-start sub-top-padding">
                        <img id="loader" src="{{ asset('css/loader.gif') }}" width="30px" height="30px">
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@push('js')

<script>
    $(document).ready(function(){

        $('#loader').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#video_submit").submit(function(e) {

            e.preventDefault();

            let formData = new FormData(this);
        
            $.ajax({
                type: "POST",
                url: "{{ route('store_video') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function(result) {
                    if (result.success) {
                        swal({
                            title: "Good job!",
                            text: result.success,
                            icon: "success",
                            button: "Thank you!",
                        }).then(function() {
                            window.location = "{{ route('index') }}";
                        });
                    } else {
                        $.each(result.errors, function(key, value) {
                            swal({
                                title: "Failed to upload!",
                                text: value,
                                icon: "error",
                                button: "Try Again!",
                            });
                        });
                    }
                },
                error: function(result) {
                    console.log(result.errors);
                }
            });
        });
    });
</script>
    
@endpush