<?php



include_once "config.php";
include_once "entidades/prospecto.php";

session_start();
if(!isset ($_SESSION["nombre"])){
  header("Location:loginMO");
}

if($_POST){
  if( isset ($_POST["btnCerrar"])){
      session_destroy();
      header("location:loginMO");
  }
} 

$prospecto = new Prospecto();
$aProspectos = $prospecto->obtenerTodos();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro de prospectos</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/images/MO.jpg" />
    <link rel="shortcut icon" type="image/x-icon" href="/images/MO.jpg" />


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
    img{
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
    }
    .notice {
    padding: 15px;
    background-color: #fafafa;
    border-left: 6px solid #7f7f84;
    margin-bottom: 10px;
    -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
       -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
            box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
    border-radius: 20px;
}
.notice-info {
    border-color: #45ABCD;
}
@media (min-width:765px){
    .mobile{
        display: none;
    }
}
@media (max-width:765px){
    .desktop{
        display:none;
    }
    h1{
        font-size: 25px;
        padding: 10px;
    }
}
</style>
<body id="page-top">

    <?php include_once("headerMO.php"); ?>
    

    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <h1 class="d-flex justify-content-center">Listado de Prospectos</h1>
        <div class="row">
            <div class="col-sm-6 form-group">
                <a href="MO-formulario.php" class="btn btn-primary boton3"><i class="fas fa-user-plus"></i> Nuevo</a>
            </div>
        </div>
        <div class="desktop">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover border border-lg">
                        <tr class="table-light">                
                            <th>Nombre y apellido</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>                
                            <th>Fecha de Nacimiento</th>
                            <th>Email</th>                
                            <th>Acciones</th>
                        </tr>
                        <?php foreach ($aProspectos as $prospecto) : ?>
                            <tr>                
                                <td><?php echo $prospecto->nombre; ?></td>
                                <td><?php echo $prospecto->sexo; ?></td>
                                <td><?php echo $prospecto->telefono; ?></td>
                                <td><?php echo $prospecto->direccion; ?></td>                   
                                <td><?php echo date_format(date_create($prospecto->fecha_nac), "d/m/Y"); ?></td>
                                <td><?php echo $prospecto->email; ?></td>                    
                                <td><a  href="MO-formulario.php?id=<?php echo $prospecto->id; ?>"><i class="fas fa-user-edit"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>
            
        </div>
        <div class="mobile">
            <?php foreach ($aProspectos as $prospecto) : ?>
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="notice notice-info">
                        <div class="mt-1">
                            <strong>Nombre:</strong> <?php echo $prospecto->nombre; ?><br>
                        </div>                
                        <div class="mt-1">
                            <strong>Sexo:</strong> <?php echo $prospecto->sexo; ?><br>
                        </div>
                    
                        <div class="mt-1">
                            <strong>Telefono:</strong> <?php echo $prospecto->telefono; ?><br>
                        </div>
                        <div class="mt-1">
                            <strong>Direccion:</strong> <?php echo $prospecto->direccion; ?><br>
                        </div>
                        <div class="mt-1">
                            <strong>Fecha de nacimiento:</strong> <?php echo date_format(date_create($prospecto->fecha_nac), "d/m/Y"); ?><br>
                        </div>
                        <div class="mt-1">
                            <strong>Email:</strong> <?php echo $prospecto->email; ?><br>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="MO-formulario.php?id=<?php echo $prospecto->id; ?>" class="btn btn-info rounded-pill">Editar <i class="fas fa-edit"></i></a>
                        </div>                   

                            
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
    <!-- /.container -->

    </div>

    <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desea salir del sistema?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hacer clic en "Cerrar sesión" si deseas finalizar tu sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary boton3" name="btnCerrar" action="login.php" type="submit">Cerrar sesion</button>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    </form>

</body>

</html>