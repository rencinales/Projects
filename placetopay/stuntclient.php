<?php
//require_once("nusoap-0.9.5/lib/nusoap.php");
require_once("foundation/foundation.php");
require_once("business/PseMethods.php");

$metodos = new placetopay\business\services\PseMethods();
$resultado = $metodos->getBankList();
var_dump($resultado);
//$wdsl = "https://test.placetopay.com/soap/pse/?wsdl";
//$clientesoap = new SoapClient($wdsl);


?>
