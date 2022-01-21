@extends('layout')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="margin-top: 4.3%;margin-bottom: 0%;">
        {{Session::get('success')}}
    </div>
@elseif(Session::has('danger'))
    <div class="alert alert-danger" role="alert" style="margin-top: 4.3%;margin-bottom: 0%;">
        {{Session::get('danger')}}
    </div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .owl-carousel img:hover {
        box-shadow: 0 7px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        cursor: pointer;
    }
</style>

<div class="selectMovie" style="background-color: #434d45;color: white;padding: 1.5%;">
    
    <div class="showMovie mt-5">
        <div class="title text-center mb-3">
            <form class="form-inline my-2 text-center" action="{{route('search.movie')}}" method="post">
                @csrf
                <h2 class="mr-3" style="margin-left:41%;">Choose A Movie</h2>
                <input class="form-control" type="search" name="keywordMovie" id="keywordMovie" placeholder="Search Movie" aria-label="search" style="margin-left: 23%;">
                <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    
    <div class="owl-carousel movie-carousel owl-theme mb-5">
    @foreach($movies as $movie)
        <div class="item mb-4">
            <a href="{{ route('movieDateConfirm',['id'=>$movie->id]) }}"><img src="{{ asset('images/') }}/{{$movie->image}}" alt="Movie poster" style="height: 480px;"></a>
            <a href="{{ route('viewMovieListsInfoMore',['id'=>$movie->id]) }}"><button class="btn btn-light mt-1" style="margin-left: 35%;"><i class="fa fa-info-circle">&nbsp;More Info</i></button></a>
        </div>
    @endforeach
    </div>

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                autoplay:true,
                autoplayTimeout:2300,
                dots:true,
                stagePadding:50,
                navText : ['<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>'],
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:4
                    }
                }
            })
    </script>
@endsection