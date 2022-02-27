<nav class="navbar navbar-light navbar-expand-lg bg-white  shadow-sm mb-4 topbar static-top justify-content-between">
    <div class="container-fluid ">
        <a href="{{route('home')}}" class="navbar-brand">BAGNOLISTA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav " >
                <li class="nav-item">
                    <a  class="nav-link active text-dark"  aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('rent')}}" class="nav-link">Rent a car</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('park')}}" class="nav-link">Car park</a>
                </li>
            </ul>
        </div>
        <!--<ul class="navbar-nav flex-nowrap ml-auto">
            <li class="nav-item no-arrow dropdown ">
                <div class="nav-item dropdown no-arrow">
                    <a href="" class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown"></a>
                </div>
            </li>
        </ul> -->

    </div>
</nav>
