@extends('layouts.app')

@section('content')
    <section class="signup">
        <div class="container">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-register-image" style="background-image: url('../../img/auth/sign.jpg');"></div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center section-header">
                                    <h2 class="">Join us !</h2>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control " type="text" id="exampleFirstName" placeholder="First Name" name="first_name"></div>
                                        <div class="col-sm-6"><input class="form-control " type="text" id="exampleFirstName" placeholder="Last Name" name="last_name"></div>
                                    </div>
                                    <div class="form-group"><input class="form-control " type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control " type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                        <div class="col-sm-6"><input class="form-control " type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                    </div><button class="btn btn-get-started btn-block " type="submit">Sign in <i class="fas fa fa-arrow-right"></i></button>
                                    <hr>
                                </form>
                                <div class="text-center"><a class="small" href="{{route('forgotten-pass')}}">Forgot Password?</a></div>
                                <div class="text-center"><a class="small" href="{{route('login')}}">Already have an account? Login!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
