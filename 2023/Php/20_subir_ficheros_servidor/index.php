<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UPLOAD FILES</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <?php

  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <span>Subir imagen:</span>
      <input type="file" name="uploadedFile" />
    </div>

    <input type="submit" name="uploadBtn" value="Upload" />
  </form>
</body>

</html>