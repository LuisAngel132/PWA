<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
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
            <div class="col">
              <table id="example" class="display" style="width:100%">
                <thead>
                        <tr>
                            <th></th>

                          <th>Nombre</th>
                            <th>Numero Serie</th>
                            <th>Unidad</th> 
                            <th>Estado</th>
                            <th>Reporte</th>
                        </tr>
                    </thead>
                    <tbody class=" align-middle">
    @foreach($herramientas as $item)
              <tr>
                <td></td>
                <td>{{$item->nombre}}</td>
                <td>{{$item->numero_serie}}</td>
                <td>{{$item->unidad}}</td>
                <td>{{$item->estado}}</td>
                <td><form  action="{{ route('reporte_vida_herramienta') }}"  method="POST" name="sample">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                <button type="submit" class=" custom-icon btn-1 " style=""> 
                  <img  width="30" height="30"  src="https://images.vexels.com/media/users/3/158744/isolated/preview/17f0e622c52dbedf3da254361f5b4e3b-reporte-de-ilustraci--n-by-vexels.png" alt="reportes">

                </button>
                </form>
              </td>
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
 <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

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
$(document).ready(function() {
    var dt = $('#example').DataTable({
      orderCellsTop: true,
        fixedHeader: true,
        select: true,

        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        pageLength: 4,
        searchPanes: {
            viewTotal: true,
            columns: [0,1,2,3,4]
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
                target: 4,
                visible: false,
                searchable: false,
                width : 0,
                
            },
            {
                searchPanes: {
                    options: [
                        {
                            label: 'Alta',
                            value: function(rowData, rowIdx) {
                                return rowData[4] == '1';
                            }
                        },
                        {
                            label: 'En uso',
                            value: function(rowData, rowIdx) {
                                return rowData[4] == '2';
                            }
                        },
                        {
                            label: 'Baja',
                            value: function(rowData, rowIdx) {
                                return rowData[4] == '0';
                            }
                        },
                        {
                            label: 'reparacion',
                            value: function(rowData, rowIdx) {
                                return rowData[4] == '3';
                            }
                        }
                    ],
                    combiner: 'and'
                },
                targets: [4]
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