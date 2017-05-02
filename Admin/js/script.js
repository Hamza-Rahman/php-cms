tinymce.init({ selector:'textarea' });


$(document).ready(function(){

	
	$('#SelectAllBox').click(function(){

		//alert('HI');

		if (this.checked) {

			$('.checkBoxs').each(function(){

				this.checked = true;

			});

		}else{

			$('.checkBoxs').each(function(){

				this.checked = false;

			});
		}

	});


	 //$("head").prepend("HELP");




});