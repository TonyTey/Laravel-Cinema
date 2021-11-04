@extends('layout')
@section('content')

<div class="row mt-5">
        @foreach($foodDrinks as $foodDrink)
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="card-title">{{$foodDrink->name}}</h5>
                        <input type="hidden" name="id" value="{{$foodDrink->id}}">
                        <img src="{{asset('images/')}}/{{$foodDrink->image}}" class="img-fluid" alt="" width="100%">
                    </div>
                    <div class="col-md-9">
                        <br><br>
                        <p class="card-text">{{$foodDrink->description}}</p>
                        <div class="card-heading">Quantity <input type="number" min="1" value="1" name="quantity" size="3">&nbsp;&nbsp; Available: {{$foodDrink->quantity}}</div>
                        <br><br>
                        <div class="card-heading">Price: RM {{$foodDrink->price}}</div>
                        <br>
                        <button class="btn btn-dark btn-xs" type="submit"><i class="fa fa-cart-plus">&nbsp;Add to cart</i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection 