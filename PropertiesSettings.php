<?php
include "header.php";
include "restricted.php";
if($userType=="user"){
	exit();
}
?>
<form method="post" action="api/Property.php" enctype="multipart/form-data">

  <div class="CreateProperty">
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="location"><b>Location</b></label>
    <input type="text" placeholder="Enter location" name="location" required>

    <label for="price"><b>Price</b></label>
    <input type="text" placeholder="Enter price" name="price" required>    

    <label for="size"><b>Enter size</b></label>
    <input type="text" placeholder="Enter size" name="size" required>
	<input name="myFile" type="file">
    <button type="submit">Create property</button>

  </div>
</form>
<?php
        $sjData = file_get_contents(__DIR__.'/api/data.json');
    $jData = json_decode( $sjData );
$jProperties=$jData->$userType->$user_id->properties;
    $sBluePrint = '
    <li class="property">
            <div>{{Name}}</div>
            <div>{{Location}}</div>
            <div>{{Size}}</div>
            <div>{{Price}}</div>
      <a href="editProperty.php?id={{id}}"><div class="Edit">Edit</div></a>
    <div data-id="{{id}}" class="DeleteProperty">Delete</div>
    </li> 
    ';
    $data="";
    foreach( $jProperties as $skey => $jProperty ){
      $sCopyBluePrint = $sBluePrint;
      
      $sCopyBluePrint = str_replace( 
        ['{{Name}}', '{{Location}}', '{{Size}}','{{Price}}','{{id}}'],
        [$jProperty->name, $jProperty->location,$jProperty->size,$jProperty->price, $skey],
        $sCopyBluePrint
      );
      $data.=$sCopyBluePrint;
}
      ?>
<div id="listOfProperties">
    <ul>
        <li>
            <div>Name</div>
            <div>Location</div>
            <div>Size</div>
            <div>Price</div>
            <div class="Edit">Edit</div>
            <div class="Delete">Delete</div>
        </li>
<?php      echo $data;?>
    </ul>
</div>
<?php
include "footer.php";
?>


