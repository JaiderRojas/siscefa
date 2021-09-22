<div class="modal fade" id="modal-detail-{{ $movement->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del prestamo</h5>
            </div>
            <form action="{{ route('registrodetalle', $movement->id)}}" method="POST">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="solicitante">Solicitante:</label>
                        <input id="solicitante" type="text" class="form-control" value="{{ $movement->responsabilities[0]->people->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="Fechaprestamo">Fecha del prestamo:</label>
                        <input id="Fechaprestamo" type="date" class="form-control" value="{{ $movement->registration_date}}">
                    </div>
                    <div class="form-group">
                        <label for="Fecharegreso">Fecha de regreso:</label>
                        <input id="Fecharegreso" type="date" class="form-control" value="{{ $movement->return_date}}">
                    </div>
                    <div class="form-group">
                        <label for="Dependencia">Dependencia:</label>
                        <input id="Dependencia" type="text" class="form-control" value="{{ $movement->dependence}}">
                    </div>
                    <div class="form-group">
                        <label for="translado">Lugar al cual se trasladan los elementos:</label>
                        <input id="translado" type="text" class="form-control" value="{{ $movement->translation}}">
                    </div>
                    <div class="form-group">
                        <label for="objetive">Objetivo por el cual se transladan los elementos:</label>
                        <input id="objetive" type="text" class="form-control" value="{{ $movement->objective}}">
                    </div>
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <span class="button" data-dismiss="modal" aria-label="Close">cerrar</span>
                    </button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
