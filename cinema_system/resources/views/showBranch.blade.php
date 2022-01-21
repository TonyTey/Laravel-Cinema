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

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Branch</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Branch List
        <form class="form-inline" action="{{ route('adminsearch.branch') }}" method="post" style="margin-left: 44%">
            @csrf
            <input class="form-control" type="search" name="keywordBranch" id="keywordBranch" placeholder="Search Branch" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
        </form>
        <a href="{{ route('loadInsertBranch') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Branch</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col" width="25%">location</th>
                        <th scope="col">Number Of Halls</th>
                        <th scope="col">Seating Capacity</th>
                        <th scope="col">Area</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($branchs as $branch)
                    <tr>
                        <th scope="row">{{ $branch->id}}</th>
                        <td>{{$branch->name}}</td>
                        <td>{{$branch->location}}</td>
                        <td>{{$branch->numberOfHalls}}</td>
                        <td>{{$branch->seatingCapacity}}</td>
                        @foreach($areas as $area)
                            @if($area->id == $branch->areaId)
                                <td>{{$area->name}}</td>
                            @endif
                        @endforeach
                        <td>
                            <a href="{{ route('editBranch', ['id'=>$branch->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteBranch', ['id'=>$branch->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-5"></div>
        <div class="col-sm-2 ml-5">
            {{ $branchs->links('pagination::bootstrap-4')}}
        </div>
        <div class="col-sm-5"></div>
    </div>
</div>

@endsection
