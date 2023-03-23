<?php


$message = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

    // recogemos detalles
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    //encriptamos
    $newFileName = md5($fileName) . '.' . $fileExtension;
    var_dump($newFileName);
    // extensiones aceptadas
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions)) {
      // directorio donde irá
      $uploadFileDir = 'uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;

      if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $message = 'Archivo subido correctamente.';
      } else {
        $message = 'Error. Directorio con permisos?.';
      }
    } else {
      $message = 'Subida erronea. Extensiones permitidas: ' . implode(',', $allowedfileExtensions);
    }
  } else {
    $message = 'Error: .<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
  header("Refresh:5;url= index.php");
}
