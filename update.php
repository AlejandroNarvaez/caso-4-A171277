<?php
$cliente = new SoapClient(null, array(
    'location'=>'https://caso4a171277.000webhostapp.com/server.php',
    'uri'=>'https://caso4a171277.000webhostapp.com/server.php',
    'trace'=>1
));

try {
  if (isset($_POST['idUpdate']) && isset($_POST['tipoMotoUpdate']) && isset($_POST['marcaUpdate']) && isset($_POST['precioUpdate'])) {
    $id= $_POST['idUpdate']; 
    $tipo=  $_POST['tipoMotoUpdate'];
    $marca = $_POST['marcaUpdate'];
    $precio = $_POST['precioUpdate'];
    $respuesta=$cliente->__soapCall("updateMoto", [$id, $tipo, $marca, $precio]);
      header ("Location:https://caso4a171277.000webhostapp.com/cliente.php?success=update");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>