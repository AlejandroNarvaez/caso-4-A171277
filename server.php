<?php

class Motos
{
    public function showData()
    {
        $dataset=""; 
        $conn = new mysqli("localhost", "id17824793_root", "HardCore23!123", "id17824793_motos");
        $sql  = "SELECT * FROM motos ORDER BY id ASC";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        
        foreach ($result as $data) {
            $dataset .= ("<tr>");
            $dataset .= ("<td>" . $data['id'] . "</td>");
            $dataset .= ("<td>" .$data['tipo_de_moto']. "</td>");
            $dataset .= ("<td>" .$data['marca'] . "</td>");
            $dataset .= ("<td>" .$data['precio'] . "</td>");
            $dataset .= ("<td >
            <form action='https://caso4a171277.000webhostapp.com//delete.php?id=". $data['id']."' method='post'>
            <button name='id' class='btn btn-danger id-delete'>eliminar
            </form>
            </td>");
            $dataset .= ("<td><button class='id btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal' data-bs-whatever='@mdo'>actualizar</button></td>");
            $dataset .= ("</tr>");
        }
    }else{
        $dataset = "<tr><td colspan='6'>no existen datos</td></tr>";
    }
        return $dataset;
    }
    public function addMoto($tipoDeMoto, $marca, $precio)
    {
        $dataset="";
        $conn = new mysqli("localhost", "id17824793_root", "HardCore23!123", "id17824793_motos");
        $sql = "INSERT INTO motos (tipo_de_moto, marca, precio) VALUES('$tipoDeMoto', '$marca', $precio)";
        if($conn->query($sql) === true){
            return $dataset= "Se Inserto Correctamente";
        }else{
            return $dataset ="Error al agregar :(";
        }
    }

    public function updateMoto($id, $tipoDeMoto, $marca, $precio)
    {
        $dataset="";
        $conn = new mysqli("localhost", "id17824793_root", "HardCore23!123", "id17824793_motos");
        $sql = "UPDATE motos SET tipo_de_moto='$tipoDeMoto', marca='$marca', precio='$precio' WHERE id= '$id'";
        if ($conn->query($sql) === TRUE) {
                echo 1;
          } else {
            echo "Error updating record: " . $conn->error;
          }
    }
    public function deleteMoto($id)
    {
        $dataset="";
        $conn = new mysqli("localhost", "id17824793_root", "HardCore23!123", "id17824793_motos");
        $sql = "DELETE FROM motos WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo 1;
      } else {
        echo "Error updating record: " . $conn->error;
      }
    }
}
try {
    $server = new SoapServer(
        null,
        [
            'uri' => 'http://soap2.test/motos2/server.php'
        ]
    );
    $server->setClass('Motos');
    $server->handle();
} catch (SoapFault $e) {
    print $e->faultstring;
}