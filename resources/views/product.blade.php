@extends('layouts.app')

@section('content')
    <section class="product mt-5">
        <div class="container-fluid">
            <div class="row d-flex flex-row justify-content-between">
                <div class="col-6 product-img">
                    <div class="card bg-dark text-white ">
                        <img src="../../img/compunter.jpg" class="card-img " alt="...">
                    </div>
                </div>
                <div class="col-6 product-data d-flex flex-column justify-content-start">
                    <div class="product-title">
                        <h3>Darcia duster </h3>
                    </div>
                    <p class="product-description text-left text-black font-monospace fw-bolder lh-base"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet atque dicta dignissimos fuga, inventore, ipsum magnam magni maiores nisi omnis optio possimus praesentium quam quia, quos saepe temporibus ut. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad assumenda, blanditiis commodi culpa error eum ex ipsam, iusto laborum mollitia officiis quidem tempora velit veritatis. Praesentium quo, vitae? Nisi.</p>
                    <div class="row mt-5">
                        <div class="col-6 text-start  ">
                            <span class="product-tarification fst-italic "> 10$ / day </span>
                        </div>
                        <div class="col-6 d-flex flex-column justify-content-center">
                            <div class="prod-desc">
                                <h6>Choice duration of your rent </h6>
                            </div>
                            <form action="" class="d-flex flex-row justify-content-center">
                                <input type="number" class="form-control-sm rounded-start" required> <button type="submit" class="btn-prod rounded-end"><i class="fas fa fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row"></div>
        </div>
    </section>
@endsection
