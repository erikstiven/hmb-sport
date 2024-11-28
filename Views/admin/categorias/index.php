<?php include_once 'Views/template/header-admin.php'; ?>

<button class="btn btn-primary mb-2" id="nuevo_registro">Nuevo</button>


<!-- <div class="card">
    <div class="card-body shadow-lg">
        <table class="table-responsive">
            <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="tblUsuarios">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </table>
    </div>
</div> -->

<div class="col-12">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCategorias">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Imagen</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="titleModal"></h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="imagen_actual" name="imagen_actual">

                    <div class="form-group mb-2">
                        <label for="categoria">Nombre</label>
                        <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen (Opcional)</label>
                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                    <button class="btn btn-danger  " type="button" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once 'Views/template/footer-admin.php'; ?>


<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>


</body>

</html>