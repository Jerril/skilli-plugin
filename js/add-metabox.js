// $.noConflict();
jQuery(document).ready(function($) {
	// checkbox & radio input
	// $("input[type='radio']").on("change", function(e){
	// 	// get the elements dependent on it
	// 	var elements = $(this).data("options")

	// 	// chamge the styles as required
	// });

	// $("input[type='checkbox']").on("change", function(e){
	// 	// get the elements dependent on it

	// 	// chamge the styles as required
	// });

	// collapse group
	$(".group").on("click", ".entry", function(e){
		e.stopPropagation();
		e.preventDefault();

		$(this).next().toggleClass("open");
	});

	// add more
	$(".group").on("click", '.add-more', function(e){
		e.preventDefault();
		e.stopPropagation();

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
		if($(this).data('level')){
			newDiv = newDiv.replaceAll(`[${id}][${index-1}]`, `[${id}][${index}]`);
			newDiv = newDiv.replace(`data-index2="${index-1}"`, `data-index2="${index}"`);
		}else{
			newDiv = newDiv.replaceAll(`${id}[${index-1}]`, `${id}[${index}]`);
			newDiv = newDiv.replaceAll(`data-index="${index-1}"`, `data-index="${index}"`);
			newDiv = newDiv.replace(`data-index="${index-1}"`, `data-index="${index}"`);
		}	

		newDiv = `<div class="grp-cards">${newDiv}</div>`;
		
		$(this).before(newDiv);
 
	});

	// remove clone
	$('.group').on('click', '.remove-clone', function(e){
		e.preventDefault();
		e.stopPropagation();

		var this2 = this;

		if($(this).parent().parent().siblings('.grp-cards').length >= 1){
			var confirmDelete = confirm("Are you sure you want to remove this group?");
			if(confirmDelete){
				var postid = $(this).data('postid');
				var metakey = $(this).data('metakey');
				var index = $(this).data('index');

				if($(this).data('key2') || $(this).data('index2')){
					var key2 = $(this).data('key2');
					var index2 = $(this).data('index2');

					$.post(my_ajax_obj.ajax_url, {
						 _ajax_nonce: my_ajax_obj.nonce,
						 action: 'removeclone',
						 postid: postid, 
						 metakey: metakey,
						 index: index,
						 key2: key2,
						 index2: index2
						}, function(data){
							// console.log(data);
							// remove it from UI
							var el = $(this2).parent().parent();
							el.remove();
					});
				}else{
					$.post(my_ajax_obj.ajax_url, {
						 _ajax_nonce: my_ajax_obj.nonce,
						 action: 'removeclone',
						 postid: postid, 
						 metakey: metakey,
						 index: index
						}, function(data){
							// console.log(data);
							// remove it from UI
							var el = $(this2).parent().parent();
							el.remove();
					});
				}
			}
		}
	});

});