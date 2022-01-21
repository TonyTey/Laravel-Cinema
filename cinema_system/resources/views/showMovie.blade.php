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
        <div class="box-topic">Movie</div>
    </div>
</div>

<div class="area-box">
    <div class="title">Movie List
    <form class="form-inline" action="{{ route('admin.search.movie') }}" method="post" style="margin-left: 46%">
        @csrf
        <input class="form-control" type="search" name="keywordAdminMovie" id="keywordAdminMovie" placeholder="Search Movie" aria-label="search"> 
        <button class="btn btn-dark my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button> 
    </form>
        <a href="{{ route('loadInsertMovie') }}"><button class="add_button" role="button"><i class='bx bx-add-to-queue'></i>&nbsp New Movie</button></a>
    </div>

    <div class="area-details">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="5%">#ID</th>
                        <th scope="col" width="10%">Image</th>
                        <th scope="col" width="33%">Name</th>
                        <th scope="col" width="15%">Duration(Minutes)</th>
                        <th scope="col" width="10%">Price(RM)</th>
                        <th scope="col" width="8%">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id}}</th>
                        <td><img src="{{ asset('images/') }}/{{$movie->image}}" width="100" alt="" class="img-fluid"></td>
                        <td>{{$movie->name}}</td>
                        <td>{{$movie->duration}}</td>
                        <td>{{$movie->price}}</td>
                        <td>{{$movie->status}}</td>
                        <td>
                            <a href="{{ route('editMovie', ['id'=>$movie->id]) }}"><button class="edit_button" role="button"><i class='bx bx-edit-alt'></i>Edit</button></a>
                            <a href="{{ route('deleteMovie', ['id'=>$movie->id]) }}"><button class="delete_button" role="button"><i class='bx bxs-minus-square'></i>Delete</button></a>
                            <a href="{{ route('viewMovieDetails', ['id'=>$movie->id]) }}"><button class="more_button" role="button"><i class='bx bx-copy-alt'></i>More</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection