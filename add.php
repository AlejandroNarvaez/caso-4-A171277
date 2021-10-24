<?php
$cliente = new SoapClient(null, array(
    'location'=>'https://caso4a171277.000webhostapp.com/server.php',
    'uri'=>'https://caso4a171277.000webhostapp.com/server.php',
    'trace'=>1 
));
try {
    if (isset($_POST['tipoMoto']) && isset($_POST['marca']) && isset($_POST['precio'])) {
      $tipo=  $_POST['tipoMoto'];
      $marca = $_POST['marca'];
      $precio = $_POST['precio'];
        $respuesta=$cliente->__soapCall("addMoto", [$tipo, $marca, $precio]);
        header("Location:https://caso4a171277.000webhostapp.com/cliente.php?success=add");
    }
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
?>