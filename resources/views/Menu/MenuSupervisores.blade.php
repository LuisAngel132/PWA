
<head>
  @laravelPWA
</head>
<style>
.urls{
  background-color: lightblue ;
  border: 1px solid #d7d8da;
  align-items: center ;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<nav class="navbar   fixed-top" style="background-color:#3f51b5  ;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class=" offset-2 col-3">
          <a class="navbar-brand" href="#">
            
          </a>
        </div>
      </div>
     
     
    
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Almacen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ">
            <li class="nav-item urls">
              <a class="nav-link active "  aria-current="page" href="{{ route('welcome') }}">Solicitud</a>
            </li>
            
            <li class="nav-item urls">
              <a class="nav-link" href="{{ route('Cerrarsesion') }}" >Cerrar sesion
              </a>
            </li>
          </ul>
         
        </div>
      </div>
    </div>
  </nav>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
