
<?php
include 'header.php';
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

<div id="map"></div>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.3.1/mapbox-gl.css' rel='stylesheet' />
<script type="text/javascript">
	console.log("test");
      const sjProperties = '<?php echo json_encode($jProperties); ?>'
      ajProperties = JSON.parse(sjProperties) // convert text into an object
      console.log(ajProperties)
      $.get("https://api.mapbox.com/geocoding/v5/mapbox.places/Copenhagen central station.json?access_token=pk.eyJ1Ijoic2FudGlhZ29kb25vc28iLCJhIjoiY2swYzVoYmNmMHlkZzNibzR4NTNxamU3cSJ9.QNJx-cfl48aSOx8purGNeA", function(data, status){
      mapboxgl.accessToken = 'pk.eyJ1Ijoic2FudGlhZ29kb25vc28iLCJhIjoiY2swYzVoYmNmMHlkZzNibzR4NTNxamU3cSJ9.QNJx-cfl48aSOx8purGNeA';
    console.log(data);
    	let location=data.features[0];
        var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: location.center,
        zoom: 10
        });
        new mapboxgl.Marker()
        .setLngLat(location.center)
        .addTo(map); 



      map.addControl(new mapboxgl.NavigationControl());
		for( let jProperty of ajProperties.properties ){ // json object with json objects in it

		
		// add marker to map
		$.get("https://api.mapbox.com/geocoding/v5/mapbox.places/"+jProperty.location+".json?access_token=pk.eyJ1Ijoic2FudGlhZ29kb25vc28iLCJhIjoiY2swYzVoYmNmMHlkZzNibzR4NTNxamU3cSJ9.QNJx-cfl48aSOx8purGNeA", function(data, status){
		console.log(data.features[0].geometry.coordinates);
		var el = document.createElement('a');
		el.href = '#Right'+jProperty.id
		el.className = 'marker'
		el.style.backgroundImage = 'url(images/marker2.png)';
		el.style.width = "50px"
		el.style.height = "50px"
		el.id = jProperty.id
		el.addEventListener('click', function() {
		console.log(`Highlight property with ID ${this.id} `);
		removeActiveClassFromProperty()
		document.getElementById(this.id).classList.add('active') // left
		document.getElementById('Right'+this.id).classList.add('active') // right
		});
		new mapboxgl.Marker(el).setLngLat(data.features[0].geometry.coordinates).addTo(map);      
		})
		} // end loop



 		 });

         

    // JSON works with for in loops
    // Arrays work with forEach and also with for of
  		

    $('.active').removeClass('.active')
    function removeActiveClassFromProperty(){
      let properties = document.querySelectorAll('.active')
      properties.forEach( function( oPropertyDiv ) {
        oPropertyDiv.classList.remove('active')
      } )
    }  


    </script>

<?php
include 'footer.php';
?>