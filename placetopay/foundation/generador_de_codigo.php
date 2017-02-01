<?php
//require_once("nusoap-0.9.5/lib/nusoap.php");
//require_once("foundation/foundation.php");
$wdsl = "https://test.placetopay.com/soap/pse/?wsdl";
$clientesoap = new SoapClient($wdsl);


$tipos = ($clientesoap->__getTypes());
$codigo = "";

foreach($tipos as $tipoaux) {
    $lineas = explode("\n", $tipoaux);
    $tipophp = array();
    $tipophp_arrayaux = array();
    foreach($lineas as $linea) {
        if (!preg_match("/[\{\}]/", $linea)) {
              $aux_array_linea = explode(" ", trim($linea));
              $linea = "\t" . $aux_array_linea[0] . " ";
              $linea .= "$" . $aux_array_linea[1];
              $tipophp_arrayaux[] = $linea;
        } else {
              $tipophp_arrayaux[] = $linea;
        }
    }
    $tipophp_str = implode("\n", $tipophp_arrayaux);
    $codigo .= "\n\nClass ". substr($tipophp_str, 7);
}
$fh=fopen("a.php", "w");
fwrite($fh, "<?php\n$codigo\n?>" );
fclose($fh);
echo "se ha escrito el archivo";
?>
