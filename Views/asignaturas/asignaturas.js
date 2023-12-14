//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_ asignatura").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/asignaturas.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre_asignatura}</td>
                <td>${valor.estudiante}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ID_asignatura
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ID_asignatura
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ID_asignatura
            })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_estudiante").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_asignatura")[0]);
  var ruta = "";
  var ID_asignatura = document.getElementById("ID_asignatura").value;
  if (ID_asignatura > 0) {
    ruta = "../../Controllers/asignaturas.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/asignaturas.controller.php?op=insertar";
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("asignaturas", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("asignaturas", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaEstudiantes = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/estudiantes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.ID_estudiante}"> ${val.Nombre}</option>`;
      });
      $("#PaisId").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ID_asignatura) => {
  await cargaEstudiantes();
  $.post(
    "../../Controllers/asignaturas.controller.php?op=uno",
    { ID_asignatura: ID_asignatura },
    (res) => {
      res = JSON.parse(res);

      $("#ID_asignatura").val(res.ID_asignatura);
      $("#ID_estudiante").val(res.ID_estudiante);
      //document.getElementById("PaisId").value = res.PaisesId;


      $("#Nombre_asignatura").val(res.Nombre_asignatura);
    }
  );
  $("#Modal_asignatura").modal("show");
};

var eliminar = (ID_asignatura) => {
  Swal.fire({
    title: "Estudiantes",
    text: "Esta seguro de eliminar la asignatura",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/asignaturas.controller.php?op=eliminar",
        { ID_asignatura: ID_asignatura },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("asignaturas", "Asignatura Eliminada", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  impia_Cajas();
};

var limpia_Cajas = () => {
  document.getElementById("ID_asignatura").value = "";
  document.getElementById("ID_estudiante").value = "";
  document.getElementById("Nombre_asignatura").value = "";
  document.getElementById("Calificacion").value = "";
  document.getElementById("Fecha_examen").value = "";
  $("#Modal_asignatura").modal("hide");
};
init();
