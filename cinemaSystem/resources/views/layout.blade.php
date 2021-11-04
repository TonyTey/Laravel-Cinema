<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Cinema</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <style>
        .navbar-nav a {
            color: white;
            text-decoration: none;
        }

        .navbar-nav a:hover {
            color: red;
            text-decoration: underline;
            display: block;
        }

        .movie-content a {
            color: white;
            text-decoration: none;
        }

        .movie-content a:hover {
            color: red;
        }

        .movie-content img:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .contact a {
            color: white;
        }

        .contact a:hover {
            color: #e30513;
        }

        .container ul li a {
            text-decoration: none;
            color: white;
        }

        .container ul li a:hover {
            text-decoration: none;
            color: red;
        }

        .submitBtn {
            background-color: transparent;
            border-color: grey;
            color: red;
            font-weight: 700;
            margin-left: 40%;
        }
        .submitBtn:hover {
            background-color: white;
            color: red;
        }
    </style>

</head>

<body>

    <div class="navbar-nav navbar-expand-lg fixed-top" style="display: flex;justify-content: center;background-color: #47090b;">
        <a href="#"><img src="{{asset('images/Logo.png')}}" class="rounded-circle ml-3" alt="PC Cinema" width="70px"></a>
        <p class="navbar-brand mt-2" style="color: white;">Popcorn Cinema</p>

        <a class="nav-link ml-3 mt-2" href="#">Movie</a>
        <a class="nav-link ml-5 mt-2" href="#">Cinema</a>
        <a class="nav-link ml-5 mt-2" href="#">Experience</a>
        <a class="nav-link ml-5 mt-2" href="#">Booking</a>
        <a class="nav-link ml-5 mt-2" href="#">Order History</a>

        <form class="form-inline my-2 my-lg-0 ml-5" action="#" method="#">
            <input class="form-control" type="search" name="keyword" id="keyword" placeholder="Search here..." aria-label="search">
            <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    @yield('content')
    <footer class="text-center text-white" style="background-color: #37393b;">
        <!-- Footer Links -->
        <div class="container text-center text-md-left" style="text-decoration: none;">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Movies</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Link 1</a>
                        </li>
                        <li>
                            <a href="#">Link 2</a>
                        </li>
                        <li>
                            <a href="#">Link 3</a>
                        </li>
                        <li>
                            <a href="#">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Experiences</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Cinema</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Booking</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->

        <div class="text-center p-4">
            <div class="resources">
                <p><i class="fa fa-info-circle" aria-hidden="true"></i>&nbspResources</p>

                <hr style="width: 130px; background-color: white;">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <p class="text-center" style="float: left;">Subscribe to our new letter</p>&nbsp
                    </div>
                    <form class="form-inline my-2 my-lg-0" action="" method="post">
                        <div class="col-md-5 col-12">
                            <input class="form-control" type="text" name="email" id="email" placeholder="Enter email address">
                        </div>
                        <div class="col-md-5 col-12 ml-2">
                            <button class="btn btn-outline-light my-2 my-sm-0 ml-5" type="submit"><i class="fa fa-envelope"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="contact mt-4">
                <p>Connect With Us !!!</p>
                <a href="#"><i class="fa fa-instagram fa-3x ml-5"></i></a>
                <a href="#"><i class="fa fa-facebook fa-3x ml-5"></i></a>
                <a href="#"><i class="fa fa-twitter fa-3x ml-5"></i></a>
                <a href="#"><i class="fa fa-youtube fa-3x ml-5"></i></a>
            </div>
        </div>

        <a href="#"><img src="{{asset('images/Logo.png')}}" class="rounded-circle ml-3" alt="PC Cinema" width="100px"></a>
        <div class="copyright text-center p-2" style="background-color: #27292b;">
            <p>All contents © 2021 PopCorn Cinema. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>