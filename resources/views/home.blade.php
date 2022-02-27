@extends('layouts.app')

@section('content')
<section class="cover d-flex align-items-center" id="cover">
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex flex-column justify-content-center p-5">
                <h1 class="" data-aos="fade-up">Simplifiez vos voyages et offrez vous une securite </h1>
                <h2 class="" data-aos="fade-up" data-aos-delay="400">Nous sommes la société qui vous offres plus.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-left text-lg-start rounded">
                        <a href="{{route('rent')}}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Rent a Car</span>
                            <i class="fas fa  fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="best-rent" id="best-rent">
        <div class="container">
            <header class="section-header ">
                <h2>BEST RENT </h2>
            </header>
            <div class="row ">
                <div class="col-lg-3 mb-lg-0 mb-3 mb-md-3">
                    <div class="card shadow-sm border-none p-0">
                        <img src="../../img/tinigo.jpg" alt="" class="card-img-top ">
                        <div class="card-body">
                            <h5 class="card-title p-title">Renault </h5>
                            <p class="card-text">Offrez vous un confort avec notre nouvelle renault </p>
                            <div class="row d-flex justify-content-between">
                                <span class="price rounded align-items-center">10$/day</span>
                                <div class="text-left text-lg-start">
                                    <a href="{{route('product')}}" class="btn-special scrollto d-inline-flex align-item-center justify-content-center align-self-center">
                                        <span>Rent</span>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-3 mb-md-3">
                    <div class="card shadow-sm border-none p-0">
                        <img src="../../img/tinigo.jpg" alt="" class="card-img-top ">
                        <div class="card-body">
                            <h5 class="card-title p-title">Renault </h5>
                            <p class="card-text">Offrez vous un confort avec notre nouvelle renault </p>
                            <div class="row d-flex justify-content-between">
                                <span class="price rounded align-items-center">10$/day</span>
                                <div class="text-left text-lg-start">
                                    <a href="" class="btn-special scrollto d-inline-flex align-item-center justify-content-center align-self-center">
                                        <span>Rent</span>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-3 mb-md-3">
                    <div class="card shadow-sm border-none p-0">
                        <img src="../../img/tinigo.jpg" alt="" class="card-img-top ">
                        <div class="card-body">
                            <h5 class="card-title p-title">Renault </h5>
                            <p class="card-text">Offrez vous un confort avec notre nouvelle renault </p>
                            <div class="row d-flex justify-content-between">
                                <span class="price rounded align-items-center">10$/day</span>
                                <div class="text-left text-lg-start">
                                    <a href="{{route('rent')}}" class="btn-special scrollto d-inline-flex align-item-center justify-content-center align-self-center">
                                        <span>Rent</span>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-lg-0 mb-3 mb-md-3">
                    <div class="card shadow-sm border-none p-0">
                        <img src="../../img/tinigo.jpg" alt="" class="card-img-top ">
                        <div class="card-body">
                            <h5 class="card-title p-title">Renault </h5>
                            <p class="card-text">Offrez vous un confort avec notre nouvelle renault </p>
                            <div class="row d-flex justify-content-between">
                                <span class="price rounded align-items-center">10$/day</span>
                                <div class="text-left text-lg-start">
                                    <a href="" class="btn-special scrollto d-inline-flex align-item-center justify-content-center align-self-center">
                                        <span>Rent</span>

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="why-rent" id="why-rent">
        <div class="container">
            <header class="section-header ">
                <h2>why do you want rent a car ?</h2>
            </header>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-12 mb-lg-0 mb-3 mb-md-3">
                    <div class="card bg-dark text-white ">
                        <img src="../../img/compunter.jpg" class="card-img p-opacity " alt="...">
                        <div class="hover "></div>
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-around">
                            <a href="{{route('rent')}}" class="stretched-link text-white " ><h5 class="card-title text-center">TRAVEL</h5></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-lg-0 mb-3 mb-md-3">
                    <div class="card bg-dark text-white ">
                        <img src="../../img/compunter.jpg" class="card-img p-opacity " alt="...">
                        <div class="hover "></div>
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-around">
                            <h5 class="card-title text-center">BIRTHDAY</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-lg-0 mb-3 mb-md-3">
                    <div class="card bg-dark text-white ">
                        <img src="../../img/compunter.jpg" class="card-img p-opacity " alt="...">
                        <div class="hover "></div>
                        <div class="card-img-overlay h-100 d-flex flex-column justify-content-around">
                            <h5 class="card-title text-center">DATE</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="opinion" id="opinion">
        <div class="container">
            <header class="section-header ">
                <h2>Your opinion account !</h2>
            </header>
        <p class="text-left opinion-text">We always try to improve and you can help us with your comments.</p>
        </div>
    </section>
    <section class="reduction " id="reduction">
        <div class="container reduction-section p-5">
            <header class="reduction-header text-white">
                <h2>become members and benefits from -20 %</h2>
            </header>
            <div class="container mt-5 ">
                <div class="d-flex flex-row justify-content-center">
                    <div class="text-center text-lg-start rounded">
                        <a href="#" class="btn-reduction scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>BECOME </span>
                            <i class="fas fa  fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us"></section>

@endsection
