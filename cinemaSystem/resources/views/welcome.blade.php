@extends('layout')

@section('content')

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
                <h5>PopCorn Cinema</h5>
                <button type="button" class="btn btn-danger" style="margin-right: 90%;padding: 1%;">Book Now</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://i.ytimg.com/vi/qynZhEasnJw/maxresdefault.jpg" alt="Second slide">
            <div class="carousel-caption">
                <h5>PopCorn Cinema</h5>
                <button type="button" class="btn btn-danger" style="margin-right: 90%;padding: 1%;">Book Now</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://i.ytimg.com/vi/wZti8QKBWPo/maxresdefault.jpg" alt="Third slide">
            <div class="carousel-caption">
                <h5>PopCorn Cinema</h5>
                <button type="button" class="btn btn-danger" style="margin-right: 90%;padding: 1%">Book Now</button>
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
    <div class="row">
        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://i.ytimg.com/vi/9thM5gLs2tg/maxresdefault.jpg" class="img-fluid" alt="aquaman">
                <div class="card-body">
                    <h5 class="card-title">Aquaman</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#"><button class="btn btn-dark">More info</button></a>
                    <a href="#"><button class="btn btn-outline-dark">Booking</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://media.socastsrm.com/wordpress/wp-content/blogs.dir/679/files/2021/09/shang-chi-poster.jpg" class="img-fluid" alt="shangchi">
                <div class="card-body">
                    <h5 class="card-title">Shang-Chi</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#"><button class="btn btn-dark">More info</button></a>
                    <a href="#"><button class="btn btn-outline-dark">Booking</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://i.ytimg.com/vi/gBS6vaNFcx4/maxresdefault.jpg" class="img-fluid" alt="kingkongvsgodzilla">
                <div class="card-body">
                    <h5 class="card-title">King Kong vs Godzilla</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#"><button class="btn btn-dark">More info</button></a>
                    <a href="#"><button class="btn btn-outline-dark">Booking</button></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://i.ytimg.com/vi/mjCwJz5DiWQ/maxresdefault.jpg" class="img-fluid" alt="flint">
                <div class="card-body">
                    <h5 class="card-title">Flint</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#"><button class="btn btn-dark">More info</button></a>
                    <a href="#"><button class="btn btn-outline-dark">Booking</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="promotion text-center" style="background-color: #3f4540; padding: 2%;">
    <h1 style="letter-spacing: 5px;color: white;">Promotions</h1>
    <img src="https://3.bp.blogspot.com/-J7lK7WvAG7I/V144X7kWW1I/AAAAAAAAAYM/emIIzC7s89oqRpemG0IW-DQmJ9zBi2nsgCLcB/s1600/TGV%2BCinema%2BMovie%2BTicket%2BValue%2BDeals%2BRM8%2BEarly%2BBird.jpeg" class="img-fluid" width="60%" alt="promotion1">
    <img src="https://image.freepik.com/free-vector/vivid-poster-cinema-promotion_124507-7270.jpg" class="img-fluid mt-3" width="60%" height="40%" alt="promotion2">
    <img src="https://image.shutterstock.com/z/stock-vector-cinema-ad-poster-movie-theater-design-ads-template-promotion-banner-d-glasses-popcorn-film-1065194354.jpg" class="img-fluid mt-3" width="60%" alt="promotion3">
</div>
@endsection