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
    $response = json_decode(file_get_contents('http://unpaz.net.ar:8080/v1/meeting/'.$meetingid), true);
} else {
    // Fallback behaviour goes here
}
?>
            <input type="text" id="meetingid" name="id" value="<?php echo $response[data][id] ?>" hidden>
            <form id="reg-form">
                 <div class="form-group">
                    <label for="userid">Userid</label>
                    <input readonly type="text" class="form-control" id="userid" name="userId" aria-describedby="userid" value="<?php echo $response[data][userid] ?>">
                </div>
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?php echo $response[data][title] ?>">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="description" aria-describedby="descripcion" value="<?php echo $response[data][description] ?>">
                </div>

                <div class="form-group">
                    <label for="time">Fecha</label>
                    <input type="text" class="form-control" id="time" name="time" value="<?php echo $response[data][time] ?>">
                </div>

                <button type="button" id="post-btn" class="btn btn-primary">Submit</button>
                <a href="index.php" class="btn btn-link">Volver</a>
            </form>

        </div>
    </main>

         <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
              $("#post-btn").click(function(){
                let formData = getFormData($("#reg-form"));
                let meetingid= document.getElementById('meetingid').value;
                let patchData={userId: formData.userId, meetingId: meetingid};
                console.log(JSON.stringify(patchData));
                $.ajax({
                                 type: 'DELETE',
                                 url: 'http://unpaz.net.ar:8080/v1/meeting',
                                 data: JSON.stringify(patchData),
                                 processData: false,
                                 contentType: 'application/merge-patch+json',
                              });
              });

              function getFormData($form){
                  var unindexed_array = $form.serializeArray();
                  var indexed_array = {};

                  $.map(unindexed_array, function(n, i){
                      indexed_array[n['name']] = n['value'];
                  });

                  return indexed_array;
              }
        </script>
    </body>
</html>