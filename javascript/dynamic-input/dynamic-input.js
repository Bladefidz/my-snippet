var newElement = "";

/* Add New Input */
$(document).on('click', '#addBtn', function(event) {
	newElement = "<div class='form-group' id='dynamic-input'><div class='input-group'><input type='text' class='form-control' placeholder='This is dynamic input'><span id='groupBtn' class='input-group-btn'><button type='button' id='removeBtn' class='btn btn-md btn-danger'><i class='fa fa-minus-circle'></i></button></span></div></div>";
	$(newElement).insertAfter($(".form-group").last());
});

/* Remove Input */
$(document).on('click', '#removeBtn', function(event) {
    $(this).parent().parent().parent().remove();
});