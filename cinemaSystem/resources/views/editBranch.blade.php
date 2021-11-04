@extends('layout')

@section('content')

<div class="showtimes mt-5" style="background-color: #141415;padding: 2%;">
    <div class="col-lg-3">
        <label for="area name" style="color: white; font-size: 28px;">Edit Branch</label>
    </div>
</div>

<div class="row" style="background-color: #363637;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br>
        <form method="POST" , action="{{ route('updateBranch') }}">
            @CSRF

            @foreach($branchs as $branch)
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="{{$branch->id}}">
                <label for="area name" style="color: white; font-size: 20px;">Name</label>
                <input type="text" class="form-control" id="branchName" name="branchName" value="{{$branch->name}}">
            </div>
            <div class="form-group">
                <label for="location" style="color: white; font-size: 20px;">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{$branch->location}}">
            </div>
            <div class="form-group">
                <label for="number of halls" style="color: white; font-size: 20px;">Number Of Halls</label>
                <input type="number" class="form-control" id="numberOfHalls" name="numberOfHalls" value="{{$branch->numberOfHalls}}" min="1">
            </div>
            <div class="form-group">
                <label for="seating capacity" style="color: white; font-size: 20px;">Seating Capacity</label>
                <input type="number" class="form-control" id="seatingCapacity" name="seatingCapacity" value="{{$branch->seatingCapacity}}" min="1">
            </div>
            <div class="form-group">
                <label for="area  ID" style="color: white; font-size: 20px;">Area</label>
                <select name="areaId" id="areaId" class="form-control">
                    @foreach($areas as $area)
                        <option value="{{$area->id}}"
                            @if($branch->areaId==$area->id)
                                selected
                            @endif
                        >{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary submitBtn">SUBMIT</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection