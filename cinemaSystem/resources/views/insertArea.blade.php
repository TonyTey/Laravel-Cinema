@extends('layout')

@section('content')

<div class="showtimes mt-5" style="background-color: #141415;padding: 2%;">
    <div class="col-lg-3">
        <label for="area name" style="color: white; font-size: 28px;">Create new Area</label>
    </div>
</div>

<div class="row" style="background-color: #363637;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <form method="POST" , action="{{ route('addArea') }}">
            @CSRF
            <div class="form-group">
                <label for="area name" style="color: white; font-size: 20px;">Name</label>
                <input type="text" class="form-control" id="areaName" name="areaName">
            </div>
                <button type="submit" class="btn btn-primary submitBtn">SUBMIT</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection