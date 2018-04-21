$(document).ready(function(){

	$('.like').click(function(){
		if(!$(this).hasClass('liked')){
				var self = this;
			
			let meme_id = $(this).attr('id').replace('meme_','');
			let data = {
				meme_id:meme_id
			}
			requester.post('like',data,function(data){
					$(self).find('.likeStatus').html('Liked');
					$(self).addClass('liked');
			},true);
			
		}
	});
	$('#profilePicture').click(function(e){
		pageFunc.uploadAvatar(e);
	});
	$('#saveImage').click(function(){
		pageFunc.saveImage();
	});	

	$('.comment').click(function(){
		$('.commentBox').slideDown();
	});

	$('#userDropDown').click(function(){
		$('#myDropdown').toggle();
	});

	$('#notifications').click(function(){
		$('.notiicationsDropDown').toggle();
	});	
});

var pageFunc = {

	uploadAvatar:function(e){
		if (e.target == e.currentTarget){
			$('#uploadAvatar').trigger('click');
		}
		
	},
	saveImage:function(){
		var fd = new FormData();
		var files = $('#uploadAvatar')[0].files[0];
		fd.append('file',files);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: baseUrl+"/uploadAvatar",
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(data){
				if(data != 0){
					console.log(data);
				}else{
					alert('file not uploaded');
				}
			},
		});
	}
}
/*
window.onclick = function(event) {
  if (!event.target.matches('.dropdownMenu')) {
	  console.log('asdasd');
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}*/