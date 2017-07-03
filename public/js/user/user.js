/* Result JS */
$(document).ready(function() {
	$('._push-his').on('click', function(E){
		var type = $("#type").text();
		var from = $("#_langFrom :selected").text();
		var to = $("#_langTo :selected").text();
		var id = $(this).attr('data-id');
		var from_text = $('#_text-search').val();
		var to_text = $(this).next().next().text();
		var _token = $('input[name=_token]').val();
		alert(from_text)
		$.ajax ({
			url: 'HistoryAddNew',
			type: 'POST',
			dataType: 'json',
			data: {'from': from,'to': to, 'type': type,'from_text': from_text,'to_text': to_text,'_token' : _token},
			success : function(response){
				if(response['data'] == "fine"){
					alert("Đã thêm vào lịch sử");
				}
				else{
					alert("Opps! Vui lòng xem lại thông tin");
				}
			}
		});
	});
});
/*End Result JS*/
// DataTableJS
