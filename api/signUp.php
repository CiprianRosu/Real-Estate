<?php
if( $_POST ){
  print_r($_POST);
  // TODO: validate name
  echo("test");
  $sName = $_POST['txtName'];
  $jAgent = new stdClass();
  $jAgent->name = $sName;
  $jAgent->properties = new stdClass();
  $sAgentUniqueId = uniqid();
  $sjData = file_get_contents('data.json');
  $jData = json_decode( $sjData );
  $jData->agents->$sAgentUniqueId = $jAgent;
  $sjData = json_encode( $jData, JSON_PRETTY_PRINT );
  file_put_contents( 'data.json', $sjData );
}
?>