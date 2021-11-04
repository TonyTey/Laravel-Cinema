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
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Food & Drink List</h2></div>
                    <div class="col-sm-4">
                        <a href="addNewFoodDrink"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($foodDrinks as $foodDrink)
                    <tr>
                        <td>{{$foodDrink->id}}</td>
                        <td width="10%"><img src="{{ asset('images/') }}/{{$foodDrink->image}}" width="100" alt="" class="img-fluid"></td>
                        <td>{{$foodDrink->name}}</td>
                        <td>{{$foodDrink->description}}</td>
                        <td>{{$foodDrink->price}}</td>
                        <td>{{$foodDrink->quantity}}</td>
                        <td>{{$foodDrink->category}}</td>
                        <td> 
                            <a href="{{route('editFoodDrink',['id'=>$foodDrink->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><button class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true">&nbsp Edit</i></button></a>
                            <a href="{{route('deleteFoodDrink',['id'=>$foodDrink->id]) }}"class="delete" title="Delete" data-toggle="tooltip"><button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true">&nbspDelete</i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-1"></div>
</div>

@endsection