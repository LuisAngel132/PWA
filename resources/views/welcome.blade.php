<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel PWA</title>
@laravelPWA
<link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>

<body>
  <style>
   

 
/* Estilos para el HEAD de la tabla */
table.dataTable thead {background-color:#ff4081;color: azure;}

/* Estilos para los botones de paginacion */
.page-item.active .page-link {
  background-color:#ff4081 !important;
    color: azure !important;
    /* border: 1px solid black; */
}
.page-link {
    color: black !important;
}
    
    
    </style>
    
@extends('../Menu/MenuSupervisores')
<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
      
      

        <div class="row">
            <div class="col">
                <table id="myTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Obras</th>
                            <th>Accion</th>
                            
                        </tr>
                    </thead>
                    <tbody class=" align-middle">
                      @foreach ($obras as $item)
      
                      <div class="col-11">  
      <tr>
      <td><span class="text-info">{{$item->obra}}</span> Cliente: <span class="text-info">{{$item->cliente}}</span></button>      </td>
                        
                         <td>     
                          <form method="POST" action="{{ route('nuevovaleobra', ['obra'=>$item->id]) }}">
                            @csrf
                            <input id="prodId" name="supervisor" type="hidden" value="{{$user}}">  
                          <button type="submit" class=" btn btn-1 " style=""> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>  
                          </button>
                          <a class="btn btn-1"   href="{{ route('reportes_supervisor',['id_obra'=>$item->id]) }}">
                            <img  width="30" height="30"  src="https://images.vexels.com/media/users/3/158744/isolated/preview/17f0e622c52dbedf3da254361f5b4e3b-reporte-de-ilustraci--n-by-vexels.png" alt="reportes">
                          </a>
                        </form>

                        
                         </td>
                      </div>
                    </tr>   
                        @endforeach
            
            </tbody>              
                </table>
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
<script src="{{ asset('sockets.js')}}"></script>

<script>

$(document).ready(function () {
    $("#myTable").DataTable({
      language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 5,
     
     scrollY:        "400px",
     scrollX:        true,
     scrollCollapse: true,
     paging:         true,
   
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