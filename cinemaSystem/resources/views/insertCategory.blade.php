@extends('layout')
@section('content')

<div class="row mt-5">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Create New Category</h3> 
        <form method="POST" action="{{ route('addCategory') }}">
            @CSRF
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
           
            <button type="submit" class="btn btn-primary" style="margin-left: 46%;">Submit</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection