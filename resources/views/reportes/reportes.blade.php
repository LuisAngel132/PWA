<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Reporte</title>
    @laravelPWA
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
</head>
<body>
  
@extends('../Menu/Menu')

<div class="espacio"></div>
    <div class="container shadow-lg p-3 mb-5 mt-5 bg-body rounded">
        <div class="row">
          <div class="col-3">
            
              Fecha minima
              <input  class="form-control" type="text" id="min" name="min">
          </div>
          <div class="col-3">
              Fecha Maxima:
             <input class="form-control"  type="text" id="max" name="max">
          </div>
          <div class="col-3">
            Dias minimos Transcuridos:
            <input class="form-control" type="text" id="mindias" name="mindias">
          </div>
          <div class="col-3">
            Dias Maximos Transcuridos:
            <input class="form-control" type="text" id="maxdias" name="maxdias">
          </div>
        </div>
        <div class="row">
            <div class="col">

           
            
                  
                 
            <div ></div>
                <table id="example" class="table table-striped" style="width:100%">
                    
                    <thead>
                        
                        <tr>
                          <th>Partida</th>
                          <th>Articulo</th>
                  
                          <th>No.Serie</th>
                          <th> Ubicacion </th>
                          <th>Unidad</th>
                          <th>cantidad</th>
                          <th>Fecha de prestamo</th>
                          <th>Dias desde el prestamo</th>
                  
                          <th>Obra</th>
                          <th>Descripcion</th>
                  

                          </tr>
                    </thead>
                    <tbody class=" align-middle">
    @php $partida = 1; $rojo =0;@endphp
    <br>
  @foreach ($estatus as $items)
  @php
 
 
      $fecha_hoy=date("y-m-d");
     $fecha_creacion = strtotime ( $items->created_at);
    $fecha_creacion = date('y-m-d', $fecha_creacion);
    $date1=date_create($fecha_hoy);
    $date2=date_create($fecha_creacion);
    $diff=date_diff($date2,$date1);
    $transcurso_dias=$diff->format("%a");
    $string = $transcurso_dias;
    $transcurso_dias = (int) $string;
    $fecha_creacion = strtotime ( $items->created_at);
    $fecha_creacion = date('y-m-d', $fecha_creacion);
    $amarillo = 0;
    $rojo = 0;
    if ($transcurso_dias >=30 && $transcurso_dias <59){
      $amarillo =1;
    }
   else if ($transcurso_dias >=60) {
     $rojo = 1;
    }
  
   
  

  @endphp
  @if ($amarillo ==1)
  <tr style="background: #ffff00">
    @endif
  @if ($rojo ==1)
  <tr style="background: #ef0501">
    @endif
 
 

      <td>{{$partida}}</td>
      <td>{{$items->nombre}}</td>

      <td>{{$items->numero_serie}}</td>
      <td>
        <form action="{{ route('reporte_trabajador') }}" method="GET">
          @csrf
          <input type="hidden" name="id" value="{{$items->id}}">
          <button type="submit" class="btn btn-1"><span style="font-size: 12px">{{$items->name}}</span> </button>
        </form>
      <td>{{$items->unidad}}</td>
      @if ($items->asignados>0)
      <td>{{$items->asignados}}</td>
      @endif
      @if ($items->asignados==null)
      <td>{{$items->cantidad}}</td>
      @endif
      <td>{{$items->created_at}}</td>
      <td>{{$transcurso_dias}}</td>
    

      <td>{{$items->obra}}</td>
      <td>{{$items->descripcion}}</td>
     
    </form>

    </tr>
  @php $partida ++@endphp  
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
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<!-- fecha    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
 <!-- Para usar los botones -->
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
 <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>  
<script src="cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.min.js"></script>
<script src="cdn.datatables.net/colvis/1.1.1/js/dataTables.colVis.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>


<script src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>
<!-- Para los estilos en Excel     -->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js"></script>
<script>
  var minDate, maxDate;
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[6] );


        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
   var mindias = parseInt($('#mindias').val(), 10);
   var maxdias = parseInt($('#maxdias').val(), 10);
   var Dias = parseFloat(data[7]) || 0; // use data for the age column
console.log(mindias);
   if (
       (isNaN(mindias) && isNaN(maxdias)) ||
       (isNaN(mindias) && Dias <= maxdias) ||
       (mindias <= Dias && isNaN(maxdias)) ||
       (mindias <= Dias && Dias <= maxdias)
   ) {
       return true;
   }
   return false;
});
  $(document).ready(function() {
    minDate = new DateTime($('#min'), {
       format: 'MMMM Do YYYY'
   });
   maxDate = new DateTime($('#max'), {
       format: 'MMMM Do YYYY'
   });
   $('#example thead tr ')
   $('#mindias, #maxdias').keyup(function () {
       table.draw();
   });    
   $('#min, #max').on('change', function () {
       table.draw();
   });
 
  var table = $('#example').DataTable({
    orderCellsTop: true,
      fixedHeader: true,
      select: true,

      language: {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      pageLength: 4,
      searchPanes: {
          viewTotal: true,
          columns: [3,7]
      },
    scrollY:        "320px",
   scrollX:        true,
   scrollCollapse: true,
   paging:         true,
      dom: '<"row" P> <"row" B> <"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
      buttons:{
          dom: {
              button: {
                  className: 'custom-btn btn-1'
              }
          },
          buttons: [
           
            {
              //definimos estilos del boton de excel
              extend: "copy",
              text:'COPIAR',
              className:'custom-btn btn-1',
         
          },   
           'pdf',

            {
              //definimos estilos del boton de excel
              extend: "print",
              text:'IMPRIMIR',
              className:'custom-btn btn-1',
         
          },   
            {
              //definimos estilos del boton de excel
              extend: "colvis",
              text:'COLUMNAS',
              className:'custom-btn btn-1',
         
          },
         
          
            
          {
              //definimos estilos del boton de excel
              extend: "excel",
              text:'EXCEL',
              className:'custom-btn btn-1',

              // 1 - ejemplo básico - uso de templates pre-definidos
              //definimos los parametros al exportar a excel
              
              excelStyles: {                
                  //template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
                  //template:"green_medium" 
                  
                  "template": [
                      "blue_medium",
                      "header_green",
                      "title_medium"
                  ] 
                  
              },
              

         
          },
        
         
          ],
        },  
      columnDefs: [ 
      
        {
                        searchPanes: {
                            options: [{
                                    label: ' menores a 30 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[7] < 30;
                                    }
                                },
                                {
                                    label: '30 a 60 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[7] >= 30 && rowData[7] <= 60;
                                    }
                                },
                                {
                                    label: 'mayor 60 dias',
                                    value: function(rowData, rowIdx) {
                                        return rowData[7] >=60;
                                    }
                                }
                            ],
                            combiner: 'and'
                        },
                        targets: [7]
                    }, 
       
      ],
    
      order: [[ 1, 'asc' ]]
  });

 
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    
</body>
</html>