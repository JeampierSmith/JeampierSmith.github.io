<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cant = $_POST["cantidad"];
    

    $precio = 50.5;
  
    $costoTotal = $precio * $cant;
    if (file_exists('informacion.xml')) {
        $xml = simplexml_load_file('informacion.xml');
    } else {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><transacciones></transacciones>');
    }
    
   
    $transaccion = $xml->addChild('transaccion');
    $transaccion->addChild('producto', 'Camisa');
    $transaccion->addChild('precio', $precio);
    $transaccion->addChild('cantidad', $cant);
    $transaccion->addChild('costo_total', $costoTotal);

    $xml->asXML('informacion.xml');

}

echo "Cantidad de camisas: $cant<br>";
echo "Costo total: Bs" . number_format($costoTotal, 2);
?>