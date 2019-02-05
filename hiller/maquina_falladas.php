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
        <title>Hiller - Maquinas-Falladas</title>
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
                <li><a href="IniciarReparacion.php"><em class="fa fa-toggle-off">&nbsp;</em> Inicio de Reparacion</a></li>
                <li><a href="FinalizarReparacion.php"><em class="fa fa-toggle-off">&nbsp;</em>Final Reparacion</a></li>
                <li><a href="traslado.php"><em class="fa fa-clone">&nbsp;</em> Traslados</a></li>
                 <li><a href="Verificar.php"><em class="fa fa-toggle-off">&nbsp;</em> Verificacion de Orden</a></li>
                 <li><a href="traslado.php"><em class="fa fa-toggle-off">&nbsp;</em> Orden traslado</a></li>
                 <li><a href="maquina_falladas.php"><em class="fa fa-toggle-off">&nbsp;</em> Maquinas falladas</a></li>              
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
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Maquinas Falladas</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Maquinas Falladas</h1>
                </div>
            </div><!--/.row-->

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            REGISTRO MAQUINAS FALLADAS
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="" method="post">
                                <fieldset>
                                    <!-- idmaquina input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="idmaquina">id maquina</label>
                                        <div class="col-md-8">
                                            <input id="idmaquina" name="idmaquina" type="text" placeholder="id maquina" class="form-control" value="<?php if($rowM[1] != "" ){ echo $rowM[1]; } ?>" required>
                                        </div>
                                    </div>

                                    <!-- Codigo input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="codmaquina">Codigo maquina</label>
                                        <div class="col-md-8">
                                            <input id="codmaquina" name="codmaquina" type="text" placeholder="cod maquina" class="form-control" value="<?php if($rowM[2] != "" ){ echo $rowM[2]; } ?>" required>
                                        </div>
                                    </div> 
                                    <!-- Descripcion input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="descripcion">Descripcion</label>
                                        <div class="col-md-8">
                                            <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion" class="form-control" value="<?php if($rowM[3] != "" ){ echo $rowM[3]; } ?>" required>
                                        </div>
                                    </div> 
                                    <!-- proveedor input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="idprov">Proveedor</label>
                                        <div class="col-md-8">
                                            <select name="proveedor" class="form-control">
                                                <option value="0">Seleccione...</option>
                                                <?php
                                                $sqlPro = "Select p.idpersona, u.`Nombre` 
                                                            from tblusuarios u
                                                            join tblpersona p on p.idpersona = u.idpersona 
                                                            join tblcargo c on c.idcargo = u.idcargo 
                                                            where c.idCargo = 1";

                                                $resPro = mysql_query($sqlPro, $link);
                                                while ($rowPro = mysql_fetch_row($resPro)) {
                                                    ?>
                                                    <option value="<?php echo $rowPro[0]; ?>"><?php echo $rowPro[1]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!--<div class="form-group">
                                        <h3>Detalle del pedido</h3>
                                        <table class="table table-bordered table-responsive table-striped">
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="proveedor" class="form-control">
                                                        <option value="0">Seleccione...</option>
                                                        <?php
                                                        $sqlProd = "SELECT `idproducto`, `Nombre` FROM `tblproducto`";
                                                        $resProd = mysql_query($sqlProd, $link);
                                                        while ($rowProd = mysql_fetch_row($resProd)) {
                                                            ?>
                                                            <option value="<?php echo $rowProd[0]; ?>"><?php echo $rowProd[1]; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td><input name="precio" type="text" placeholder="Precio Ej: 10,50" class="form-control"></td>
                                                <td><input name="cantidad" type="text" placeholder="Cantidad" class="form-control"></td>
                                                <td><input name="subtotal" type="text" placeholder="subtotal Ej: 10,50" class="form-control"></td>
                                            </tr>
                                        </table>
                                    </div>-->
                                    <!-- Message body -->
                                   <!-- <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <label class="col-md-4 control-label" for="total">Total </label>
                                        <div class="col-md-4">
                                            <input id="total" name="total" type="text" placeholder="Total" class="form-control">
                                        </div>
                                    </div>
                                    -->
                                    <!-- Message body -->
                                  <!--  <div class="form-group">
                                        <label class="col-md-4 control-label" for="observaciones"> Observaciones</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones..." rows="5"></textarea>
                                        </div>
                                    </div> -->

                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="col-md-12 widget-right">
                                            <button type="submit" class="btn btn-default btn-md pull-right">Guardar</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div><!--/.col-->
                <div class="col-md-2"></div>


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