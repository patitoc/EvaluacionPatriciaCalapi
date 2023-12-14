<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Asignaturas/h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaAsignaturas()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_asignatura">
                        Nueva Asignatura
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre Asignatura</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombre Estudiante</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Calificacion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha examen</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_estudiantes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_asignatura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_asignatura">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Asignaturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ID_asignatura" id="ID_asignatura">                  
                    <div class="form-group">
                        <label for="nombre_asignatura">Nombre de la Asignatura</label>
                        <input type="text" required class="form-control" id="Nombre_asignatura" name="Nombre_asignatura" placeholder="Ingrese el nombre de la asignatura">
                    </div>
                    <div class="form-group">
                        <label for="ID_estudiante">Estudiante</label>
                      <select name="ID_estudiante" id="ID_estudiante" class="form-control">
                        <option value="0">Seleccione un estudiante</option>
                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="asignaturas.js"></script>