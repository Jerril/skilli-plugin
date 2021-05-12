jQuery(document).ready(function($) {
	
	// handling the add more btn
	$(".add-more").on("click", function(e){
		e.preventDefault();
		
		// get the next index
		var index = $(this).siblings().length;

		// group id
		var id = $(this).data('id');

		// clone
		var newDiv = $(this).prev().clone();

		// clear values
		newDiv.find("input[type='text'], input[type='email'], input[type='number'], input[type='password'], input[type='url'], input[type='color'], input[type='datetime'], input[type='date'], input[type='time']").removeAttr('value');
		newDiv.find("textarea").html('');
		newDiv.find("input[type='checkbox']").removeAttr('checked');
		newDiv.find("input[type='radio']").removeAttr('checked');
		newDiv.find("select option").removeAttr('selected');
		// wysiwyg - above textarea should work
		// post,tax - above select should work
		// images - above text should work

		// manipulate new div
		newDiv = newDiv.html();
		newDiv = newDiv.replace(`Entry ${index}`, `Entry ${index + 1}`);

		// updating the index name
		newDiv = newDiv.replaceAll(`${id}[${index-1}]`, `${id}[${index}]`);
		if($(this).hasClass('one')){
			newDiv = newDiv.replaceAll(`[${id}][${index-1}]`, `[${id}][${index}]`);
		}	

		newDiv = `<div class="grp-cards">${newDiv}</div>`;
		
		$(this).before(newDiv);
	});

});