@extends('layout')
@section('content')

<div class="showtimes mt-5" style="background-color: #141415;padding: 2%;">
    <div class="col-lg-3">
        <label for="area name" style="color: white; font-size: 28px;">Branch</label>
    </div>
</div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Branch List</h2></div>
                    <div class="col-sm-4">
                        <a href="{{ route('loadInsertBranch') }}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Number Of Halls</th>
                        <th>Seating Capacity</th>
                        <th>Area</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($branchs as $branch)

                    <tr>
                        <td>{{$branch->name}}</td>
                        <td>{{$branch->location}}</td>
                        <td>{{$branch->numberOfHalls}}</td>
                        <td>{{$branch->seatingCapacity}}</td>
                        <td>{{$branch->catname}}</td>
                        <td>
                            <a href="{{ route('editBranch', ['id'=>$branch->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">Edit</i></a>
                            <a href="{{ route('deleteBranch', ['id'=>$branch->id]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">Delete</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-3"></div>
</div>

@endsection
