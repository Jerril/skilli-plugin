jQuery(document).ready(function($) {
	
	// handling the add more btn
	$(".add-more").on("click", function(e){
		e.preventDefault();
		console.log($(this).data("field"));
	});


});