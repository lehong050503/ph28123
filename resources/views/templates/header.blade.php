<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GREEN - Đưa bạn đi muôn nơi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    {{-- My code CSS --}}
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>hongltph28123@fpt.edu.vn</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        @if (Auth::check())
                            <a class="text-primary px-3" href="" >
                                
                                <div class="nav-item dropdown">
                                    
                                    <a href="{{ url('/') }}" class="dropdown-toggle" data-toggle="dropdown" style="">
                                        <i class="fas fa-user" style="margin-right: 10px;font-size: 20px;"></i>  {{ Auth::user()->username }}  
                                    </a>
                                    <div class="dropdown-menu border-0 rounded-0 m-0">
                                        <a href="{{ url('/') }}" class="dropdown-item">Blog Grid</a>
                                        <a href="{{ url('/logout') }}" class="dropdown-item">Log out</a>
                                        {{-- <a href="{{ url('/') }}" class="dropdown-item">Destination</a>
                                        <a href="{{ url('/') }}" class="dropdown-item">Travel Guides</a>
                                        <a href="{{ url('/') }}" class="dropdown-item">Testimonial</a> --}}
                                    </div>
                                </div>
                            </a>    
                        @else
                            <a class="text-primary px-3" href="{{ url('/login') }}">
                                Login
                            </a>
                            <a class="text-primary px-3" href="{{ url('/register') }}">
                                Register 
                            </a>  
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">GRE</span>EN</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                        <a href="{{ url('/') }}" class="nav-item nav-link">About</a>
                        <a href="{{ url('/') }}" class="nav-item nav-link">Services</a>
                        <a href="{{ url('/') }}" class="nav-item nav-link">Tour Packages</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="{{ url('/') }}" class="dropdown-item">Blog Grid</a>
                                <a href="{{ url('/') }}" class="dropdown-item">Blog Detail</a>
                                <a href="{{ url('/') }}" class="dropdown-item">Destination</a>
                                <a href="{{ url('/') }}" class="dropdown-item">Travel Guides</a>
                                <a href="{{ url('/') }}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="{{ url('/') }}" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


 


    
