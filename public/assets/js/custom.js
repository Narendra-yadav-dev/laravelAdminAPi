$(document).ready(function(){
    $('.extra-fields-customer').click(function() {
        $('.customer_records').clone().appendTo('.customer_records_dynamic');
        $('.customer_records_dynamic .customer_records').addClass('single remove row');
        $('.single .extra-fields-customer').parent().remove();
        $('.single').append('<div class="col-sm-2"><a class="remove-field btn-remove-customer btn btn-danger">Remove</a></div>');
        $('.customer_records_dynamic > .single').attr("class", "remove row");
    });

    $(document).on('click', '.remove-field', function(e) {
        $(this).parent().parent('.remove').remove();
        e.preventDefault();
    });

    // color add more option
    $('.extra-fields-color').click(function() {
        $('.color_records').clone().appendTo('.color_records_dynamic');
        $('.color_records_dynamic .color_records').addClass('single remove row');
        $('.single .extra-fields-color').parent().remove();
        $('.single').append('<div class="col-sm-2"><a class="remove-field btn-remove-color btn btn-danger">Remove</a></div>');
        $('.color_records_dynamic > .single').attr("class", "remove row");
    });

     
    // size add more option
    $('.extra-fields-size').click(function() {
        $('.size_records').clone().appendTo('.size_records_dynamic');
        $('.size_records_dynamic .size_records').addClass('single remove row');
        $('.single .extra-fields-size').parent().remove();
        $('.single').append('<div class="col-sm-2"><a class="remove-field btn-remove-size btn btn-danger">Remove</a></div>');
        $('.size_records_dynamic > .single').attr("class", "remove row");
    });
    
    $('#fullimage').change(function(){
        let reader = new FileReader();
        $(this).closest(".imageupload").find(".remove-image").remove();
        $(this).closest(".imageupload").find("img").remove();
        $("#full-image-before-upload").remove();
        reader.onload = (e) => { 
            $('<img id="full-image-before-upload" src="'+e.target.result+'"  height="100px" width="100px">').insertBefore(this);
        }
        reader.readAsDataURL(this.files[0]); 
    
    });

    $('#thumbnail').change(function(){
        let reader = new FileReader();
        $(this).closest(".imageupload").find(".remove-image").remove();
        $(this).closest(".imageupload").find("img").remove();
        $("#thumbnail-image-before-upload").remove();
        reader.onload = (e) => { 
            $('<img id="thumbnail-image-before-upload" src="'+e.target.result+'"  height="100px" width="100px">').insertBefore(this);
        }
    
        reader.readAsDataURL(this.files[0]); 
    
    });

    $(document).on( "click", "span.remove-image",function(){
        $(this).closest(".imageupload").find('input[type="file"]').val('');
        $(this).closest(".imageupload").find('img').remove();
        $(this).remove();
        
    });

    var imagesPreview = function(input, placeToInsertImagePreview) {
        var imgPath = $(input)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        console.log("extn:", extn);
        //$('div.gallery').html('');
        $('div.gallery').find("img").remove();
        if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img height="100px" width="100px" class="remove_img_'+event.loaded+'">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }else {
             alert("Pls select only images");
        }
    };

    $('#gallary-photo-add').on('change', function() {
         
        imagesPreview(this, 'div.gallery');
    });
    
    
 
});

function deletteteImg(id)
{
    console.log("deelete fun call :", id);
    $(".remove_img_"+id).remove();
}