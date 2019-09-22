<?php
include "header.php";
include "restricted.php";
if($userType=="user"){
	exit();
}
?>
<form method="post" action="api/Property.php" id="createPropertyForm" enctype="multipart/form-data">

  <div class="CreateProperty">
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label  for="location"><b>Location</b></label>
    <input id="propertyLocation" type="text" placeholder="Enter location" name="location" required>

    <label  for="zipcode"><b>Zip code</b></label>
    <input id="zipcode" type="text" placeholder="Enter zipcode" name="zipcode" required>

    <label for="price"><b>Price</b></label>
    <input type="text" placeholder="Enter price" name="price" required>    

    <label for="size"><b>Enter size</b></label>
    <input type="text" placeholder="Enter size" name="size" required>
	<input name="myFile" type="file">
    <button id="submitProperty" type="submit">Create property</button>

  </div>
</form>
<?php
        $sjData = file_get_contents(__DIR__.'/api/data.json');
    $jData = json_decode( $sjData );
$jProperties=$jData->$userType->$user_id->properties;
    $sBluePrint = '
    <tr class="property">
            <td>{{Name}}</td>
            <td>{{Location}}</td>
            <td>{{Zip}}</td>
            <td>{{Size}}</td>
            <td>{{Price}}</td>
      <td class="">
      <a href="editProperty.php?id={{id}}">Edit
      </a>
      </td>
    <td data-id="{{id}}" class="DeleteProperty">Delete</td>
    </tr> 
    ';
    $data="";
    foreach( $jProperties as $skey => $jProperty ){
      $sCopyBluePrint = $sBluePrint;
      
      $sCopyBluePrint = str_replace( 
        ['{{Name}}', '{{Location}}', '{{Size}}','{{Price}}','{{id}}','{{Zip}}'],
        [$jProperty->name, $jProperty->location,$jProperty->size,$jProperty->price, $skey,$jProperty->zipcode],
        $sCopyBluePrint
      );
      $data.=$sCopyBluePrint;
}
      ?>
<div id="listOfProperties">
    <table>
        <tr>
            <td>Name</th>
            <th>Location</th>
            <th>Zipcode</th>
            <th>Size</th>
            <th>Price</th>
            <th class="Edit">Edit</th>
            <th class="Delete">Delete</th>
        </tr>
<?php      echo $data;?>
    </table>
</div>
<?php
include "footer.php";
?>


