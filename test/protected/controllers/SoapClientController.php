<?php

class SoapClientController extends CController {
	
	public function actionTest(){
		
		$wsdl = 'http://medt.local/test/?r=BookShop/service';
		
		$SoapClient = new SoapClient($wsdl, array('user_agent', 'my_space', 'soap_version'=>SOAP_1_1,'trace'=>true));

		$result = var_dump($SoapClient->__getFunctions());
		
		//$result = $SoapClient->getBooksByAuthor('Беляев');
		$this->render( 'viewresult', array( 'result' => $result ) );
	}
	
}