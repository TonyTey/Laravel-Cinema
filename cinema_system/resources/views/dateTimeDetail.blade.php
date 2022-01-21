@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Date & Time</div>
    </div>
</div>

<div class="insert_area_box">
    @foreach($dateTimes as $dateTime)
    <div class="insert_area_title">{{$dateTime->movie}}</div>
    @endforeach
    <div class="insert_area_card" style="width: 92%; margin-left: 50px;">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    @foreach($dateTimes as $dateTime)
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                        </div>
                        <input type="text" class="form-control" id="movieID" name="movieID" value="{{$dateTime->id}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Movie</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$dateTime->movie}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Date</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$dateTime->date}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="Movie Time" style="color: white; font-size: 20px;">Time</label>

                        <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; display: flex; justify-content: space-evenly;">
                            @foreach($times as $time)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">{{ $time }}</label>
                            </div>
                            @endforeach

                        </div>
                    </div>


                    <div class="form-group" style="padding-top: 10px;">
                        <label for="Branch ID" style="color: white; font-size: 20px;">Branch </label>
                        &nbsp;&nbsp;

                        <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; justify-content: space-evenly;">
                            @foreach($branchs as $branch)
                            @foreach ($branchsID as $branchID)
                            @if($branchID==$branch->id)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="branchID Checkbox" style="color: white; font-size: 20px;">{{$branch->name}}</label>
                            </div>
                            @endif
                            @endforeach
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                    <br>

                    <a href="{{ route('viewDateTime') }}"><button type="submit" class="btn btn-primary cancelBtn">BACK</button></a>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection