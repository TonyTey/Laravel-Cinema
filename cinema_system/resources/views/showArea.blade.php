@extends('layouts.dashboard')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('danger')}}
    </div>
@endif

<!-- $areas -->

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Area</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Area List
        <form class="form-inline" action="{{ route('search.area') }}" method="post" style="margin-left: 50%;">
            @csrf
            <input class="form-control" type="search" name="keywordArea" id="keywordArea" placeholder="Search Area" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
        </form>
        <a href="{{ route('loadInsertArea') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Area</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col" width="50%">Area Name</th>
                        <th scope="col" width="15%">Published at</th>
                        <th scope="col" width="15%">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $area)
                    <tr>
                        <th scope="row">{{ $area->id}}</th>
                        <td>{{ $area->name }}</td>
                        <td>{{ $area->created_at }}</td>
                        <td>{{ $area->updated_at }}</td>
                        <td>
                            <a href="{{ route('editArea', ['id'=>$area->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteArea', ['id'=>$area->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="row text-center">
        <div class="col-sm-5"></div>
        <div class="col-sm-2 ml-5">
            {{ $areas->links('pagination::bootstrap-4')}}
        </div>
        <div class="col-sm-5"></div>
    </div> -->
</div>

@endsection