<?php
namespace placetopay\business\services;

Class PseMethods {
      public $auth_obj;
      public $soapClient;

      public function __construct() {
              //---------------------------------------------------------
              //Recoger parámetros
              //---------------------------------------------------------
              $url_pse_webservice = \foundation\url_pse_webservice;
              $login = \foundation\login;
              $tranKey = \foundation\tranKey;
              //---------------------------------------------------------
              //Construir seed y tranKey
              //---------------------------------------------------------
              $seed = date("c");
              $tranKey = sha1( $seed . $tranKey, false );
              //---------------------------------------------------------
              //Construir auth_obj
              //---------------------------------------------------------
              $auth_obj = new \StdClass();
              $auth_obj->login = $login;
              $auth_obj->tranKey = $tranKey;
              $auth_obj->seed = $seed;
              //---------------------------------------------------------
              //Asignación de atributos públicos del objeto:
              //---------------------------------------------------------
              $this->auth_obj = $auth_obj;
              //##ABAJO: por agilidad, para la primera versión se prefirió usar nusoap, que tiene
              //         la ventaja de funcionar incluso si se cumple !extension_loaded('soap')
              //$this->soapClient = new \SoapClient( $url_pse_webservice );
              $url_pse_webservice = \foundation\url_pse_webservice;
              require_once("foundation/nusoap-0.9.5/lib/nusoap.php");
              $this->soapClient = new \nusoap_client( $url_pse_webservice, TRUE );
              return TRUE;
      } //Fin de __construct


      private function llamar_a_metodo($nombre_metodo, $parametros_adicionales=array()) {
            //wrapper de cualquier método
            $params = array(
                      "auth"=>$this->auth_obj,
            );
            $TODOS_los_params =  $params + $parametros_adicionales;
            //Método que cambia.
            $resultado = $this->soapClient->call($nombre_metodo, $TODOS_los_params);
            return $resultado;
      } //Fin de llamar_a_metodo

      public function getBankList () {
                  return $this->llamar_a_metodo("getBankList");
      } //Fin de getBankList

      public function CreateTransaction($params_adicionales) {
                  return $this->llamar_a_metodo("CreateTransaction", $params_adicionales);
      } //Fin de CreateTransaction

      public function   CreateTransactionMultiCredit ($params_adicionales) {
                  return $this->llamar_a_metodo("CreateTransactionMultiCredit", $params_adicionales);
      } //Fin de CreateTransactionMultiCredit
      public function   GetransactionInformation ($params_adicionales) {
                  return $this->llamar_a_metodo("CreateTransactionMultiCredit", $params_adicionales);
      } //Fin de GetransactionInformation


}

?>
