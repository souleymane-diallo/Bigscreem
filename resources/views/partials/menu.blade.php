<header class=" text-center text-lg-start bg-dark text-muted">
    <div class="collapse bg-dark" id="navbarHeader">

    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <div class="d-flex ">
                    {{--<a href=""  class=" navbar-brand d-flex align-items-center" >Se connecter</a>--}}
                    <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
                        <img src="{{ asset('image/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
                        {{-- <strong style="color: #66EB9A">Bigscreen</strong> --}}
                    </a>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href=""><i class="fa fa-user"></i> Connexion</a>
                    </li>
                </ul>
            </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
</header>
