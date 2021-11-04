@extends('layout')
@section('content')
<div class="title text-center text-uppercase font-weight-bold" style="margin-top: 5%;">
    <p>We provide many choices of food and drink to our customer !</p>
    <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 325px; background-color: #47090b;">
</div>
<div class="row">
        @foreach($foodDrinks as $foodDrink)
        <div class="col-sm-4">
            <div class="card-body">
                <h5 class="card-title">{{$foodDrink->name}}</h5>
                <p class="card-text">{{$foodDrink->description}}</p>
                <a href="{{ route('viewDetail',['id'=>$foodDrink->id]) }}"><img src="{{asset('images/')}}/{{$foodDrink->image}}" class="img-fluid" alt=""></a>
                <div class="card-heading">RM {{$foodDrink->price}}</div>
                <button class="btn btn-dark btn-xs"><i class="fa fa-cart-plus">&nbsp;Add to cart</i></button>
            </div>
        </div>
        @endforeach
</div>

@endsection 