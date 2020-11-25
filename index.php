<?php
/*require_once 'class/Meeting.php'; 

try {
    $meeting = new Meeting();
    $meetings_list = $meeting->getAll();
} catch (Exception $ex) {
    die($ex->getMessage());
} */
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">  -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">



    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">



    <title>Meetings</title>
  </head>
  <body>
    
    <?php require_once 'part-header.php' ?>

    <main>
    <br>
        <div class="container-fluid">
            <h2>Reuniones</h2> <br>

            <table class="table table-striped table-bordered" id="myTable" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Título</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Título</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Fecha</th>
                   <th scope="col">Acciones</th>
                </tr>
              </tfoot>
            </table>
        </div>

            <div  class="container-fluid">
              <h2>Usuarios</h2> <br>

            <table class="table table-striped table-bordered" id="myTable_usuarios" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Acciones</th>
                </tr>
              </tfoot>
            </table>


            </div>

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>







<script>
console.log(fetch)
 $('#myTable').DataTable({

        ordering: true,
        searching: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        //serverSide: true,
        ajax: {
            url: "http://unpaz.net.ar:8080/v1/meeting",
            type: "GET",
            dataType: "json",
            "dataSrc": function ( json ) {
                var data = [];
                for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                    data[i] = [];
                    data[i][0] = json.data[i].id;
                    data[i][1] = json.data[i].title;
                    data[i][2] = json.data[i].description;
                    data[i][3] = json.data[i].time;
                    data[i][4] = `<a href="http://localhost/arq-web-front/editar.php?meetingid=${json.data[i].id}" >Editar</a> <a href="http://localhost/arq-web-front/delete.php?meetingid=${json.data[i].id}" >Eliminar</a>`;

                }
                return data;
            }
        }

    });





console.log(fetch)
 $('#myTable_usuarios').DataTable({

        ordering: true,
        searching: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        //serverSide: true,
        ajax: {
            url: "http://unpaz.net.ar:8080/v1/user",
            type: "GET",
            dataType: "json",
            "dataSrc": function ( json ) {
                var data = [];
                for ( var i=0, ien=json.data.length ; i<ien ; i++ ) {
                    data[i] = [];
                    data[i][0] = json.data[i].id;
                    data[i][1] = json.data[i].email;
                    data[i][2] = json.data[i].password;
                    data[i][3] = json.data[i].fullName;
                    data[i][4] = `<a href="http://localhost/arq-web-front/editar_usuario.php?user=${json.data[i].id}" >Editar</a> <a href="http://localhost/arq-web-front/delete_usuario.php?user=${json.data[i].id}" >Eliminar</a>`;

                }
                return data;
            }
        }

    });














   </script>


  </body>
</html>



