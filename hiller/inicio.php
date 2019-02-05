<?php

include 'config.php';

session_start();

$link = Conectarse();

$sqlP = "SELECT count(*) FROM `tblorden_pedido`";
$resP = mysql_query($sqlP, $link);
$rowP = mysql_fetch_row($resP);

$sqlE = "SELECT count(*) FROM `tblorden_entrega`";
$resE = mysql_query($sqlE, $link);
$rowE = mysql_fetch_row($resE);

$sqlR = "SELECT count(*) FROM `tblreparacion`";
$resR = mysql_query($sqlR, $link);
$rowR = mysql_fetch_row($resR);

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hiller - Dashboard</title>
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
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Personas</a>
                        </li>
                        <li>
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Usuarios</a>
                        </li>
                        <li>
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Cargos</a>
                        </li>
                        <li>
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Productos</a>
                        </li>
                        <li>
                            <a class="" href="#"><span class="fa fa-arrow-right">&nbsp;</span> Almacen</a>
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
                    <li class="active">Dashboard</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div><!--/.row-->

            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
                                <div class="large"><?php echo $rowP[0]; ?></div>
                                <div class="text-muted">Nuevos Pedidos</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                                <div class="large"><?php echo $rowE[0]; ?></div>
                                <div class="text-muted">Nuevas Entregas</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large"><?php echo $rowR[0]; ?></div>
                                <div class="text-muted">Nuevas Reparaciones</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                                <div class="large">25.2k</div>
                                <div class="text-muted">Page Views</div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
 
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default chat">
                        <div class="panel-heading">
                            Chat
                            <ul class="pull-right panel-settings panel-button-tab-right">
                                <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                        <em class="fa fa-cogs"></em>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <ul class="dropdown-settings">
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 1
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 2
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 3
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                            <ul>
                                <li class="left clearfix"><span class="chat-img pull-left">
                                        <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
                                    </div>
                                </li>
                                <li class="right clearfix"><span class="chat-img pull-right">
                                        <img src="http://placehold.it/60/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header"><strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
                                    </div>
                                </li>
                                <li class="left clearfix"><span class="chat-img pull-left">
                                        <img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header"><strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small></div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
                                    <button class="btn btn-primary btn-md" id="btn-chat">Send</button>
                                </span></div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            To-do List
                            <ul class="pull-right panel-settings panel-button-tab-right">
                                <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                        <em class="fa fa-cogs"></em>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <ul class="dropdown-settings">
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 1
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 2
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 3
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                            <ul class="todo-list">
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-1" />
                                        <label for="checkbox-1">Make coffee</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-2" />
                                        <label for="checkbox-2">Check emails</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-3" />
                                        <label for="checkbox-3">Reply to Jane</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-4" />
                                        <label for="checkbox-4">Make more coffee</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-5" />
                                        <label for="checkbox-5">Work on the new design</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                                <li class="todo-list-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox-6" />
                                        <label for="checkbox-6">Get feedback on design</label>
                                    </div>
                                    <div class="pull-right action-buttons"><a href="#" class="trash">
                                            <em class="fa fa-trash"></em>
                                        </a></div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn">
                                    <button class="btn btn-primary btn-md" id="btn-todo">Add</button>
                                </span></div>
                        </div>
                    </div>
                </div><!--/.col-->


                <div class="col-md-6">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            Timeline
                            <ul class="pull-right panel-settings panel-button-tab-right">
                                <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                        <em class="fa fa-cogs"></em>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <ul class="dropdown-settings">
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 1
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 2
                                                    </a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">
                                                        <em class="fa fa-cog"></em> Settings 3
                                                    </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body timeline-container">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge primary"><em class="glyphicon glyphicon-link"></em></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge"><em class="glyphicon glyphicon-camera"></em></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-badge"><em class="glyphicon glyphicon-paperclip"></em></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">Lorem ipsum dolor sit amet</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.col-->
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