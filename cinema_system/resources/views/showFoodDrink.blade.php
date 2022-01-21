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
        <div class="box-topic">Food & Drinks</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Food & Drinks List
    <form class="form-inline" action="{{ route('adminSearch.foodDrink') }}" method="post" style="margin-left: 35%">
        @csrf
            <input class="form-control" type="search" name="keywordFoodDrink" id="keywordFoodDrink" placeholder="Search Food & Drink" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
    </form>
        <a href="{{ route('insertFoodDrinks') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Food&Drinks</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col" width="10%">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price(RM)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($foodDrinks as $foodDrink)
                    <tr>
                        <th scope="row">{{ $foodDrink->id}}</th>
                        <td><img src="{{ asset('images/') }}/{{$foodDrink->image}}" width="100" alt="" class="img-fluid"></td>
                        <td>{{$foodDrink->name}}</td>
                        <td>{{$foodDrink->description}}</td>
                        <td>{{$foodDrink->price}}</td>
                        <td>{{$foodDrink->quantity}}</td>
                        <td>{{$foodDrink->category}}</td>
                        <td>
                            <a href="{{ route('editFoodDrink', ['id'=>$foodDrink->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteFoodDrink', ['id'=>$foodDrink->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection