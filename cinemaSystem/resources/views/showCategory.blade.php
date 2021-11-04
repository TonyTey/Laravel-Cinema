@extends('layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 4.2%;">
        {{Session::get('success')}}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger" role="alert" style="margin-top: 4.2%;">
        {{Session::get('danger')}}
    </div>
@endif
<div class="row mt-5">

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Category List</h2></div>
                    <div class="col-sm-4">
                    <a href="addNewCategory"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('editCategory',['id'=>$category->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><button class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true">&nbsp Edit</i></button></a>
                            <a href="{{route('deleteCategory',['id'=>$category->id]) }}"class="delete" title="Delete" data-toggle="tooltip"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true">&nbspDelete</i></button></a>
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