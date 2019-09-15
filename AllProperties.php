<?php
$sjData = file_get_contents(__DIR__.'/api/data.json');
$jData = json_decode( $sjData );
$jProperty=[];
foreach ($jData->agent as $key => $author) {
	foreach ($author->properties as $id => $value) {
		$value->id=$id;
		array_push($jProperty, $value);
	}
}
$jProperties=new stdclass();
$jProperties->properties=$jProperty;

?>
<script type="text/javascript">
	      const sjProperties = '<?php echo json_encode($jProperties); ?>'
      ajProperties = JSON.parse(sjProperties) // convert text into an object
      console.log(ajProperties)
</script>