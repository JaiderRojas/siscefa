@extends('insaelements::layouts.master')
@section('title','Inicio')
@section('content')
 <!-- Content Wrapper. Contains page content -->

    <div class="container">
        <div class="card" style="margin: auto;  width: 780px;" >
           <h5 class="card-header" style="background-color: orange;">
                <img src="{{ asset('elements/imagines/fondohome.png') }}" style="width: 3%" alt="...">Autorización
                Prestamo y Salida de
                Elementos
                Devolutivos.
            </h5>

            <div class="card-body">

              <form id="form-data" action="{{route('insaelements.general.Solicitar.guardarSolicitud')}}" method="POST">
                {{ csrf_field() }}

                <div class="col-sm-6">
                      <input type="datetime" name="registrationDate" value="<?php echo date('Y-m-d\ H-i'); ?>"  readonly>
                    </div><br>
                  <div class="col-md-8">
                    <div class="row mb-2">
                        <label for="" class="col-sm-5 col-form-label col-form-label-sm">Documento del solicitante:</label>
                          <div class="col-sm-6">

                            <input name="document" type="number" class="form-control form-control-sm" id="SearchDocument" value="{{old('document')}}">
                          </div>
                    </div>
                  </div>
                   <input name="people_id" type="" class="form-control form-control-sm" id="people_id" style="display: none;" >

                  <div class="col-md-8">
                      <div class="row mb-2">
                          <label for="" class="col-sm-5 col-form-label col-form-label-sm">Nombre del solicitante:</label>
                            <div class="col-sm-7">
                              <input type="text" name="firstName" id="firstName" class="field left" value="{{old('firstName')}}"readonly>
                            </div>
                      </div>
                  </div>
                 <div class="col-md-8">
                      <div class="row mb-2">
                          <label for="return_date" class="col-sm-5 col-form-label col-form-label-sm">Fecha de entrega:</label>
                          <div class="col-sm-6">
                          <input name="return_date" type="date" class="form-control form-control-sm" value="<?php echo date('Y-m-d\ H-i'); ?>">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="row mb-2">
                          <label for="" class="col-sm-5 col-form-label col-form-label-sm">Formación o Dependencia:</label>
                            <div class="col-sm-6">
                                <input name="dependence" type="text" class="form-control  form-control-sm" value="{{old('dependence')}}">
                            </div>
                      </div>
                   </div>
                    <div class="col-md-8">
                      <div class="row mb-2">
                          <label for="" class="col-sm-5 col-form-label col-form-label-sm">Lugar al cual se trasladan los elementos:</label>
                              <div class="col-sm-6">
                                <input name="translation" type="text" class="form-control form-control-sm" value="{{old('translation')}}">
                              </div>
                      </div>
                    </div>

                    <div class="col-md-8">
                         <div class="row mb-2">
                             <label for="" class="col-sm-5 col-form-label col-form-label-sm">Objetivo por el cual se transladan los elementos:</label>
                            <div class="col-sm-6">
                                <input name="objective" type="text" class="form-control form-control-sm" value="{{old('objective')}}">

                            </div>
                         </div>
                    </div>
                    <div class="col-md-8">
                            <div class="row mb-2">

                                <label for="" class="col-sm-5 col-form-label col-form-label-sm">Documento del
                                    que Autoriza:</label>
                                <div class="col-sm-6">
                                    <input name="document" type="number" class="form-control form-control-sm" id="search" value="{{old('document')}}">
                                </div>
                            </div>
                        </div>
                        <input name="peopleIdAutoriza" type="number" class="form-control form-control-sm" id="peopleIdAutoriza" style="display: none;" >

                    <div class="col-md-8">
                        <div class="row mb-2">
                            <label for="" class="col-sm-5 col-form-label col-form-label-sm">Nombre Autoriza Salida:</label>
                              <div class="col-sm-6">
                                <input name="" type="text" class="form-control form-control-sm" id="Name" value=""><br>
                              </div>
                        </div>
                    </div>
                       <button type="button" class="btn btn-outline-warning btn-flat" data-toggle="modal" data-target="#searchElement">Agregar
                     </button>

                <table class="table table-striped">
                    <thead >
                        <tr>
                            <th scope="col"> #</th>
                            <th scope="col" >Nombre Elemento</th>
                            <th scope="col">Descripcion del elemento</th>
                            <th scope="col">Estado del Elemento</th>
                            <th scope="col">Codigo de inventario</th>
                            <th scope="col" >Cuentadante<br></th>
                            <th scope="col">Cantidad</th>

                        </tr>
                      </thead>
                         <tbody id="tabla">
                            <tr id="fila">

                            </tr>
                        </tbody>
                </table>
                <!--<input type="submit" value="Guardar" name="guardar" class="btn btn-warning"  >-->
                <button type="submit" class="btn btn-warning" id="btnGuardar">Guardar</button>
              </form>

           </div>
        </div>
    </div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="searchElement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar Elemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="card card-orange card-outline "></div>
      <div class="modal-body">
        <form>
             {{ csrf_field() }}
           <div class="alert alert-success" role="alert" id="invenState">

          </div>
          <label for="name">Codigo de inventario:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <i class="far fa-keyboard"></i>
              </span>
            </div>
              <input name="inventoryCode" type="number" class="form-control form-control-sm" id="SearchElement" required="">
         </div>

        <input name="id" type="number" class="form-control form-control-sm" id="id" style="display: none;" >
        <input name="unit_price" type="number" class="form-control form-control-sm" id="unit_price"  style="display: none;">

          <label for="start_date" class="mtop16">Nombre Elemento:</label>
          <div class="input-group">
           <select  class="form-control  form-control-sm" name="element_id" style="width: 100%;" id="element_id" disabled>
               <option value=""></option>
               @foreach ($elements as $element)
                  <option  value="{{ $element->id }}">{{ $element->name }}</option>
               @endforeach
             </select>
             {{-- <input  class="form-control  form-control-sm" name="element_id" style="width: 100%;" id="element_id">
                <option value=""> --}}
          </div>
          <label for="end_date" class="mtop16">Descripcion del elemento:</label>
          <div class="input-group">
           <input name="description" type="text" class="form-control form-control-sm" id="description">
         </div>


          <label for="end_date" class="mtop16">Estado del Elemento:</label>
          <div class="input-group">
           <input name="stateElement" type="text" class="form-control  form-control-sm" value="" id="stateElement">
         </div>

           <label for="end_date" class="mtop16">Cuentadante:</label>
          <div class="input-group">
            <select  class="form-control  form-control-sm" name="peopleId" style="width: 100%;" id="peopleId" disabled>
                <option value=""></option>
                  @foreach ($peoples as $people)
                   <option  value="{{ $people->id }}">{{ $people->first_name }}</option>
                  @endforeach
             </select>
          </div>

     </form>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button  id="btnAgregar" type="button" class="btn btn-outline-warning" data-dismiss="modal">Agregar</button>
      </div>
  </div>
  </div>
