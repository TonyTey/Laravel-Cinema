@extends('layout')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
    input[type=checkbox] {
        transform: scale(1.5);
    }

    input[type=checkbox]+label {
        color: grey;
    }

    input[type=checkbox]:checked+label {
        color: green;
        font-style: normal;
        display: inline-block;
    }
</style>

<header class="masthead mt-5" style="background-color: #434d45;">
    <div class="container pt-5">
        <div class="col-lg-12">
            <div class="row">
                @foreach($movies as $movie)
                <div class="col-md-4">
                    <img src="{{ asset('images/') }}/{{$movie->image}}" alt="movie image" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <input type="hidden" name="id" value="{{$movie->id}}">
                    <div class="card bg-dark">
                        <div class="card-body text-white">
                            <h3><b>{{$movie->name}}</b></h3>
                            <hr style="background-color: white;">
                            <div class="row">
                                <div class="col-4">
                                    <p class=""><b>Label: </b>{{$movie->label}}</p>
                                </div>
                                <div class="col-4">
                                    <p class=""><b>Subtitle: </b>{{$movie->subtitle}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p class=""><b>Duration (Minutes): </b> {{$movie->duration}} </p>
                                </div>
                                <div class="col-4">
                                    <p class=""><b>Price (RM): </b>{{$movie->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card bg-light mt-2 mb-3">
                        <form action="{{ route('movieListDetail') }}" method="post" name="bookingDetail" id="bookingDetail">
                            @CSRF
                            <div class="card-body">
                                <h4>Reserve Here</h4>

                                <input type="hidden" name="id" value="{{$movie->id}}"><input type="hidden" name="moviePrice" value="{{$movie->price}}" id="moviePrice">
                                <input type="hidden" name="movieName" value="{{$movie->name}}">
                                <div class="row">
                                    @foreach($users as $user)
                                    <div class="form-group col-md-4">
                                        <label for="name" class="control-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" readonly>
                                        <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                                    </div>
                                    @endforeach

                                    <div class="form-group col-md-4">
                                        <label for="date" class="control-label">Date</label>
                                        <!-- <input type="text" name="date" id="datepicker" size="30" required="" class="form-control"> -->
                                        <select name="date" id="date" class="form-control" name="form_select" onchange="">
                                            @foreach($dateTimes as $dateTime)
                                                <option value="{{$dateTime->date}}">{{$dateTime->date}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-dark ml-3" style="margin-top: 30px; height: 40px;">Continue</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    <br>
</header>

<script type="text/javascript">
    function showDiv(input) {
        if (input.checked) {
            document.getElementById('hidden_div').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
        }
    }
</script>

@endsection