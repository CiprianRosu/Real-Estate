$(document).ready(function() {
	$("#userMenuToggler").click(function(){
		console.log("Clicked");
		$("#userMenu").toggleClass("userMenuVisible")
	});

	$("#deleteAccountButton").click(function(){
		$.ajax({
		    url: 'api/Profile.php',
		    type: 'DELETE',
		    success: function(result) {
		        // Do something with the result
		        location.reload();
		    }
		})
	})
	$("body").on("click",".DeleteProperty",function(){
		$.ajax({
		    url: 'api/Property.php',
		    type: 'DELETE',
		    data:{"id":$(this).attr("data-id")},

		    success: function(result) {
		        console.log(result);
		        // Do something with the result
		        location.reload();
		    }
		})
	});

	$("#searchBarInput").on('change', function(eve){
		console.log(ajProperties);
		let searchedZipCode=$("#searchBarInput").val();
		let displayProperties=[];
		for(let x=0; x<ajProperties.properties.length;x++){
				console.log(ajProperties.properties[x].zipcode);
				console.log(searchedZipCode);
			if(searchedZipCode==ajProperties.properties[x].zipcode){
				console.log("one");
				displayProperties.push(ajProperties.properties[x]);
			}
		}
		console.log(displayProperties);

	sBluePrint = '<li class="property">\
    <div class="texts">\
            <div>{{Name}}</div>\
            <div>{{Location}}</div>\
            <div>{{Size}}m2</div>\
            <div>{{Price}}€</div>\
    </div>\
            <div><img style="width: 250px;" src="api/images/{{path}}"></div>\
    </li>';

    $printout=
	})

})

