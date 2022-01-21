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
        <div class="box-topic">Category</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Category List
    <form class="form-inline" action="{{ route('search.category') }}" method="post" style="margin-left: 42%">
        @csrf
            <input class="form-control" type="search" name="keywordCategory" id="keywordCategory" placeholder="Search Category" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
    </form>
        <a href="{{ route('insertCategory') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Category</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col" width="50%">Category Name</th>
                        <th scope="col" width="15%">Published at</th>
                        <th scope="col" width="15%">Updated at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id}}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('editCategory', ['id'=>$category->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteCategory', ['id'=>$category->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection