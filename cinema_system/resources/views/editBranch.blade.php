@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Branch</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Edit Branch</div>
    <div class="insert_area_card">
        <div class="insert_area_details">

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" , action="{{ route('updateBranch') }}">
                        @CSRF

                        @foreach($branchs as $branch)

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                            </div>
                            <input type="text" class="form-control" id="id" name="id" value="{{$branch->id}}" readonly aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="branchName" name="branchName" value="{{$branch->name}}" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Location</span>
                            </div>
                            <textarea class="form-control" id="location" name="location" value="{{$branch->location}}" required aria-label="With textarea">{{$branch->location}}</textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Number Of Halls</span>
                            </div>
                            <input type="number" class="form-control" id="numberOfHalls" name="numberOfHalls" value="{{$branch->numberOfHalls}}" min="1" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Seating Capacity</span>
                            </div>
                            <input type="number" class="form-control" id="seatingCapacity" name="seatingCapacity" value="{{$branch->seatingCapacity}}" min="1" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Area</span>
                            </div>
                            <select name="areaId" id="areaId" class="form-control" required>
                                @foreach($areas as $area)
                                <option value="{{$area->id}}" @if($branch->areaId==$area->id)
                                    selected
                                    @endif>{{$area->name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary submitBtn">UPDATE</button>
                        @endforeach
                    </form>
                    <a href="{{ route('viewBranch') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br><br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</div>

@endsection