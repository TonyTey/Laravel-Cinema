<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Popcorn Cinema </title>
    <link rel="stylesheet" href="{{ asset('/css/dashboard.css') }}">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-movie-play icon'></i>
            <div class="logo_name">Popcorn Cinema</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="{{ route( 'viewArea') }}">
                    <i class='bx bx-area'></i>
                    <span class="links_name">Area</span>
                </a>
                <span class="tooltip">Area</span>
            </li>
            <li>
                <a href="{{ route('viewBranch') }}">
                    <i class='bx bx-buildings'></i>
                    <span class="links_name">Branch</span>
                </a>
                <span class="tooltip">Branch</span>
            </li>
            <li>
                <a href="{{ route('viewMovie') }}">
                    <i class='bx bx-movie' ></i>
                    <span class="links_name">Movie</span>
                </a>
                <span class="tooltip">Movie</span>
            </li>
            <li>
                <a href="{{ route('viewCategory') }}">
                    <i class='bx bx-category' ></i>
                    <span class="links_name">Category</span>
                </a>
                <span class="tooltip">Category</span>
            </li>
            <li>
                <a href="{{ route('viewFoodDrink') }}">
                    <i class='bx bx-food-menu'></i>
                    <span class="links_name">Food & Drinks</span>
                </a>
                <span class="tooltip">Food & Drinks</span>
            </li>
            <li>
                <a href=" {{ route('viewDateTime') }}">
                    <i class='bx bx-time'></i>
                    <span class="links_name">Date & Time</span>
                </a>
                <span class="tooltip">Date & Time</span>
            </li>

            <li>
                <a href=" {{ route('viewBook') }}">
                <i class='bx bx-history'></i>
                    <span class="links_name">User Booking History</span>
                </a>
                <span class="tooltip">User Booking History</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <!-- <img src="profile.jpg" alt="profileImg"> -->
                    <div class="name_job">
                        <div class="name">{{ $details->name}}</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
                <a href="{{ route('log-out') }}"><i class='bx bx-log-out' id="log_out"></i></a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        @yield('content')
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>

</body>

</html>