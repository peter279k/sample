$(function() {
	//using AJAX request datas.
	var count = 0;
	var res = "";
	$.post("php/query.php", handle_json);
	
	$("#add-btn").click(function() {
		$.post("php/query.php",{"count": count} , handle_json);
		count++;
	});
	
	function handle_json(response) {
		response = $.parseJSON(response);
		if(count==0)
			count = response.length;
		for(var cou=0;cou<response.length;cou++) {
			res += '<li><a href="javascript:change_page('+"'"+response[cou]['content']+"'"+')" data-role="button">'+response[cou]['tw_name']+"</a></li>";
		}
	
		$("#place-lists").append(res);
		$("#place-lists").listview('refresh');
		res = "";
	}
	
});

function change_page(content) {
	$("#view-content").html("");
	$("#view-content").html("<p>"+content+"</p>");
	$.mobile.ajaxEnabled = false;
	$.mobile.changePage( "#page-contents", {
		transition: "slideup",
		changeHash: false
	});
}