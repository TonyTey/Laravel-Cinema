@extends('layouts.dashboard')
@section('content')
<div class="overview-box">
    <div class="box">
        <div class="box-topic">User Ticket Booking</div>
    </div>
</div>

<div class="area-box">
    <div class="title">User Ticket Booking List
        <form class="form-inline" action="{{ route('search.user.booking') }}" method="post" style="margin-left: 35%">
        @csrf
            <input class="form-control" type="search" name="keywordUserBooking" id="keywordUserBooking" placeholder="Search Movie Name" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
        </form>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Movie Name</th> 
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price (RM)</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id}}</th>
                        <td>{{$book->userName}}</td>
                        <td>{{$book->movieName}}</td> 
                        <td>{{$book->date}}</td>
                        <td>{{$book->time}}</td>
                        <td>{{$book->quantityTicket}}</td>
                       <td>{{$book->ticketPrice}}</td> 
                        <td>
                            <a href="{{ route('viewBookingHistory', ['id'=>$book->id]) }}"><button class="more_button" role="button"><i class='bx bx-copy-alt'></i>More</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-sm-5"></div>
        <div class="col-sm-2 ml-5">
            {{ $books->links('pagination::bootstrap-4')}}
        </div>
        <div class="col-sm-5"></div>
    </div>
</div>

@endsection