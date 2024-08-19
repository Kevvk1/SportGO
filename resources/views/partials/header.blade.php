<header>
    <nav class="navbar" style="background-color: black;">
        <div class="container-fluid">
            <div class="row" style="width: 100%">
                <div class="col-3">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('img/sportgo.png') }}" class="img-fluid logo" style="width: 30%;">
                    </a>
                </div>
                <div class="col-6 align-self-center">
                    <form class="d-flex" role="search" style="width: auto; height: auto;">   
                        <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Search">
                        <button class="btn btn-light" type="submit">Buscar</button> 
                    </form>
                </div>
                <div class="col-2 offset-1">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" style="color:white; cursor: pointer;" onclick="location.href='/carrito'">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </div>
                        <div class="col-6 d-flex align-items-center" style="display: flex; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: white; cursor: pointer;" onclick="location.href='/login'">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                            @if(session('user'))
                                <div class="d-flex justify-content-center mt-3 ms-3">
                                    <p class="" style="color: white;">{{session('user')->nombres}} {{session('user')->apellidos}}</p>  
                                </div>
                            @endif
                        </div>  
                        @if(session('user'))
                            <div class="col-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16" style="color: #A02334; cursor: pointer;" onclick="document.getElementById('logout-form').submit(); return false;">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                                </svg>
                                <form id="logout-form" action="{{ route('logout.user') }}" method="POST">
                                    @csrf
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

                            
    <nav class="navbar" style="background-color: #d9db26;">
        <div class="container-fluid">
            <div class="row text-center" style="width: 100%;">
                    <div class="col-4">
                            <a href="/index" style="color: black;">Inicio</a>
                    </div>
                    <div class="col-4">
                            <a href="/productos" style="color: black;">Productos</a>
                    </div>
                    <div class="col-4">
                            <a href="/pedidos" style="color: black;">Mis pedidos</a>
                    </div>
            </div>
        </div>
    </nav>

    @if(session('user'))
        @if(session('user')->type=='admin')
            <nav class="navbar" style="background-color: lightcoral;">
                <div class="container-fluid">
                    <div class="row text-center" style="width: 100%;">
                        <div class="col-12">
                                <a href="/admin/index" style="color: black;">Panel de administrador</a>
                        </div>
                </div>
            </nav>
        @endif
    @endif

</header>