@extends('layout')
@section('content')
<script>
    function total(){
        var total1 = document.getElementById('ticketAmount').value;
        var total2 = document.getElementById('priceFoodDrink').value;
        var total3 = document.getElementById('priceFoodDrink').value;
        if(total1 == "")
            total1 = 0;
        if(total2 == "")
            total2 = 0;
        if(total3 == "")
            total3 = 0;
                
        var result= parseInt(total1) + parseInt(total2) + parseInt(total3);
        if(!isNaN(result)){
            document.getElementById('totalAmount').value= result;
        }
        document.getElementById('totalAmount').onchange();
        var totalPrice;
        var ticketPrice = document.getElementById("ticketAmount").value;
        var foodDrinkPrice = document.getElementById("priceFoodDrink").value;
        totalPrice=ticketPrice + foodDrinkPrice; 
        document.getElementById('totalAmount').value = totalPrice;
    }
</script>
<div class="row mt-5" style="background-color: #434d45;color: white;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
    @foreach($histories as $history)
        <br><br>
        <h3 class="text-center">Order History</h3> 
        <form>
            <div class="form-group">
                <label for="movieName">Movie Name</label>
                <input type="text" class="form-control" id="movieName" name="movieName" value="{{$history->movieName}}" readonly>
                <input type="hidden" name="historyId" value="{{$history->id}}">
            </div>
            @foreach($users as $user)
                <input type="hidden" name="userId" id="userId" value="{{$user->id}}">
                
            @endforeach

            <div class="container" style="display: flex; justify-content: space-between;">
                <div class="form-group">
                    <label for="quantityTicket">Quantity Ticket</label>
                    <input type="text" class="form-control" id="quantityTicket" name="quantityTicket" value="{{$history->quantityTicket}}" readonly>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="text" class="form-control" id="date" name="date" value="{{$history->date}}" readonly>
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="text" class="form-control" id="time" name="time" value="{{$history->time}}" readonly>
                </div>
            </div>

            <div class="container" style="display: flex; justify-content: space-between;">
                <div class="form-group">
                    <label for="seatNo">Seat Number</label>
                    <input type="text" class="form-control" id="seatNo" name="seatNo" value="{{$history->seatNo}}" readonly>
                </div>

                <div class="form-group">
                    <label for="amount">Ticket Amount(RM):</label>
                    <input type="text" class="form-control" id="ticketPrice" name="ticketPrice" value="{{$history->ticketPrice}}" readonly>
                </div>
            </div>

            <input type="hidden" name="userName" id="userName" value="{{$history->userName}}">

            <div class="foodDrink-label" style="display: flex; justify-content: space-between;">
                <label for="foodDrinks">Food & Drink</label>
                <label for="price">Price(RM)</label>
            </div>

            <div class="container" style="border:5px solid; border-radius: 3%; padding-top: 10px; padding-bottom: 10px; color: #d8e4bc;">
                <br>
                <table class="table table-bordered foodDrink-items" cellpadding="0" cellspacing="0">
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                @foreach($foodID as $foodId)
                                    @if($foodId == $order->orderId)
                                        <td class="w-100" style="border-color: #434d45;border-top-color:white; border-bottom-color: white; border-right-color: white;">
                                            <div class="form-check form-check-inline">
                                                <input type="hidden" name="foodDrinks[]" value="{{$order->id}}">
                                                <input type="hidden" name="foodName[]" value="{{$order->foodName}}">
                                                <label class="form-check-label" for="foodName Checkbox" style="color: white; font-size: 20px;">{{$order->foodName}}&nbsp;</label>
                                            </div>
                                        </td>
                                        <td style="border-color: #434d45;border-top-color:white; border-bottom-color: white; color: white;">{{$order->foodPrice}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            <td class="w-100" style="border-color: #434d45; color: white;border-top-color: white; border-bottom-color: white; border-right-color: white;"><h5>Total Price</h5></td>
                            <td class="alignright" style="border-color: #434d45;border-top-color: white; border-bottom-color: white; color: white;"><h5>{{$amountFoods}}</h5></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <br>

            <div class="form-group">
                <label for="totalAmount">Total Amount(RM):</label>
                <input type="text" class="form-control" id="totalAmount" name="totalAmount" value="{{$history->totalAmount}}" readonly>
            </div>
        </form>
        <div class="row" style="display: flex; justify-content: center;">
            <a href="{{ route('viewOrderHistory') }}"><button class="btn btn-light" style="margin-left: 46%;">Back</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{ route('receipt.download', ['id'=>$history->id]) }}"><button class="btn btn-light" style="margin-left: 46%;">Receipt</button></a>
        </div>
        <br><br>
    @endforeach
    </div>
    <div class="col-sm-3"></div>
</div>

@endsection