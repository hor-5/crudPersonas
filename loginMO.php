<?php


include_once "config.php";
include_once "entidades/usuarioMO.php";

//iniciamos la sesion.
session_start();

if($_POST)
{
  $usuario = trim($_POST["txtUsuario"]);
  $clave = trim($_POST["txtClave"]);

  $entidadUsuario = new UsuarioMO();
  $entidadUsuario->obtenerPorUsuario($usuario);

  if($entidadUsuario->verificarClave($clave, $entidadUsuario->clave))
  {
      $_SESSION["nombre"] = $entidadUsuario->nombre;

      header("location: MO");
      
  }else
  {
    $msg ="Usuario o clave incorrecto";
  }
}




?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/images/MO.jpg"/>
    <link rel="shortcut icon" type="image/x-icon" href="/images/MO.png" />


</head>
<style>
    .boton3{
        background-color: #367588!important;
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
        transition: 0.5s;
    }
    .boton3:hover{
        background-color: #003153!important;
        color: #f5f5f5;
    }
    input{
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
    }
</style>

<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="images/MO.jpg" alt="" width="500px" height="520px"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Registro de prospectos</h1>
                  </div>  

                  <form class="user" action="" method="POST">
                  <?php if(isset($msg)) { ?>                  
                  <div class="alert alert-danger" role="alert">
                  <?php echo $msg; ?>
                </div>
                  <?php } ?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" value="admin" placeholder="admin" id="txtUsuario" name="txtUsuario" aria-describedby="emailHelp" placeholder="Ingrese usuario" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" value="admin123" placeholder="admin123" id="txtClave" name="txtClave" placeholder="Contraseña" require>
                    </div>

                    <button type="submit" class="btn btn-dark btn-user btn-block boton3">
                      Ingresar
                    </button> 
                    <hr>

                  </form>
                  <div class="text-left">

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
