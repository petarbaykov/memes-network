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
		if($('.commentBox').is(":visible")){
			$('.commentBox').slideUp();
		}else{
			$('.commentBox').slideDown();
		}
		
	});

	$('#userDropDown').click(function(){
		$('#myDropdown').toggle();
	});

	$('#notifications').click(function(){
		if(!$('.notiicationsDropDown').is(":visible")){
			pageFunc.notiSeen();
		}
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
	},
	postComment:function(id,self){
		let comment = $(self).prev().val();
		let data = {
			meme_id:id,
			comment:comment
		}
		requester.post('comments/post',data,function(data){
			$('.memeComments').append('<div class="singleComment"><span class="commentUser">'+data.name+"</span> "+comment);
		},true);
	},
	notiSeen:function(){
		requester.post('noti/seen',{},function(data){
		
		},true);
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