</div>




@stop
    @section('js')

    <!-- este script es para buscar la persona por documento -->
    <script type="text/javascript">
      $(document).ready(function () {
        $("#SearchDocument").keyup(function() {
          if ($(this).val().length >=7) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              method: "POST",
              url: "{{route('insaelements.general.ajaxPeopleByDocument') }}",
              data: {document: $(this).val() }
             })
               .done(function(data){
                  if (data.peoples.length>0) {
                    $('#people_id').val(data.peoples[0]['id']);
                    $('#firstName').val(data.peoples[0]['first_name']);
                   }else{
                    alert('Numero de Documento no Encontrado')
                   }
              })
            }else{
                $('#people_id').val('');
                $('#firstName').val('');
          }
        });
      });


      //se duplica el escript para buscar el nombre del que atoriza salida
          $(document).ready(function () {
        $("#search").keyup(function() {
          if ($(this).val().length >=7) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              method: "POST",
              url: "{{route('insaelements.general.ajaxPeopleByDocument') }}",
              data: {document: $(this).val() }
             })
                .done(function(data){
                  if (data.peoples.length>0) {

                    $('#peopleIdAutoriza').val(data.peoples[0]['id']);
                     $('#Name').val(data.peoples[0]['first_name']);
                   }else{
                    alert('Numero de Documento no Encontrado')
                   }
             })

          }else{
            $('#peopleIdAutoriza').val('');
             $('#Name').val('');
          }

        });
      });
    </script>


    <!--este script es del modal del boton agregar para buscar el elemento por codigo de inventario -->
     <script type="text/javascript">
      $(document).ready(function () {
        $("#SearchElement").keyup(function() {
          if ($(this).val().length >=7) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              method: "POST",
              url: "{{route('insaelements.general.Solicitar.ajaxElementByCode') }}",
              data: {inventoryCode: $(this).val() }
             })
                .done(function(data){
                  if(data.inventories.length>0){

                      $('#invenState').text(data.inventories[0]['state']);
                      $('#id').val(data.inventories[0]['id']);
                      $('#unit_price').val(data.inventories[0]['unit_price']);
                      $('#element_id').val(data.inventories[0]['element_id']);
                      $('#peopleId').val(data.inventories[0]['people_id']);
                      $('#description').val(data.inventories[0]['description']);
                      $('#stateElement').val(data.inventories[0]['stateElement']);
                  }else{
                    alert('Codigo de Inventario no Encontrado')
                  }

                })

          }else{
            $('#invenState').text('');
            $('#id').val('');
            $('#unit_price').val('');
            $('#element_id').val('');
            $('#peopleId').val('');
            $('#description').val('');
            $('#stateElement').val('');

          }

        });


      });

    </script>
    <script>
      $(document).ready(function(){
        $('#btnAgregar').click(function(){
          agregar();

        });
      });
      var cont=0;
      function agregar(){

        cont++;

        var fila='<tr id="fila'+cont+'"><td>'+cont+'</td>'+
        '<td><select name="tdelement"  class="form-control  form-control-sm" style="width: 100%;" id="tdelement'+cont+'" disabled>'+
                    '<option value=""></option>'+
                    '@foreach ($elements as $element)'+
                        '<option  value="{{ $element->id }}">{{ $element->name }}</option>'+
                    '@endforeach'+
                '</select>'+
                '</td>'+
                '<td id="tddescription'+cont+'" value=""></td>'+
                '<td id="tdestado'+cont+'"></td>'+
                '<td id="tdcodinventary'+cont+'"></td>'+
                '<td><select  class="form-control  form-control-sm" name="tdcuentadante" style="width: 100%;" id="tdcuentadante'+cont+'" disabled>'+
                  '<option value=""></option>'+
                   '@foreach ($peoples as $people)'+
                      '<option  value="{{ $people->id }}">{{ $people->first_name }}</option>'+
                    '@endforeach'+
                '</select></td>'+
                '<td><div class="col-sm-6"><input name="quantity[]" type="number" class="form-control form-control-sm"></div></td></tr>'+
                 '<td><input name="tdid[]" type="hidden" id="tdid'+cont+'"></td>'+
                '<td><input name="tdUnitPrice[]" type="hidden"  id="tdUnitPrice'+cont+'"></td>';
        $('#tabla').append(fila);

          $('#tdelement'+cont+'').val($('#element_id').val());
          $('#tddescription'+cont+'').text($('#description').val());
          $('#tdestado'+cont+'').text($('#stateElement').val());
          $('#tdcodinventary'+cont+'').text($('#SearchElement').val());
          $('#tdcuentadante'+cont+'').val($('#peopleId').val());
          $('#tdid'+cont+'').val($('#id').val());
          $('#tdUnitPrice'+cont+'').val($('#unit_price').val());


      }
    </script>

    <!--para guardar a base de datos pero no guarda
    <script type="text/javascript">
      $(document).ready(function(){

        $('#btnGuardar').click(function(e){

          e.preventDefault();
          var route = $('#form-data').data('route');
          var form = $("#form-data").attr("action");
          //var formValues = $(this),serialize();
          var dataString = $("#form-data").serialize();

          $.ajax({
            type: 'POST',
            url:"{{route('insaelements.general.Solicitar.guardarSolicitud')}}",
            data:dataString,

            success:function(Response){

            }
          });
        });
      });

      </script>-->



   @stop
