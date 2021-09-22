@extends('insaelements::layouts.admin')
@section('title', 'Registro de prestamos')
@section('content')
    <div class="container">
        <div class="card" style="margin: auto;  width: 70%; height: auto;">
            <h5 class="card-header" style="background-color: orange;">
                <img src="{{ asset('elements/imagines/fondohome.png') }}" style="width: 3%" alt="...">Registro de
                prestamos
            </h5>
            <div class="card-body">
                <form action="{{ route('registro.search') }}" method="GET">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <div class="row mb-2">
                            <label for="SearchDocument" class="col-sm-5 col-form-label col-form-label-sm">Documento del
                                solicitante:</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <input name="document" type="number" class="form-control form-control-sm"
                                        id="SearchDocument">
                                    <button type="submit" class="btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if (isset($people))
                            @if (count($people) > 0)
                                <div class="row mb-2">
                                    <label for="name" class="col-sm-5 col-form-label col-form-label-sm">Nombre:</label>
                                    <div class="col-sm-7">
                                        <input name="name" type="text" class="form-control form-control-sm" id="name"
                                            value="{{ $people[0]->first_name }} {{ $people[0]->first_last_name }} {{ $people[0]->second_last_name }}">
                                    </div>
                                </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row mb-2">
                            <label for="name" class="col-sm-12 col-form-label col-form-label-sm">Prestamos:</label>
                        </div>
                        @foreach ($people[0]->responsabilities as $peopleresponsability)
                            <p>Estado: {{ $peopleresponsability->movement->state }}/
                                Fecha de retorno: {{ $peopleresponsability->movement->return_date }}/
                                Objetivo: {{ $peopleresponsability->movement->objective }}/
                                Lugar de translado: {{ $peopleresponsability->movement->translation }}/
                            </p>
                            @foreach ($peopleresponsability->movement->detail_movements as $peopleresponsabilitymovement)

                                <p>{{ $peopleresponsabilitymovement->inventory->element->name }}/
                                    Descripcion:
                                    {{ $peopleresponsabilitymovement->inventory->element->description }}/
                                    Codigo de inventario:
                                    {{ $peopleresponsabilitymovement->inventory->inventoryCode }}/
                                    Marca: {{ $peopleresponsabilitymovement->inventory->mark }}/
                                    Estado: {{ $peopleresponsabilitymovement->inventory->state }}/
                                    Estado del elemento:
                                    {{ $peopleresponsabilitymovement->inventory->stateElement }}/
                                    Cantidad: {{ $peopleresponsabilitymovement->inventory->quantity }}/
                                </p>

                            @endforeach
                        @endforeach
                    </div>
                    @endif
                    @endif

                </form>
            </div>
        </div>{{-- end card --}}
    </div>{{-- end container --}}
@stop
@section('js')
    {{-- <script>
        $(document).ready(function() {
            $("#SearchDocument").keyup(function() {
                if ($(this).val().length >= 7) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                            method: "POST",
                            url: "{{ route('insaelements.admin.ajaxPeopleByDocument') }}",
                            data: {
                                document: $(this).val()
                            }
                        })
                        .done(function(data) {
                            if (data.peoples.length > 0) {
                                $('#Name').val(data.peoples[0]['first_name'] + " " + data.peoples[0][
                                    'first_last_name'
                                ] + " " + data.peoples[0]['second_last_name']);
                            } else {
                                alert('Numero de Documento no Encontrado');
                            }
                        })
                } else {
                    $('#Name').val('');
                }
            });
        });
    </script> --}}
@stop
{{-- <table class="table table-dark table-hover">
                        <tr>
                            <th>Estado</th>
                            <th>Solicitante</th>
                            <th>Objetivo</th>
                            <th></th>
                        </tr>
                        @foreach ($movements as $movement)
                        <tr>
                            <td>{{$movement->state}}</td>
                            <td>{{$movement->responsabilities[0]->people->first_name}}</td>
                            <td>{{$movement->objective}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-detail-{{$movement->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><a>Detalles</a>
                                </button>
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-element-{{$movement->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg><a>Elementos</a>
                                </button>
                            </td>
                        </tr>
                        @include('insaelements::layouts.Modals.modal-detail')
                        @include('insaelements::layouts.Modals.modal-element')
                      @endforeach
                    </table> --}}
