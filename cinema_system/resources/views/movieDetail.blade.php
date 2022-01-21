@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Movie</div>
    </div>
</div>

<div class="insert_area_box">
    @foreach($movieDetails as $movieDetail)
    <div class="insert_area_title">{{$movieDetail->name}}</div>
    @endforeach
    <div class="insert_area_card" style="width: 92%; margin-left: 50px;">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-5">
                    @foreach($movieDetails as $movieDetail)
                    <img src="{{ asset('images/') }}/{{$movieDetail->image}}" width="420" alt="" class="img-fluid">
                    <div class="card-footer p-4">
                        <label for="Trailer" style="color: white; font-size: 24px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">Trailer</label>
                        <video id="videoPreview" src="{{ asset('trailers/') }}/{{$movieDetail->trailer}}" controls style="width: 105%; height: auto"></video>
                    </div>
                    <div class="card-footer p-4">
                        <label for="Trailer" style="color: white; font-size: 24px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">Video</label>
                        <video id="videoPreview" src="{{ asset('storage/videos/') }}/{{$movieDetail->video}}" controls style="width: 105%; height: auto"></video>
                    </div>
                    @endforeach
                </div>
                <div class="col-sm-7">
                    @foreach($movieDetails as $movieDetail)
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                        </div>
                        <input type="text" class="form-control" id="movieID" name="movieID" value="{{$movieDetail->id}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$movieDetail->name}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Description</span>
                        </div>
                        <textarea class="form-control" id="movieDescription" name="movieDescription" value="{{$movieDetail->description}}" readonly required aria-label="With textarea">{{$movieDetail->description}}</textarea>
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Price(RM)</span>
                        </div>
                        <input type="number" step="any" class="form-control" id="moviePrice" name="moviePrice" value="{{$movieDetail->price}}" readonly required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Duration(Minutes)</span>
                        </div>
                        <input type="number" class="form-control" id="movieDuration" name="movieDuration" value="{{$movieDetail->duration}}" readonly required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Release Date</span>
                        </div>

                        <input type="date" name="movieDate" id="datepicker" size="30" required="" class="form-control" value="{{$movieDetail->releaseDate}}" readonly aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="Movie Subtitle" style="color: white; font-size: 20px;">Movie Subtitle</label>

                        <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; display: flex; justify-content: space-evenly;">
                            @foreach ($subtitles as $subtitle)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">{{$subtitle}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Cast</span>
                        </div>
                        <textarea class="form-control" id="movieCast" name="movieCast" value="{{$movieDetail->cast}}" readonly required aria-label="With textarea">{{$movieDetail->cast}}</textarea>
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Director</span>
                        </div>
                        <input type="text" class="form-control" id="movieDirector" name="movieDirector" value="{{$movieDetail->director}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Label</span>
                        </div>
                        <input type="text" class="form-control" id="movieDirector" name="movieDirector" value="{{$movieDetail->label}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                    </div>

                    <br>


                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Distributor</span>
                        </div>
                        <input type="text" class="form-control" id="movieDistributor" name="movieDistributor" value="{{$movieDetail->distributor}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="form-group" style="padding-top: 10px;">
                        <label for="Branch ID" style="color: white; font-size: 20px;">Branch </label>
                        &nbsp;&nbsp;

                        <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; justify-content: space-evenly;">
                            @foreach($branchs as $branch)
                                @foreach ($movieBranches as $movieBranch)
                                    @if($movieBranch==$branch->id)
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="branchID Checkbox" style="color: white; font-size: 20px;">{{$branch->name}}</label>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Status</span>
                        </div>
                        <input type="text" class="form-control" id="movieDistributor" name="movieDistributor" value="{{$movieDetail->status}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">

                    </div>
                    @endforeach

                    <br>

                    <a href="{{ route('viewMovie') }}"><button type="submit" class="btn btn-primary cancelBtn">BACK</button></a>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection