@extends('layouts.dashboard')
@section('content')

<!-- $areas -->

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Area</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Insert Area</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" , action="{{ route('addArea') }}">
                        @CSRF
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="areaName" name="areaName" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary submitBtn float-right">SUBMIT</button>
                    </form>
                    <a href="{{ route('viewArea') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                    <br>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection