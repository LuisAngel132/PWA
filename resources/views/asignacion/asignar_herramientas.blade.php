<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Asignacion</title>
    @laravelPWA
    <link rel="stylesheet" href="{{asset("css/app.css")}}">

</head>
<body>
 
@extends('../Menu/Menu')
@extends('../Menu/websocktet')

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      <div class="row">
        <div class="col-2">
             <a href="{{ route('asignacion') }}">
            <button type="button" class="btn btn-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>
            </button>
          </a>
        </div>
        <div class=" offset-2 col-6"> 
          @if (strlen($name) > 0)   
                <h3> {{$name}}</h3>
          @endif
          @if(strlen($name_faltante)>0 && strlen($name) < 1)
          <h3> {{$name_faltante}}</h3>
          @endif                
    </div>

    </div>

        <div class="row">
            <div class="col">
              <div class="table-responsive">
              <table id="myTable" class="table table-striped" style="width:100%">
                <thead>
                <tr>
                <th>Partida</th>
                <th>Cantidad</th>
                <th> Descripcion</th>
                <th>Articulo / No.Serie / Unidad</th>
                <th> Si faltaron ingresa la cantidad</th>
                <th> Accion</th>
        </tr>
                </thead>
                
                 <tbody>
                  @php $partida = 1 @endphp
                    <br>
                  @foreach ($solicitud as $items)
                    @if ($items->asignados>0)
                    <tr class="table-active">
                    @endif
                    @if ($items->asignados==0)
                    <tr>
                    @endif
                 
        
                      <td>{{$partida}}</td>
                      <td>{{$items->cantidad}}</td>
                      <td>{{$items->descripcion}}</td>
                      <td>
                        <div class="mb-3">
                            <form action="{{ route('asignar_herramienta') }}" method="POST">
                                @csrf
        
                            <select class="form-select" name="herramienta">
                              @if ($herramientas)
                    
                                @foreach ($herramientas as $item)
                                <option selected value="{{$item->id}}"> {{$item->nombre}} / {{$item->numero_serie}} / {{$item->unidad}}   </option>
                    
                                @endforeach
                          @endif
                            </select>
                          </div>
        
                      </td>
                        <input id="id" name="user" type="hidden" value="{{$user}}">
                        <input id="id" name="id" type="hidden" value="{{$items->id}}">
                        <input id="id" name="cantidad" type="hidden" value="{{$items->cantidad}}">
        
                      <td><input type="number" name="faltan" id=""></td>
                      <td><button class="btn btn-1">
                      
        
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                        </svg>
                      </button></td>
                    </form>
        
                    </tr>
                  @php $partida ++ @endphp  
                @endforeach
        
                 </tbody>
             </table>
            </div>
        </div>
    </div>
  </div>


  <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
    
      <div class="row">
          <div class="col">
            <div class="table-responsive">
              <table id="myTable2" class="table table-bordered " >
                <thead>
                <th>Partida</th>
                <th>Cantidad</th>
                <th> Descripcion</th>
                <th>Articulo / No.Serie / Unidad</th>
                <th> ingresa la cantidad</th>
                <th> Accion</th>
          
                </thead>
                
                 <tbody>
                  @php $partida = 1 @endphp
                    <br>
                  @foreach ($solicitud_faltante as $items)
                    @if ($items->asignados>0)
                    <tr class="table-active">
                    @endif
                    @if ($items->asignados==0)
                    <tr>
                    @endif
                 
          
                      <td>{{$partida}}</td>
                      <td>{{$items->cantidad}}</td>
                      <td>{{$items->descripcion}}</td>
                      <td>
                        <div class="mb-3">
                            <form action="{{ route('reasignar_herramienta') }}" method="POST">
                                @csrf
                                <input id="id" name="herramienta" type="hidden" value="{{$items->herramienta}}" >
                              <p>{{$items->nombre}} / {{$items->numero_serie}} / {{$items->unidad}} </p>
          
                          </div>
          
                      </td>
                        <input id="id" name="user" type="hidden" value="{{$user}}">
                        <input id="id" name="id" type="hidden" value="{{$items->id}}">
                        <input id="id" name="cantidad" type="hidden" value="{{$items->cantidad}}">
          
                      <td><input type="number" name="faltan" id=""></td>
                      <td>
                        <button class="btn btn-1">
                      
        
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                          </svg>
                        </button>
                      </td>
                    </form>
          
                    </tr>
                  @php $partida ++ @endphp  
                @endforeach
          
                 </tbody>
             </table>
            </div>
          </div>
          
          
          </div>
      </div>
  </div>
</div>

 

 <!-- jquery y bootstrap -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 <!-- datatables con bootstrap -->
 <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>


<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
$(document).ready(function () {
    $("#myTable").DataTable({
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 2,
     
     scrollY:        "400px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
     columnDefs: [
         { width: 200, targets: 0 }
     ],
      dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',           buttons:{
           
            buttons: [ 
            ]            
        }            
    });
});
$(document).ready(function () {
    $("#myTable2").DataTable({
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 2,
     
        scrollY:        "400px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        columnDefs: [
         { width: 308, targets: 0 }
     ],
      dom: '<"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',           buttons:{
           
            buttons: [ 
            ]            
        }            
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    
    
  </body>
</html>