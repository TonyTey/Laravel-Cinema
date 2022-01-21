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
        <div class="box-topic">Date & Time</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Date & Time List
        <form class="form-inline" action="{{ route('search.dateTime') }}" method="post" style="margin-left: 38%;">
            @csrf
            <input class="form-control" type="search" name="keywordDateTime" id="keywordDateTime" placeholder="Search Date Time" aria-label="search"> 
            <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
        </form>
        <a href="{{ route('insertDateTime') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Date & Time</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#ID</th>
                        <th scope="col" >Movie</th>
                        <th scope="col" >Date</th>
                        <th scope="col" >Publishes at</th>
                        <th scope="col" >Updated at</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dateTimes as $dateTime)
                    <tr>
                        <th scope="row">{{$dateTime->id}}</th>
                        <td>{{$dateTime->movie}}</td>
                        <td>{{$dateTime->date}}</td>
                        <td>{{$dateTime->created_at}}</td>
                        <td>{{$dateTime->updated_at}}</td>
                        <td>
                            <a href="{{ route('editDateTime', ['id'=>$dateTime->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteDateTime', ['id'=>$dateTime->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                            <a href="{{ route('viewDateTimeDetail', ['id'=>$dateTime->id]) }}"><button class="more_button" role="button"><i class='bx bx-copy-alt'></i>More</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
