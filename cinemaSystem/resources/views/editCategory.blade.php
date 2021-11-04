@extends('layout')
@section('content')

<div class="row mt-5">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="text-center p-3">Update Category</h2>
            <form method="POST", action="{{ route('updateCategory') }}" >
                @CSRF
            @foreach($categories as $category)
            <div class="form-group">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$category->id}}" readonly>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary mb-3" style="margin-left: 46%;">Update</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
</div>

@endsection



