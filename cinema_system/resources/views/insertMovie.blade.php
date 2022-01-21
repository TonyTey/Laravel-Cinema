@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Movie</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Movie</div>
    <div class="insert_area_card" style="width: 90%; margin-left: 60px;">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" action="{{ route('insertDetails') }}" enctype="multipart/form-data">
                        @CSRF
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="movieName" name="movieName" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Description</span>
                            </div>
                            <textarea class="form-control" id="movieDescription" name="movieDescription" required aria-label="With textarea"></textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Price(RM)</span>
                            </div>
                            <input type="number" step="any" class="form-control" id="moviePrice" name="moviePrice" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Image</span>
                            </div>
                            <input type="file" class="form-control" id="movieImage" name="movieImage" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <p style="color: red;">
                            @if($errors->has('movieImage'))
                                {{ $errors->first('movieImage') }}
                            @endif
                        </p>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Trailer</span>
                            </div>
                            <input type="file" class="form-control" id="movieTrailer" name="movieTrailer" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <p style="color: red;">
                            @if($errors->has('movieTrailer'))
                                {{ $errors->first('movieTrailer') }}
                            @endif
                        </p>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Duration</span>
                            </div>
                            <input type="number" class="form-control" id="movieDuration" name="movieDuration" required value="1" min="1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Release Date</span>
                            </div>

                            <input type="date" name="movieDate" id="datepicker" size="30" required="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="Movie Subtitle" style="color: white; font-size: 20px;">Movie Subtitle</label>
            
                            <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; display: flex; justify-content: space-evenly;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="subtitle[]" name="subtitle[]" value="Malay">
                                    <label class="form-check-label" for="Malay Checkbox" style="color: white; font-size: 20px;">Malay</label>
                                </div>
            
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="subtitle[]" name="subtitle[]" value="Chinese">
                                    <label class="form-check-label" for="Chinese Checkbox" style="color: white; font-size: 20px;">Chinese</label>
                                </div>
            
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="subtitle[]" name="subtitle[]" value="English">
                                    <label class="form-check-label" for="English Checkbox" style="color: white; font-size: 20px;">English</label>
                                </div>
                            </div>
                        </div>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Cast</span>
                            </div>
                            <textarea class="form-control" id="movieCast" name="movieCast" required aria-label="With textarea"></textarea>
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Director</span>
                            </div>
                            <input type="text" class="form-control" id="movieDirector" name="movieDirector" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Label</span>
                            </div>

                            <select name="label" id="label" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                <option value="P13">P13</option>
                                <option value="P18">P18</option>
                                <option value="P21">P21</option>
                            </select>

                        </div>

                        <br>
                    

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Distributor</span>
                            </div>
                            <input type="text" class="form-control" id="movieDistributor" name="movieDistributor" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                        
                        <div class="form-group" style="padding-top: 10px;">
                            <label for="Branch ID" style="color: white; font-size: 20px;">Branch </label>
                            &nbsp;&nbsp;
            
                            <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc; justify-content: space-evenly;">
                                @foreach($branchs as $branch)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="branchID[]" name="branchID[]" value="{{$branch->id}}">
                                        <label class="form-check-label" for="branchID Checkbox" style="color: white; font-size: 20px;">{{$branch->name}}</label>                        
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Status</span>
                            </div>

                            <select name="status" id="status" class="form-control" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not available</option>
                            </select>
                        </div>

                        <br>

                        
                        <button type="submit" class="btn btn-primary submitBtn float-right" onclick="cal()">SUBMIT</button>
                    </form>
                    <a href="{{ route('viewMovie') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

<script type="text/javascript">
    function cal() {
        alert('You will be continue to upload video');
    }

</script>


@endsection