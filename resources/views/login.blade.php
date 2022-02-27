@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-login-image" style="background-image: url();"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center section-header">
                                            <h2 class="">Welcome Back!</h2>
                                        </div>
                                        <form class="user">
                                            <div class="form-group"><input class="form-control " type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                            <div class="form-group"><input class="form-control " type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox  small">
                                                    <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                                </div>
                                            </div><button class="btn btn-get-started btn-block  " type="submit">Login <i class="fas fa fa-arrow-right"></i></button>
                                            <hr>
                                        </form>
                                        <div class="text-center"><a class="small" href="{{route('forgotten-pass')}}">Forgot Password?</a></div>
                                        <div class="text-center"><a class="small" href="{{route('signup')}}">Create an Account!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        g
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
