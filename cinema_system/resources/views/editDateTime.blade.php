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
                    <form method="POST" , action="{{ route('updateDateTime') }}">
                        @CSRF

                        @foreach($dateTimes as $dateTime)

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                            </div>
                            <input type="text" name="id" id="id" size="30" value="{{$dateTime->id}}" required="" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Movie</span>
                            </div>
                            <select name="movie" id="movie" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                @foreach($movies as $movie)
                                <option value="{{$movie->name}}" @if($movie->name==$dateTime->movie) selected @endif>{{$movie->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Date</span>
                            </div>
                            <input type="date" name="movieDate" id="datepicker" size="30" value="{{$dateTime->date}}" required="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="Movie Time" style="color: white; font-size: 20px;">Time</label>

                            <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; display: flex; justify-content: space-between;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="time[]" name="time[]" value="10 AM" @foreach ($times as $time) @if($time == "10 AM" ) checked @endif @endforeach>
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">10 AM</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="time[]" name="time[]" value="1 PM" @foreach ($times as $time) @if($time == "1 PM" ) checked @endif @endforeach>
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">1 PM</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="time[]" name="time[]" value="4 PM" @foreach ($times as $time) @if($time == "4 PM" ) checked @endif @endforeach>
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">4 PM</label>
                                </div>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="time[]" name="time[]" value="7 PM" @foreach ($times as $time) @if($time == "7 PM" ) checked @endif @endforeach>
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">7 PM</label>
                                </div>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="time[]" name="time[]" value="10 PM" @foreach ($times as $time) @if($time == "10 PM" ) checked @endif @endforeach>
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">10 PM</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group" style="padding-top: 10px;">
                            <label for="Branch ID" style="color: white; font-size: 20px;">Branch </label>
                            &nbsp;&nbsp;
            
                            <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; justify-content: space-evenly;">
                                @foreach($branchs as $branch)
                                    @foreach($branchsID as $branchID)
                                        @if($branchID == $branch->id)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="branchID[]" name="branchID[]" value="{{$branch->id}}" @foreach ($branchsID as $branchID) @if($branchID == $branch->id) checked @endif @endforeach>
                                                <label class="form-check-label" for="branchID Checkbox" style="color: white; font-size: 20px;">{{$branch->name}}</label>                        
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        @endforeach
                        <br>
                        <button type="submit" class="btn btn-primary submitBtn float-right">SUBMIT</button>
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