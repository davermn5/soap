<?php         
 /*
 *  Native Soap Client adhering to Basic Authentication (by server's standards);
 */ 
 $login = 'wikkens';
 $password = 'jJ!1910'; 
 $client = new SoapClient('http://' .$login. ':' .$password. '@www.romanmonarch.com/soap/protected/pear_soap_example.php?wsdl', array(
                                                                                                                                  'login'    => $login,
                                                                                                                                  'password' => $password
                                                                                                                                 ) 
 );
 
 echo $client_output = $client->__soapCall( 'add', array(1,9) );
?>
