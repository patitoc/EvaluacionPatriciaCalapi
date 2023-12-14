//aqui va a estar el codigo de usuarios.model.js

function init(){
    $("#frm_estudiantes").on("submit", function(e){
        guardaryeditar(e);
    });
}


$().ready(()=>{
    todos();
});

var todos = () =>{
    var html = "";
    $.get("../../Controllers/estudiantes.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
       
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ID_estudiante
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ID_estudiante
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ID_estudiante
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_estudiantes").html(html);
    });
  };

  var guardaryeditar=(e)=>{
    e.preventDefault();
    var dato = new FormData($("#frm_estudiantes")[0]);
    var ruta = '';
    var ID_estudiante = document.getElementById("ID_estudiante").value
    if(ID_estudiante > 0){
     ruta = "../../Controllers/estudiantes.controller.php?op=actualizar"
    }else{
        ruta = "../../Controllers/estudiantes.controller.php?op=insertar"
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
            Swal.fire("Estudiantes", "Registrado con éxito" , "success");
            todos();
            limpia_Cajas();
          } else {
            Swal.fire("usuarios", "Error al guardo, intente mas rtarde", "error");
          }
        },
      });
  }

  var editar = (ID_estudiante)=>{
  
    $.post(
      "../../Controllers/estudiantes.controller.php?op=uno",
      { ID_estudiante: ID_estudiante },
      (res) => {
        res = JSON.parse(res);
        $("#ID_estudiante").val(res.ID_estudiante);
        $("#Nombre").val(res.Nombre);
    
      }
    );
    $("#Modal_estudiantes").modal("show");
  }


  var eliminar = (ID_estudiante)=>{
    Swal.fire({
        title: "Estudiantes",
        text: "Esta seguro de eliminar el estudiante",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Eliminar",
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(
            "../../Controllers/estudiantes.controller.php?op=eliminar",
            { ID_estudiante: ID_estudiante },
            (res) => {
              res = JSON.parse(res);
              if (res === "ok") {
                Swal.fire("Estudiantes", "Estudiante Eliminado", "success");
                todos();
              } else {
                Swal.fire("Error", res, "error");
              }
            }
          );
        }
      });
  
      impia_Cajas();
}
  
  var limpia_Cajas = ()=>{
    document.getElementById("ID_estudiante").value = "";
    document.getElementById("Nombre").value = "";
    document.getElementById("Edad").value = "";
    document.getElementById("Carrera").value = "";
    document.getElementById("Promedio").value = "";
    $("#Modal_paises").modal("hide");
  
  }
  init();