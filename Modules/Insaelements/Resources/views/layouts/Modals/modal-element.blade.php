<div class="modal fade" id="modal-element-{{ $movement->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title">Elementos del prestamo</h5>
            </div>
            <form>
                <div class="modal-body">

                    <div class="row">
                        @foreach ($movement->detail_movements as $movementdetail)
                        <div class="col-md">
                            <div class="form-group">
                                    <label for="elemento">Elementos:</label>
                                    <input id="objetive" type="text" class="form-control"
                                        value="{{ $movementdetail->inventory->element->name }}">
                                    <label for="elemento">Descripcion:</label>
                                    <input id="objetive" type="text" class="form-control"
                                        value="{{ $movementdetail->inventory->element->description }}">
                                    <label for="elemento">Codigo de inventario:</label>
                                    <input id="objetive" type="text" class="form-control"
                                        value="{{ $movementdetail->inventory->inventoryCode }}">
                                    <label for="elemento">Estado:</label>
                                    <input id="objetive" type="text" class="form-control"
                                        value="{{ $movementdetail->inventory->state }}">
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <span class="button" data-dismiss="modal" aria-label="Close">cerrar</span>
                        </button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
