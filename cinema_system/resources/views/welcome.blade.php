@extends('layout')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://i.ytimg.com/vi/L9MQLhV2u2E/maxresdefault.jpg" alt="First slide">
            <div class="carousel-caption">
                <h3>Popcorn Cinema</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://i.ytimg.com/vi/qynZhEasnJw/maxresdefault.jpg" alt="Second slide">
            <div class="carousel-caption">
                <h3>Popcorn Cinema</h3>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://i.ytimg.com/vi/wZti8QKBWPo/maxresdefault.jpg" alt="Third slide">
            <div class="carousel-caption">
                <h3>Popcorn Cinema</h3>
            </div>
        </div>
    </div>
</div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="movie-content" style="background-color: #434d45; padding: 3%;">
    <a href="#" class="title-movie mb-5" style="font-size: 30px;letter-spacing: 2px;">Latest Movie</a> 
    <hr style="width: 1420px; background-color: white;">
        <div class="owl-carousel movie-carousel owl-theme ">
        @foreach($movies as $movie)
            <div class="card mb-4">
                <img class="card-img-top" src="{{ asset('images/') }}/{{$movie->image}}" alt="Movie poster" style="height: 100%;">
                <div class="card-body" style="max-height: 400px;">
                    <h5 class="card-title">{{$movie->name}}</h5>
                    <p class="card-text" style="white-space: normal;overflow: scroll;height: 200px;">{{$movie->description}}</p>
                    <a href="{{ route('viewMovieListsInfoMore',['id'=>$movie->id]) }}"><button class="btn btn-dark">More info</button></a>
                    <a href="{{ route('movieDateConfirm',['id'=>$movie->id]) }}"><button class="btn btn-outline-dark">Booking</button></a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

<div class="promotion text-center" style="background-color: #3f4540; padding: 2%;">
    <h1 style="letter-spacing: 5px;color: white;">Promotions</h1>
    <img src="https://3.bp.blogspot.com/-J7lK7WvAG7I/V144X7kWW1I/AAAAAAAAAYM/emIIzC7s89oqRpemG0IW-DQmJ9zBi2nsgCLcB/s1600/TGV%2BCinema%2BMovie%2BTicket%2BValue%2BDeals%2BRM8%2BEarly%2BBird.jpeg" class="img-fluid" width="60%" alt="promotion1">
    <img src="https://image.freepik.com/free-vector/vivid-poster-cinema-promotion_124507-7270.jpg" class="img-fluid mt-3" width="60%" height="40%" alt="promotion2">
    <img src="https://image.shutterstock.com/z/stock-vector-cinema-ad-poster-movie-theater-design-ads-template-promotion-banner-d-glasses-popcorn-film-1065194354.jpg" class="img-fluid mt-3" width="60%" alt="promotion3">
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        autoplay:false,
        autoplayTimeout:2300,
        dots:true,
        stagePadding:50,
        navText : ['<i class="fa fa-angle-left fa-3x" aria-hidden="true"></i>','<i class="fa fa-angle-right fa-3x" aria-hidden="true"></i>'],
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