@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Movie</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Movie</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br><br>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h5>Upload Video</h5>
                                </div>

                                <div class="card-body">
                                    <div id="upload-container" class="text-center">
                                        <button id="browseFile" class="btn btn-primary">Browse File</button>

                                    </div>
                                    <div style="display: none" class="progress mt-3" style="height: 25px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                                    </div>
                                </div>
                            

                                <div class="card-footer p-4" style="display: none">
                                    <video id="videoPreview" src="" controls style="width: 100%; height: auto"></video>
                                    <form method="POST" action="{{ route('addMovie') }}" enctype="multipart/form-data">
                                        @CSRF
                                        <input type="hidden" name="movieName" value="{{$movieName}}">
                                        <input type="hidden" name="movieDescription" value="{{$movieDescription}}">
                                        <input type="hidden" name="moviePrice" value="{{$moviePrice}}">
                                        <input type="hidden" name="movieImage" value="{{$movieImage}}">
                                        <input type="hidden" name="movieTrailer" value="{{$movieTrailer}}">
                                        <input type="hidden" id="movieVideo" name="movieVideo" value="">
                                        <input type="hidden" name="movieDuration" value="{{$movieDuration}}">
                                        <input type="hidden" name="movieDate" value="{{$movieDate}}">
                                        <input type="hidden" name="subtitle" value="{{$subtitles}}">
                                        <input type="hidden" name="movieCast" value="{{$movieCast}}">
                                        <input type="hidden" name="movieDirector" value="{{$movieDirector}}">
                                        <input type="hidden" name="label" value="{{$label}}">
                                        <input type="hidden" name="movieDistributor" value="{{$movieDistributor}}">
                                        <input type="hidden" name="branchID" value="{{$branchID}}">
                                        <input type="hidden" name="status" value="{{$status}}">

                                        <button id="submit" type="submit" class="btn btn-primary" style="margin-left: 350px;">Close</button>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('viewMovie') }}"><button type="submit" id="cancelBtn" class="btn btn-primary cancelBtn" onclick="cal()">CANCEL</button></a>
                        </div>
                    </div>
                    <br><br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Bootstrap JS Bundle with Popper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- Resumable JS -->
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function cal() {
        alert("You didn't upload any video.You will be direct back to movie list")
    }

    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('videoUpload') }}',
        query: { _token: '{{ csrf_token() }}'}, // CSRF token
        fileType: ['mp4'],
        chunkSize: 10 * 1024 * 1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        headers: {
            'Accept': 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function(file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function(file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        alert('video upload successfully');
        $("#cancelBtn").hide();
        $('#videoPreview').attr('src', response.path);
        $('#movieVideo').attr('value', response.filename);
        $('.card-footer').show();
    });

    resumable.on('fileError', function(file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');

    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>


@endsection