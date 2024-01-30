var kwstemp = new Array();
$(document).ready(function(){
	var kwsmaxfile =10-$('#gallery-old .gallery-old-box').length;
	kwsUploadUpdateMax();
	// sortable ----------------------------------------------------------------
	$( function() {
	    $("#plugin-kws-upload-box").sortable({
	      	items: "div.plugin-kws-upload-image",
	      	revert: true,
	      	forceHelperSize: true,
		    forcePlaceholderSize: true,
		    placeholder: 'draggable-placeholder',
		    tolerance: 'pointer',
		    // axis: 'x',
		    update: function( event, ui ) {
		    	pluginKwsUploadSortImage();
		    }
	    });
	    $("#plugin-kws-upload-box").disableSelection();
	    // $('div.plugin-kws-upload-image').draggable();
	});
	// upload onchange ----------------------------------------------------------------
	$('.plugin-kws-upload-hide').on('change',function(){
		kwsUploadUpdateMax();
		length = Object.keys(kwstemp).length+$(this).get(0).files.length;
		for (var i = 0; i < $(this).get(0).files.length; i++) {
			if($(this).get(0).files[i].size>4096000){
				alert("พบรูปภาพ ขนาดเกิน 4MB กรุณาเลือกใหม่อีกครั้ง");
				$(this).val('');
				return false;
			}
		}
		if(length<=kwsmaxfile){
			if(length==kwsmaxfile){
				$('label.plugin-kws-upload-btn-upload').addClass('d-none');
			}else{
				$('label.plugin-kws-upload-btn-upload').removeClass('d-none');
			}
			var show = '#plugin-kws-upload-box';
			for (var i = 0; i < $(this).get(0).files.length; i++) {
				var datetime = new Date();
				var index = datetime.getTime()+'_'+Math.floor((Math.random() * 100000) + 1);
				const [name, type] = $(this).get(0).files[i].name.split(/\.(?=[^\.]+$)/);
				kwstemp[index] = $(this).get(0).files[i];
				kwstemp[index]['sort'] = 0;
				kwstemp[index]['new'] = name;
				pluginKwsUploadReadImage($(this).get(0).files[i],show,index);
			}
			$(this).val('');
		}else{
			alert('รูปเกิน 10 รูป');
			$(this).val('');
		}
	});

	// on delete ----------------------------------------------------------------
	$('#plugin-kws-upload-box').on('click', '.plugin-kws-upload-option-top .remove-image', function() {
		var index = $(this).attr('data-index');
		// var r = confirm("ยืนยันการยกเลิก");
		// if (r == true) {
			$('label.plugin-kws-upload-btn-upload').removeClass('d-none');
			$('.plugin-kws-upload-image[data-at="'+index+'"]').remove();
			// kwstemp.slice(index,1);
			delete kwstemp[index];
		// }
		pluginKwsUploadSortImage();
	});

	//on remove file update max file
	$(document).on('click', '.btn-delete-gallery', function() {
		$('label.plugin-kws-upload-btn-upload').removeClass('d-none');
		kwsUploadUpdateMax();
	});
	// on change name
	$('#plugin-kws-upload-box').on('click', '.plugin-kws-upload-option-top .plugin-kws-upload-edit', function() {
		var index = $(this).attr('data-index');
		var element = $('.plugin-kws-upload-image-tage-name[data-index="'+index+'"]');
		var name = element.html();
		var data = prompt("Please enter your name", name);
		if (data != null) {
			kwstemp[index]['new'] = data;
			element.html(data);
		}
	});
	function pluginKwsUploadSortImage(){
		kwsUploadUpdateMax();
		$( "div.plugin-kws-upload-image" ).each(function( index ) {
			at = $(this).attr('data-at');
			kwstemp[at]['sort'] = index;
		});
	}
	function kwsUploadUpdateMax(){
		kwsmaxfile = 10-$('#gallery-old .gallery-old-box').length;
		if(kwsmaxfile<=0){
			$('#plugin-kws-upload-box').addClass('d-none');
		}else{
			$('#plugin-kws-upload-box').removeClass('d-none');
		}
	}

	function pluginKwsUploadReadImage(file,show,index){
		// get width height
		var _URL = window.URL || window.webkitURL;
		img = new Image();
        img.src = _URL.createObjectURL(file);
        var valClass;
        img.onload = function() {
        	if(this.height>=this.width){
		   		valClass = 'tall';
		   	}else{
		   		valClass = 'fat';
		   	}
		   	// read image
			var reader = new FileReader();
	        reader.onload = function (e) {
				resule =  e.target.result;
				size = (file.size/1024/1024).toFixed(2);
				const [name, type] = file.name.split(/\.(?=[^\.]+$)/);
				$(show+' .plugin-kws-upload-btn-upload').before('\
					<div class="plugin-kws-upload-image" data-at="'+index+'">\
						<div class="plugin-kws-upload-image-box">\
							<div class="plugin-kws-upload-option-top">\
								<div class="btn btn-light dropdown-toggle" data-index="'+index+'" data-toggle="dropdown" aria-haspopup="true" >\
									<i class="fa fa-ellipsis-v" aria-hidden="true"></i>\
								</div>\
								<div class="dropdown-menu dropdown-menu-right m-0 p-0" style="min-width: 6rem !important;">\
								    <button class="dropdown-item plugin-kws-upload-edit text-right"  type="button" data-index="'+index+'">แก้ไขชื่อ</button>\
								</div>\
								<div class="remove-image btn btn-danger" data-index="'+index+'">\
									<i class="fa fa-times" aria-hidden="true"></i>\
								</div>\
							</div>\
							<div class="plugin-kws-upload-option-bottom">\
								\
								<div class="plugin-kws-upload-image-type">'+type+'</div>\
							</div>\
							<img src="'+resule+'" class="'+valClass+'">\
						</div>\
						<div class="plugin-kws-upload-image-tage">\
							<div class="col-8 p-0 text-dots plugin-kws-upload-image-tage-name" data-index="'+index+'" style="font-size: 0.9rem;" title="'+name+'">'+name+'</div>\
							<div class="col-4 p-0 text-right" style="color:#cbcbcb  !important;font-size: 0.8rem;">'+size+' MB'+'</div>\
						</div>\
					</div>\
				');
				pluginKwsUploadSortImage();
	        }
	        reader.readAsDataURL(file);
        }
	}
});