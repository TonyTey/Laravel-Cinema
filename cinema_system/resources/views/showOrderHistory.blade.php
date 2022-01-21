@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert" style="margin-top: 4.3%;">
    {{Session::get('success')}}
</div>
@endif
@if(Session::has('download.receipt'))
<meta http-equiv="refresh" content="5;url={{ route('receipt') }}">
@endif

<style>
    body {
        background-color: #434d45;
    }

    .card-body {

        border-radius: 30px;
    }

    .card {
        border-radius: 20px;
    }

    .table-row .table .tr,th {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        word-wrap: break-word;
        background-color: white;
    }

    .table-row .table .tr,td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        word-wrap: break-word;
        background-color: white;
    }

    .table-row .table .more_button {
        background: #48C2C2;
        border: 1px solid #48C2C2;
        border-radius: 6px;
        box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
        font-size: 13px;
        font-weight: 500;
        line-height: 16px;
        min-height: 40px;
        outline: 0;
        padding: 12px 14px;
        text-align: center;
        text-rendering: geometricprecision;
        text-transform: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: middle;
    }

    .table-row .table .more_button:hover {
        background-color: initial;
        background-position: 0 0;
        color: #48C2C2;
    }

    .table-row .table .more_button:active {
        opacity: .5;
    }
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<div class="row mt-5" style="background-color: #434d45;color: white;">
    <div class="col-sm-1"></div>
    <div class="col-sm-10 ">
        <br><br>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <h1 class="">Order History</h1>
                    </div>
                    <div class="col-sm-2 mt-3 mb-3">
                    </div>
                    <div class="col-sm-7"></div>
                </div>

                <div class="table-row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Movie</th>
                                <th scope="col" width="10%">Date</th>
                                <th scope="col" width="5%">Time</th>
                                <th scope="col" width="14%">Quantity Ticket</th>
                                <th scope="col" width="10%">Seat No</th>
                                <th scope="col" width="15%">Total Amount(RM)</th>
                                <th scope="col" width="3%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order->movieName}}</td>
                                <td>{{$order->date}}</td>
                                <td>{{$order->time}}</td>
                                <td>{{$order->quantityTicket}}</td>
                                <td>{{$order->seatNo}}</td>
                                <td>{{$order->totalAmount}}</td>
                                <td>
                                    <a href="{{ route('orderInfoMore', ['id'=>$order->id]) }}"><button class="more_button" role="button"><i class='bx bx-copy-alt'></i>More</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-1"></div>
</div>

@endsection