@extends('layouts.dashboard')
@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Category</div>
    </div>
</div>

<div class="insert_area_box">
    <div class="insert_area_title">Edit Category</div>
    <div class="insert_area_card">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <br>
                    <form method="POST" , action="{{ route('updateCategory') }}">
                        @CSRF

                        @foreach($categories as $category)
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">ID</span>
                            </div>
                            <input type="text" class="form-control" id="id" name="id" value="{{$category->id}}" readonly aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>

                        <br>

                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Name</span>
                            </div>
                            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                        @endforeach

                        <br>
                        <button type="submit" class="btn btn-primary submitBtn">UPDATE</button>
                    </form>
                    <a href="{{ route('viewCategory') }}"><button type="submit" class="btn btn-primary cancelBtn">CANCEL</button></a>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection



