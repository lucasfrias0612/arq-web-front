<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Nueva Reunion</title>
  </head>
  <body>
    
    <?php require_once 'part-header.php' ?>

    <main>
    <br>
        <div class="container-fluid">
            <h2>Creacion de nueva reunión</h2> <br>

<?php
if (isset($_GET['meetingid'])) {
    $meetingid= $_GET['meetingid'];
    $response = file_get_contents('http://unpaz.net.ar:8080/v1/meeting/'.$meetingid);
    echo $response;
} else {
    // Fallback behaviour goes here
}
?>
            <form>
                 <div class="form-group">
                    <label for="userid">Userid</label>
                    <input type="text" class="form-control" id="userid" aria-describedby="userid">
                </div>
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" aria-describedby="title">
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" aria-describedby="descripcion">
                </div>


                <div class="form-group">
                    <label for="time">Fecha</label>
                    <input type="text" class="form-control" id="time">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" class="btn btn-link">Volver</a>
            </form>

        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>