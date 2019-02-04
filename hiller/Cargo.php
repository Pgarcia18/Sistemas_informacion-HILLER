<?php
include 'config.php';

session_start();
$link = Conectarse();

?>
 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hiller - Cargos</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
       <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicio.php"><span>Hiller</span>Admin</a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo $_SESSION['user']; ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>  
                <div class="clear"></div>
            </div>
            <div class="divider"></div>
            <ul class="nav menu">
                <li><a href="inicio.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li class="active"><a href="pedidos.php"><em class="fa fa-calendar">&nbsp;</em> Pedidos</a></li>
                <li><a href="entregas.php"><em class="fa fa-bar-chart">&nbsp;</em> Entregas</a></li>
                <li><a href="reparacion.php"><em class="fa fa-toggle-off">&nbsp;</em> Reparacion</a></li>
                <li><a href="traslado.php"><em class="fa fa-clone">&nbsp;</em> Traslados</a></li>
                <li><a href="cargo.php"><em class="fa fa-clone">&nbsp;</em> Cargos</a></li>
                <li class="parent ">
                    <a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-navicon">&nbsp;</em> Parametros <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a class="" href="personas.php"><span class="fa fa-arrow-right">&nbsp;</span> Personas</a>
                        </li>
                        <li>
                            <a class="" href="usuarios.php"><span class="fa fa-arrow-right">&nbsp;</span> Usuarios</a>
                        </li>
                        <li>
                            <a class="" href="cargos.php"><span class="fa fa-arrow-right">&nbsp;</span> Cargos</a>
                        </li>
                        <li>
                            <a class="" href="productos.php"><span class="fa fa-arrow-right">&nbsp;</span> Productos</a>
                        </li>
                        <li>
                            <a class="" href="almacen.php"><span class="fa fa-arrow-right">&nbsp;</span> Almacen</a>
                        </li>
                    </ul>
                </li>
                <li><a href="salir.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="inicio.php">
                            <em class="fa fa-home"></em> Inicio
                        </a> / </li>
                    <li class="active">Cargos</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cargos</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-defarequiredult">
                        <div class="panel-heading">
                            Registro de Cargos
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset> 
                                <div class="form-group">
                                            <label class="col-md-4 control-label" for="nombreCargo">Nombre</label>
                                            <div class="col-md-8">
                                                <input id="nombreCargo" name="nombreCargo" type="text" placeholder="Nombre de Cargo" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="descripcionCargo">Descripcion</label>
                                            <div class="col-md-8">
                                                <input id="descripcionCargo" name="descripcionCargo" type="text" placeholder="Descripcion de cargo" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        
                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-12 widget-right">
<!--                                            <input id="eliminar" type="submit" class="btn btn-default btn-md pull-right" name="Eliminar" value="Eliminar"/>
                                            <input id="modificar" type="submit" class="btn btn-default btn-md pull-right" name="Mofificar" value="Modificar"/>-->
                                            <input id="guardar" type="submit" class="btn btn-default btn-md pull-right" name="Guardar" value="Guardar"/>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="panel panel-footer">
                        <?php
                        if (isset($_POST['Guardar'])) {

                            $nom = htmlspecialchars($_POST['nombreCargo']);
                            $des = htmlspecialchars($_POST['descripcionCargo']);

                            $sqlG = "INSERT INTO `tblcargo`( `Nombre`, `Descripcion`) "
                                    . "VALUES('" . $nom . "','" . $des . "')";
                            $resG = mysql_query($sqlG, $link);
                            if ($resG) {
                                echo "<div class=\"alert alert-success\">Registro Guardado!!</div>";
                                echo "<meta http-equiv=\"Refresh\" content=\"2; url=cargo.php\">";
                            } else {
                                die("<div class=\"alert alert-danger\">Ocurrio un error al registrar.<br> " . mysql_errno() . " " . mysql_error() . "</div>");
                            }
                        }

                        if (isset($_POST['Modificar'])) {

                            $nomM = htmlspecialchars($_POST['nombreCargo']);
                            $desM = htmlspecialchars($_POST['descripcionCargo']);
                            $sqlU = "UPDATE `tblcargo`set `Nombre` = '" . $nomM . "', `Descripcion`='" . $desM . "'"
                                    . " WHERE Nombre = " . $nomM;
                            //echo $sqlU;
                            $resU = mysql_query($sqlU, $link);
                            if ($resU) {
                                echo "<div class=\"alert alert-success\">Registro modificado!!</div>";
                                echo "<meta http-equiv=\"Refresh\" content=\"2; url=cargo.php\">";
                            } else {
                                die("<div class=\"alert alert-danger\">Ocurrio un error al registrar.<br> " . mysql_errno() . " " . mysql_error() . "</div>");
                            }
                        }

                        if (isset($_POST['Eliminar'])) {

                            $sqlD = "DELETE FROM tblcargo WHERE Nombre = " . $nomM;
                            //echo $sqlD;
                            $resD = mysql_query($sqlD, $link);
                            if ($resD) {
                                echo "<div class=\"alert alert-warning\">Registro Eliminado!!</div>";
                                echo "<meta http-equiv=\"Refresh\" content=\"2; url=cargo.php\">";
                            } else {
                                die("<div class=\"alert alert-danger\">Ocurrio un error al registrar.<br> " . mysql_errno() . " " . mysql_error() . "</div>");
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div><!--/.col-->
                <div class="col-md-3"></div>
            </div>

            <div class="row>"
                 <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Listado de Personas
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                        </div>
                        <table class="table table-responsive table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                            </tr>
<?php
$sql = "SELECT * FROM `tblcargo`";
$result = mysql_query($sql, $link) or die("Error");

while ($row = mysql_fetch_row($result)) {
    ?>
                                <tr>
                                    <td><?php echo $row[0]; ?></td>
                                    <td><?php echo $row[1]; ?></td>
                                    <td><?php echo $row[2]; ?></td>
                                    <td>
                                        <div class="pull-right action-buttons">
                                            <a href="cargo.php?id=<?php echo $row[0]; ?>" class="edit"><em class="fa fa-edit"></em> </a>
                                            <a href="cargo.php?id=<?php echo $row[0]; ?>" class="trash"><em class="fa fa-trash"></em> </a>
                                        </div>
                                    </td>
                                </tr>
    <?php
}
?>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-sm-12">
                <p class="back-link">Hiller Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>

</body>
</html>
