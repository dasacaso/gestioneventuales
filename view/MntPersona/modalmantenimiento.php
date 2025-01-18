<div id="modalmantenimiento" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" id="persona_form" method="post">
                <div class="modal-header">             
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>        
                <div class="modal-body">
                    <input type="hidden" id="empleado_id" name="empleado_id">
                    <div class="form-group">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese Nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese Apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="form-label">Telefono Casa</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono de Casa" required>
                    </div>
                    <div class="form-group">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingrese Número de Celular" required>
                    </div>
                    <div class="form-group">
                        <label for="id" class="form-label">Código Marcación</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Ingrese Código de Marcación" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese la cédula" required>
                    </div>                   
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
                    </div>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>            
        </div>
    </div>
</div>