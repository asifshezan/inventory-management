$(document).ready(function() {
    $('#allDataTable').DataTable({
        "info": true,
        "ordering": false,
        "seraching": true,
        "paging": true,
    });
});
$(document).ready(function(){
	$(document).on("click", "#delete", function () {
		 var deleteID = $(this).data('id');
		 $(".modal_body #modal_id").val( deleteID );
	});
});
