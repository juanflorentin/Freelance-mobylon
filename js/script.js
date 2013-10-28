function setCaptcha(id, inx) {
	var allBoxes = $("#" + id + " .box");
	var target   = $(allBoxes[inx]);
	
	allBoxes.parent().removeClass("marked");
	$("#" + id + " #" + id + "flag").remove();
	
	target.append("<input id='" + id + "flag' name='" + id + "flag' type='hidden' value='" + target.attr("data") + "'/>");
	target.parent().addClass("marked");
}			
