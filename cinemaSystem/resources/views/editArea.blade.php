@extends('layout')

@section('content')

<div class="showtimes mt-5" style="background-color: #141415;padding: 2%;">
    <div class="col-lg-3">
        <label for="area name" style="color: white; font-size: 28px;">Edit Area</label>
    </div>
</div>

<div class="row" style="background-color: #363637;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <form method="POST" , action="{{ route('updateArea') }}">
            @CSRF

            @foreach($areas as $area)
            <div class="form-group">
                <input type="hidden" class="form-control" id="areaId" name="areaId" value="{{$area->id}}">
                <label for="area name" style="color: white; font-size: 20px;">Name</label>
                <input type="text" class="form-control" id="areaName" name="areaName" value="{{$area->name}}">
            </div>
            <button type="submit" class="btn btn-primary submitBtn">SUBMIT</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection