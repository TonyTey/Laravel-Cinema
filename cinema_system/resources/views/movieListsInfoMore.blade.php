@extends('layout')
@section('content')

<div class="overview-box" style="margin-top: 4.4%;background-color: #434d45;color: white;">
    <div class="box">
        <div class="box-topic text-center font-weight-bold" style="font-size: 30px;">Movie Info</div>
    </div>
</div>

<div class="" style="background-color: #434d45;color: white;">
    @foreach($movies as $movie)
    
    @endforeach
    <div class="content ml-5" style="width: 93%;">
        <div class="">
            <div class="row">
                <div class="col-sm-5" >
                    <!-- style="margin-right: 2%;" -->
                    <img src="{{ asset('images/') }}/{{$movie->image}}" width="500" alt="" class="img-fluid">
                    <div class="Trailer">
                        <label for="Trailer" style="color: white; font-size: 24px;" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">Trailer</label>
                        <video id="videoPreview" src="{{ asset('trailers/') }}/{{$movie->trailer}}" controls style="width: 105%; height: auto"></video>
                    </div>
             
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6" style="background-color: #52504a;">
                    <div class="">
                        <p id="movieName" name="movieName" class="font-weight-bold text-center" style="font-size:30px;">{{$movie->name}}</p>
                        <hr style="background-color: white; width: 500px;">
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Label</span>
                            <p id="movieLabel" name="movieLabel">{{$movie->label}}</p>
                        </div>
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Duration (Minutes)</span>
                            <p id="movieDuration" name="movieDuration">{{$movie->duration}}</p>
                        </div>
                        <div class="col-6"></div>
                    </div>

                    <br>

                    <div class="row" id="hide">
                        <div class="col-3">
                            <span  class="font-weight-bold" id="" style="font-size: 20px;">Movie Subtitle</span>
                            <p id="movieSubtitle" name="movieSubtitle" class="font-weight-lighter">English</p>
                        </div>
                        <div class="col-3">
                     
                            <span class="font-weight-bold" id="">Release Date</span>
                            <p id="movieReleaseDate" name="movieReleaseDate" class="font-weight-lighter"> 12 12 2021</p>
                        </div>
                        <div class="col-6"></div>
                    </div>

                    <br>
                 
             
                    <div class="row">
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Cast</span>
                            <p id="movieCast" name="movieCast" class="font-weight-lighter">1 2 3 4 5 6</p>
                        </div>
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Director</span>
                            <p id="movieDirector" name="movieDirector" class="font-weight-lighter">Henry</p>
                        </div>
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Distributor</span>
                            <p id="movieDistributor" name="movieDistributor" class="font-weight-lighter">Albert</p>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <br>
                    <div class="">
                        <div class="">
                            <span class="font-weight-bold" id="">Description</span>
                        </div>
                        <p id="movieDescription" name="movieDescription">{{$movie->description}}</p>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Branch</span>
                            <p id="movieBranch" name="movieBranch" class="font-weight-lighter">SUC Cinema</p>
                        </div>
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Price (RM)</span>
                            <p id="moviePrice" name="moviePrice" class="font-weight-lighter">{{$movie->price}}</p>
                        </div>
                        <div class="col-3">
                            <span class="font-weight-bold" id="">Status</span>
                            <p id="movieStatus" name="movieStatus" class="font-weight-lighter">Available</p>
                        </div>
                    </div>

                    <br>
        
                    <a href="/movieLists"><button type="submit" class="btn btn-light backBtn" style="margin-left: 46%;"><i class="fa fa-arrow-circle-left">&nbsp;Back</i></button></a>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>


@endsection