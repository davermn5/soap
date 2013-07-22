<?php 
 
 /*
  *  Pear SOAP Server (works!)
  */
 require_once('../../../php/SOAP/Server.php'); 
 
 class ServiceClass
 {
  public $__dispatch_map = array();
  
  public function __construct(){
   $this->__dispatch_map['add'] = array(
                                    'in' => array(
									          'a' => "int", 
									          'b' => "int"
									),
									
									'out' => array(
									           'c' => "int"
									)
   );
   
   $this->__dispatch_map['sub'] = array(
                                    'in' => array(
									          'd' => "int", 
									          'e' => "int"
									),
									
									'out' => array(
									           'f' => "int"
									)
   );
   
   $this->__dispatch_map['mul'] = array(
                                    'in' => array(
									          'g' => "int", 
									          'h' => "int"
									),
									
									'out' => array(
									           'i' => "int"
									)
   );
   
   $this->__dispatch_map['addthree'] = array(
                                    'in' => array(
									          'j' => "int", 
									          'k' => "int",
									          'l' => "int"
									),
									
									'out' => array(
									           'm' => "int"
									)
   );	
  } //end constructor..
  
  public function __dispatch($method){
   if( isset($this->__dispatch_map[$method]) )
   {
   	return $this->__dispatch_map[$method];
   }
   else{
    return null;	
   }	
  } //end __dispatch()..
  
  
  function add($a, $b){
   return $a + $b;	
  }
  
  function sub($d, $e){
   return $d - $e;	
  }
  
  function mul($g, $h){
   return $g * $h;	
  }
  
  function addthree($j, $k, $l){
   return $j + $k + $l;	
  }
  
  	
 } //end ServiceClass class..
 
 
 $soap = new SOAP_Server; 
 $service = new ServiceClass();
 
 $soap->addObjectMap($service, 'urn:ServiceClass');  
  
 if( isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST' )
 {
  $soap->service($HTTP_RAW_POST_DATA);	
 }
 else{
  require_once('../../../php/SOAP/Disco.php');
  $disco = new SOAP_DISCO_Server($soap, 'ServiceClass');	
  
  if( isset($_SERVER['QUERY_STRING']) && strpos($_SERVER['QUERY_STRING'], 'wsdl') === 0 )
  {
   header('Content-type: text/xml');
   echo $disco->getWSDL();	
  }
 }
 
 
 
?>