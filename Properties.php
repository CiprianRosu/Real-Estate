<?php
include "header.php";
?>

<?php
        $sjData = file_get_contents(__DIR__.'/api/data.json');
    $jData = json_decode( $sjData );
    $jProperties=[];
    foreach ($jData->agent as $key => $author) {
    	foreach ($author->properties as $id => $value) {
    		array_push($jProperties, $value);
    	}
    }
    $sBluePrint = '
    <li class="property">
    <div class="texts">
            <div><h2>{{Name}}</h2></div>
            <br/>
            <div class="oneProperty"><b>Location:</b><div>{{Location}}</div></div>
            <div class="oneProperty"><b>Zip code:</b><div>{{Zip}}</div></div>
            <div class="oneProperty"><b>Size:</b><div>{{Size}}m2</div></div>
            <div class="oneProperty"><b>Price:</b><div>{{Price}}€</div></div>
    </div>
            <div class="propertyImage"><img style="width: 250px;" src="api/images/{{path}}"></div>
    </li> 
    ';
    $data="";
    foreach( $jProperties as $skey => $jProperty ){
      $sCopyBluePrint = $sBluePrint;
      
      $sCopyBluePrint = str_replace( 
        ['{{Name}}', '{{Location}}', '{{Size}}','{{Price}}','{{path}}','{{id}}','{{Zip}}'],
        [$jProperty->name, $jProperty->location,$jProperty->size,$jProperty->price,$jProperty->image, $skey,$jProperty->zipcode],
        $sCopyBluePrint
      );
      $data.=$sCopyBluePrint;
}
      ?>
<div id="listOfProperties">
    <ul>
<?php      echo $data;?>
    </ul>
</div>
<?php
include "footer.php";
?>


