$(document).ready(function(){

	$('.like').click(function(){

		if(!$(this).find('.fa').hasClass('liked')){
			$.ajaxSetup({
		       headers: {
		           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		       }
	       });

	       $.post(baseUrl+'/like-post',{post_id:$(this).attr('id')},function(data){
	       		$(this).find('.fa').addClass('liked');

	       });
	   }
	});
});