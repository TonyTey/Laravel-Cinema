@extends('layout')
@section('content')
<div class="title text-center text-uppercase font-weight-bold" style="margin-top: 4.2%;background-color: #434d45;color: white;padding: 1%;">
    <form class="form-inline my-2 text-center" action="{{route('search.branch')}}" method="post">
        @csrf
        <!-- <h2 class="mr-3" style="margin-left:42%;">Choose A Movie</h2> -->
        <p style="margin-left:41%;">Our cinema branch is near your area!</p>
        <!-- <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 325px; background-color: white;"> -->
        <input class="form-control" type="search" name="keywordBranch" id="keywordBranch" placeholder="Search Branch" aria-label="search" style="margin-left: 17%;">
        <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
<div class="row" style="background-color: #434d45;color: white;padding: 3%;">
    
    @foreach($branches as $branch)
        <div class="col-3">
           
            <p class="font-weight-bold" style="font-size:25px;"><i class="fa fa-building">&nbsp;</i>{{$branch->name}}</p>
            <ul>
                <li style="list-style-type: square;"><b>Location: </b>{{$branch->location}}</li><br>
                <li style="list-style-type: square;"><b>Number of halls: </b>{{$branch->numberOfHalls}}</li><br>
                <li style="list-style-type: square;"><b>Seating capacity: </b>{{$branch->seatingCapacity}}</li><br>
                @foreach($areas as $area)
                    @if($area->id == $branch->areaId)
                        <li style="list-style-type: square;"><b>Area: </b>{{$area->name}}</li><br>
                    @endif
                @endforeach
            </ul>
            <p class=""></p>
            <p class=""></p>
            <p class=""></p>
        </div>
    @endforeach
</div>
@endsection 