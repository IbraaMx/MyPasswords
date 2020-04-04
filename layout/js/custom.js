$(function(){
	$("#insertForm").ajaxForm({
    success:function(data){
			$("#insertResult").html(data);
		}
	});

	$("#updateForm").ajaxForm({
		success:function(data){
			$("#updateResult").html(data);
		}
	});
});

$(document).on('click', '.edit', function() {
	var id = $(this).attr("id");
	$.ajax({
		url: './inc/fetch.php',
        type: 'POST',
		data: {id:id},
		dataType: 'json',
		success: function(data) {
            $('#service').val(data.service);
            $('#email').val(data.email);
			$('#password').val(data.password);
			$('#id').val(data.id);
		}
	});
});

$(document).on('click', '.delete', function() {
	var id = $(this).attr("id");

	var check = confirm("Are you sure about delete this service ?");
		if(check == true) {
			$.ajax({
				url: './inc/delete.php',
		        type: 'POST',
				data: {id:id},
				success: function(data) {
					$('.alert').html(data);
				}
			});
		}

});

// function reload() {
// 	$('body').load('index.php');
// };

$("#addModal").on("hidden.bs.modal", function(){
     $("#insertResult", this).html("");
});

$("#editModal").on("hidden.bs.modal", function(){
     $("#updateResult", this).html("");
});

$("td").click(function(){
    var range = document.createRange();
    range.selectNodeContents(this);  
    var sel = window.getSelection(); 
    sel.removeAllRanges(); 
    sel.addRange(range);
});