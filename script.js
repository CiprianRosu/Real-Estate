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

})

