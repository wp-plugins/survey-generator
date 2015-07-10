function formDisable() {
	var form = document.getElementById("survey");
	var elements = form.elements;
	for (var i = 0, len = elements.length; i < len; i++) {
		elements[i].disabled = true;
	}
}
function formReset() {
	var form = document.getElementById("survey");
	form.reset()
}

