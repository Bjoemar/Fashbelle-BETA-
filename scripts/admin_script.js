$(document).ready(function() {

  $('#add_editor').summernote({
  	 'height' : 300,
  	 'placeholder' : 'Product Description',
  	 'toolbar': [
  	     ['style', ['style']],
  	     ['font', ['bold', 'italic', 'underline', 'clear']],
  	     ['fontname', ['fontname']],
  	     ['color', ['color']],
  	     ['para', ['ul', 'ol', 'paragraph']],
  	     ['height', ['height']],
  	   ],
  });


  $('#details_editor').summernote({
  	 'height' : 300,
  	 'placeholder' : 'Specific Details',
  	 'toolbar': [
  	     ['style', ['style']],
  	     ['font', ['bold', 'italic', 'underline', 'clear']],
  	     ['fontname', ['fontname']],
  	     ['color', ['color']],
  	     ['para', ['ul', 'ol', 'paragraph']],
  	     ['height', ['height']],
  	   ],
  });

	$('#input_price').on('change',function(){
	  	const value = this.value.replace(/,/g, '');
	  	this.value = parseFloat(value).toLocaleString('en-US',{
	  		style: 'decimal',
		    maximumFractionDigits: 2,
		    minimumFractionDigits: 2
	  	})
	})
});


$('.image_input').click(function(){

	$(this).prev().click();

});


$('.prod_upload_img').change(function(){
	var view_image = $(this).next().find('img');
	readURL(this,view_image)
})



function readURL(input,img) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {

      img.attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}


$('#pick_color').click(function(){
  $('.color_add_modal').show();
})


$('.image_color').click(function(e){
    e.preventDefault();
  $('.imge_color_choose').click();
});


$('.imge_color_choose').change(function(){
    var view_image = $(this).prev();
    readURL(this,view_image)
})



$(document).ready(function(){

  $('.item_color').click(function(){
        $(this).next().prop('checked', true);
  })

})


