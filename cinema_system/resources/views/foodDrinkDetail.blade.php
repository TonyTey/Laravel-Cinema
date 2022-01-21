@extends('layout')
@section('content')
<script>
    function cal(){
        var quantity = parseInt(document.getElementById("foodQuantity").value);
        var available = parseInt(document.getElementById("available").value);
        var price = parseFloat(document.getElementById("foodDrinkPrice").value);
        var totalPrice;

        if(quantity < available) {
            totalPrice = quantity * price;
            document.getElementById("foodPrice").value = totalPrice.toFixed(2);
        }else {
            alert("You can only select maximum of " + available + " food & drink.");
            document.getElementById('foodDrinkPrice').value = price;
            document.getElementById("foodQuantity").value = 1;
        }
    }
</script>
<div class="row mt-5" style="background-color: #434d45;color: white;">
        @foreach($foodDrinks as $foodDrink)
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div class="card-body">
                <form action="{{ route('add.to.order')}}" method="post">
                    @CSRF
                    <div class="row">
                        @foreach($users as $user)
                            <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                        @endforeach
                        <div class="col-md-3">
                            <h5 class="card-title">{{$foodDrink->name}}</h5>
                            <input type="hidden" name="id" value="{{$foodDrink->id}}">
                            <img src="{{asset('images/')}}/{{$foodDrink->image}}" class="img-fluid" alt="" width="100%">
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="foodName" value="{{$foodDrink->name}}"> 
                            <input type="hidden" name="foodCategory" id="categoryfood" value="{{$foodDrink->category}}">
                            <br><br>
                            <p class="card-text">{{$foodDrink->description}}</p>
                            <!-- <div class="row"> 
                                <div class="form-group col-md-3" style="display: inline-block;">
                                    <label for="quantityFood" class="control-label">Quantity:</label>
                                    <input type="text" name="quantityFood" id="quantityFood" class="form-control"  min="1" value="0" onkeyup="cal(this.value);">
                                </div>
                                <div class="form-group col-md-3" style="display: inline-block;">
                                    <label for="available" class="control-label">Available:</label>
                                    <input type="text" name="available" id="available" class="form-control" value="{{$foodDrink->quantity}}" size="3" readonly>
                            </div>-->
                            <div class="card-heading"> 
                                <label for="quantityFood">Quantity:&nbsp;</label><input type="number" min="1" value="1" max="{{$foodDrink->quantity}}" name="foodQuantity" id="foodQuantity" size="3" onchange="cal();">&nbsp;&nbsp;
                                <label for="available">Available:&nbsp;</label><input type="text" name="available" id="available" size="3" value="{{$foodDrink->quantity}}" readonly>
                            </div>
                            <br><br>
                            <div class="card-heading">
                                <input type="hidden" name="foodDrinkPrice" id="foodDrinkPrice" value="{{$foodDrink->price}}" readonly>   
                                <label for="priceFood">Total Price: RM</label>
                                <input type="text" name="foodPrice" id="foodPrice" size="3" value="{{$foodDrink->price}}" min="{{$foodDrink->price}}" readonly>
                            </div>
                            <br>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-trash">&nbsp;Cancel</i></button>
                            <button class="btn btn-light btn-xs" type="submit"><i class="fa fa-cart-plus">&nbsp;Confirm</i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection 