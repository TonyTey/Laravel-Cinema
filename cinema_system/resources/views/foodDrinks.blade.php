@extends('layout')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 4.4%;">
        {{Session::get('success')}}
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger" role="alert" style="margin-top: 4.4%;">
        {{Session::get('danger')}}
    </div>
@endif
<style>
    body{
        background-color: #434d45;
    }
</style>

<div class="title text-center text-uppercase font-weight-bold" style="margin-top: 4.4%;background-color: #434d45;color: white;padding:1%;">
    <form class="form-inline my-2 text-center" action="{{ route('search.foodDrink') }}" method="post">
    @csrf
        <!-- <h2 class="mr-3" style="margin-left:42%;">Choose A Movie</h2> -->
        <p style="margin-left:33%;">We provide many choices of food and drink to you!</p>
        <input class="form-control" type="search" name="keywordFoodDrink" id="keywordFoodDrink" placeholder="Search Food & Drink" aria-label="search" style="margin-left: 17%;">
        <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button>
    </form>
    
    <!-- <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 325px; background-color: white;"> -->
</div>

<div class="row" style="background-color: #434d45;color: white;padding:1%;">

        @foreach($foodDrinks as $foodDrink)
        <div class="col-sm-4">
            <div class="card-body">
                <h5 class="card-title">{{$foodDrink->name}}</h5>
                <p class="card-text">{{$foodDrink->description}}</p>
                <a href="{{ route('viewDetail',['id'=>$foodDrink->id]) }}"><img src="{{asset('images/')}}/{{$foodDrink->image}}" class="img-fluid" alt=""></a>
                <div class="card-heading">RM {{$foodDrink->price}}</div>
                <a href="{{ route('viewDetail',['id'=>$foodDrink->id]) }}"><button class="btn btn-light btn-xs"><i class="fa fa-cart-plus">&nbsp;Order</i></button></a>
            </div>
        </div>
        @endforeach
</div>
@endsection 