function listenerChangeStatus(url){

	$(".switchStatus").change(function(){
		$.ajax({
			url: url,
			type: 'post',
			data: {
				id: $(this).attr("id").replace(/status-/g, ''),
				_csrf : yii.getCsrfToken()
			},
			success: function () {
				console.log(true);
			},
			error: function () {
				console.log(false);
			}
		});
	});
}