<?php
$cliente = new SoapClient(null, array(
    'location'=>'https://caso4a171277.000webhostapp.com/server.php',
    'uri'=>'https://caso4a171277.000webhostapp.com/server.php',
    'trace'=>1 
));

try {
  if (isset($_GET['id'])) {
    $id= $_GET['id'];
    $respuesta=$cliente->__soapCall("deleteMoto", [$id]);
      header ("Location:https://caso4a171277.000webhostapp.com/cliente.php?success=delete");
  }
//  var_dump( explode(' ', $respuesta));
} catch (SoapFault $ex) {
    echo $ex->getMessage().PHP_EOL;
}
echo $_GET['id'];

?>