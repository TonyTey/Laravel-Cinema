@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Branch</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Branch</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" , action="{{ route('addBranch') }}">
                        @CSRF
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="branchName" name="branchName" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Location</span>
                            </div>
                            <textarea class="form-control" id="location" name="location" required aria-label="With textarea"></textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Number Of Halls</span>
                            </div>
                            <input type="number" class="form-control" id="numberOfHalls" name="numberOfHalls" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Seating Capacity</span>
                            </div>
                            <input type="number" class="form-control" id="seatingCapacity" name="seatingCapacity" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Area</span>
                            </div>

                            <select name="areaId" id="areaId" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                @foreach($areas as $areaID)
                                <option value="{{$areaID->id}}">{{$areaID->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary submitBtn float-right">SUBMIT</button>
                    </form>
                    <a href="{{ route('viewBranch') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection