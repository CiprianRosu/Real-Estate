<?php
include "header.php";
include "restricted.php";
if($userType=="user"){
	exit();
}
$property_id=$_GET["id"];
$sjData = file_get_contents(__DIR__.'/api/data.json');
$jData = json_decode( $sjData );
$jProperty=$jData->$userType->$user_id->properties->$property_id;
?>
<form method="post" action="api/Property.php" enctype="multipart/form-data">

  <div class="CreateProperty">
  	<input name="property_id" type="hidden" value="<?php echo htmlspecialchars($property_id) ?>" />
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required value="<?php echo htmlspecialchars($jProperty->name) ?>">

    <label for="location"><b>Location</b></label>
    <input type="text" placeholder="Enter location" name="location" required value="<?php echo htmlspecialchars($jProperty->location) ?>">

    <label  for="zipcode"><b>Zip code</b></label>
    <input id="zipcode" type="text" placeholder="Enter zipcode" name="zipcode" required value="<?php echo htmlspecialchars($jProperty->zipcode) ?>">

    <label for="price"><b>Price</b></label>
    <input type="text" placeholder="Enter price" name="price" required value="<?php echo htmlspecialchars($jProperty->price) ?>">    

    <label for="size"><b>Enter size</b></label>
    <input type="text" placeholder="Enter size" name="size" required value="<?php echo htmlspecialchars($jProperty->size) ?>">

    <div><img style="width: 300px;" src="api/images/<?php echo(htmlspecialchars($jProperty->image));?>"></div>
	<input name="myFile" type="file">
    <button type="submit">Save</button>

  </div>
</form>
    </ul>
</div>
<?php
include "footer.php";
?>


