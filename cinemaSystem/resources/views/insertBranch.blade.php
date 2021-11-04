@extends('layout')

@section('content')

<div class="showtimes mt-5" style="background-color: #141415;padding: 2%;">
    <div class="col-lg-3">
        <label for="area name" style="color: white; font-size: 28px;">Create new Branch</label>
    </div>
</div>

<div class="row" style="background-color: #363637;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <form method="POST" , action="{{ route('addBranch') }}">
            @CSRF
            <div class="form-group">
                <label for="branch name" style="color: white; font-size: 20px;">Name</label>
                <input type="text" class="form-control" id="branchName" name="branchName">
            </div>
            <div class="form-group">
                <label for="location" style="color: white; font-size: 20px;">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>
            <div class="form-group">
                <label for="number of halls" style="color: white; font-size: 20px;">Number Of Halls</label>
                <input type="number" class="form-control" id="numberOfHalls" name="numberOfHalls" value="1" min="1">
            </div>
            <div class="form-group">
                <label for="seating capacity" style="color: white; font-size: 20px;">Seating Capacity</label>
                <input type="number" class="form-control" id="seatingCapacity" name="seatingCapacity" value="1" min="1">
            </div>
            <div class="form-group">
                <label for="area  ID" style="color: white; font-size: 20px;">Area</label>
                <select name="areaId" id="areaId" class="form-control">
                    @foreach($areas as $areaID)
                        <option value="{{$areaID->id}}">{{$areaID->name}}</option>
                    @endforeach

                </select>
            </div>
                <button type="submit" class="btn btn-primary submitBtn">SUBMIT</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection