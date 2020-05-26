<!-- <?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?> -->

@extends('layout.main')

@section('title')
Home
@endsection

@section('content')

<body id="page-top">

    <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase">
                        <strong>we are ready to accompany your journey </strong>
                    </h1>
                    <hr>
                </div>
                <div class="col-lg-8 mx-auto">
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <section id="about">
        <center>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center " style="padding-top: 50pt">
                        <h2 class="section-heading">We Have Got What You Need!</h2>
                        <p style="font-family: Montserrat-Regular; font-size: 15px; " ">We understand every vespa rider's need and we provide them for you.
                        Customizing vespa will be much easier now that we provide online shopping. You can also book a
                        schedule for you in our garage partner.</p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="service-box mt-5 mx-auto">
                                <img src="{{ asset ('img/IMG_7584 (2).png') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </section>


        <section id="services">
            <center>
                <div class="container" >
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading">At Your Service</h2>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                                <i class="fas fa-warehouse"></i>
                                <h3 style="font-family: Montserrat-Regular; font-size: 15px; >Booking Service</h3>
                                <p style="font-family: Montserrat-Regular; font-size: 15px; >We provide you booking service so you can optimize your time</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                                <i class="fas fa-4x fa-shopping-cart sr-icon-2"></i>
                                <h3 style="font-family: Montserrat-Regular; font-size: 15px; >Shopping</h3>
                                <p style="font-family: Montserrat-Regular; font-size: 15px; >You can buy accessories and sparepart too! </p>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </section>

        <!-- Team -->
        <center>
            <section class="bg-light" id="portfolio" style="font-family: Montserrat-Regular; font-size: 15px; >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/Team/1.jpg" alt="" style="width: 100%;">
                            <h3>CIO</h3>
                            <h4>Fadel Ganesha</h4>
                            fadel.ganesha@sibengkel.com
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/Team/2.jpg" alt="" style="width: 100%;">
                            <h3>CEO</h3>
                            <h4>Muhammad Fathoni</h4>
                            muh.fathoni@sibengkel.com
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/Team/3.jpg" alt="" style="width: 100%;">
                            <h3>CTO</h3>
                            <h4>Muhammad Trisna F</h4>
                            trisna.firmansyah@sibengkel.com
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </center>

    <img src="img/background.jpg" style="width: 100%">
    <!-- Footer -->

    <!-- Google addsends -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8821224662906997",
            enable_page_level_ads: true
        });


    </script>

    @endsection
