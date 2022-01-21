@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Date & Time</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Date & Time</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" , action="{{ route('loadDateTime') }}">
                        @CSRF
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Movie</span>
                            </div>
                            <select name="movie" id="movie" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                @foreach($movies as $movie)
                                <option value="{{$movie->id}}">{{$movie->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary submitBtn float-right">NEXT</button>
                    </form>
                    <a href="{{ route('viewDateTime') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection