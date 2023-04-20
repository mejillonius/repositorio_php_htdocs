<?php
//recoger elvalor numérico. 1,2, 2 o 3 del $rol,
/*  en MdlUser de la otra app hemos recogido en $rol al loguearnos
if ($pwMatch) {
      //recuperamos su rol del  usuario
      $rol = $loguser['rol_id'];
      //iniciamos sesión
      session_start();
      $_SESSION['rol'] = $rol;
     /*  var_dump($rol); */
      /* y lo enviamos a esta app   header("location: ../..../.../ruta a la otra parte"); 

      /venimos de una sesion iniciada en el proyecto users asi que mantenemos la sesion abierta 
session_start();
//requerimos de los archivos php necesarios

//dependiendo del rol redigiremos hacia un archivo php en la vista que tendra mas o menos permisos de usuario
if($_SESSION['rol']==1){
      //redireccion si es administrador (puede crear películas, editarlas y eliminarlas)
      require "../...../vistaadmin.php";
}
else if($_SESSION['rol']==2){
      //redirección si es un editor (puede editar pelis)
      require "../ruta/editor.php";
}
else if($_SESSION['rol']==3){
      //redireccion si es un externo (solo puede ver, abrir el detalle de la peli)
      require "../ruta/externo.php";
}

Todos pueden cerrar sesión y automáticamente son llevados a la app de registro / logueo
} */