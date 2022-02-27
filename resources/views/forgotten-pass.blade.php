@extends('layouts.app')

@section('content')
    <section class="forgotten-pass">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-password-image" style="background-image: url('../../img/auth/forgotten.jpg');"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center section-header">
                                            <h2 class="mb-3">Password reset </h2>
                                            <p class="mb-4">We send you a reset code in your mail !</p>
                                        </div>
                                        <form class="user">
                                            <div class="form-group">
                                                <input class="form-control  text-center" maxlength="6" type="tel" pattern="[0-9]{3}-[0-9]{3}" id="reset_code" placeholder="Code " name="reset_code" required>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control " type="password" id="examplePasswordInput" placeholder="Password" name="password" /></div>
                                                <div class="col-sm-6"><input class="form-control " type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat" /></div>
                                            </div>
                                            <button class="btn btn-get-started btn-block  " type="submit">Reset <i class="fas fa fa-arrow-right"></i></button>
                                        </form>
                                        <div class="text-center">
                                            <hr><a class="small" href="{{route('signup')}}">Create an Account!</a>
                                        </div>
                                        <div class="text-center"><a class="small" href="{{route('login')}}">Already have an account? Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
