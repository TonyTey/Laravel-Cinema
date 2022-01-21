@extends('layouts.dashboard')

@section('content')

<div class="overview-box">
    <div class="box">
        <div class="box-topic">Date & Time</div>
    </div>
</div>

<div class="insert_area_box">
    @foreach($books as $book)
    <div class="insert_area_title">{{$book->userName}}</div>
    @endforeach
    <div class="insert_area_card" style="width: 92%; margin-left: 50px;">
        <div class="insert_area_details">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    @foreach($books as $book)

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Movie</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->movieName}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Date</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->date}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Time</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->time}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Quantity Ticket</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->quantityTicket}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Seat No</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->seatNo}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Ticket Price</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="RM {{$book->ticketPrice}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="foodDrink-label" style="display: flex; justify-content: space-between;">
                        <label for="foodDrinks" style="color: white;">Food & Drink</label>
                        <label for="price" style="color: white;">Price(RM)</label>
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
                                                            <label class="form-check-label" for="foodName Checkbox" style="color: white; font-size: 20px;">{{$order->foodName}}&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td style="border-color: #434d45;border-top-color:white; border-bottom-color: white; color: white;">{{$order->foodPrice}}</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="w-100" style="border-color: #434d45;border-top-color: white; color: white;border-bottom-color: white; border-right-color: white;"><h5>Total Price</h5></td>
                                        <td class="alignright" style="border-color: #434d45;border-top-color: white;border-bottom-color: white; color: white;"><h5>{{$amountFoods}}</h5></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Booking At</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="{{$book->created_at}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    <br>

                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Total Amount</span>
                        </div>
                        <input type="text" class="form-control" id="movieName" name="movieName" value="RM {{$book->totalAmount}}" readonly required aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    </div>

                    @endforeach

                    <br>

                    <a href="{{ route('viewBook') }}"><button type="submit" class="btn btn-primary cancelBtn">BACK</button></a>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <br>
</div>

@endsection