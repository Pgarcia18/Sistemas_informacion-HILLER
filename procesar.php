<?php
$nroseriemaquina= $_POST['nroserie'];
$fechaInicio= $_POST['fecha'];
$horaInicio= $_POST['hora'];
$mecanicoAsignado= $_POST['mecanico'];

echo "<h2>Informacion recibida desde php</h2>";
echo "El numero de serie de la máquina es: ". $nroseriemaquina."<br/>";
echo "La fecha de inicio es: ". $fechaInicio."<br/>";
echo "La hora de inicio es: ". $horaInicio."<br/>";
echo "El mecanico asignado es: ". $mecanicoAsignado."<br/>";
?> 