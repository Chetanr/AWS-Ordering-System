$(document).ready(function () {
	var text = document.getElementById("tbody").textContent;

	text = text.replace(/\s/g, "");

	if (text == "YourCartisempty.!") {
		document.getElementById("submit-div").style.display = "none";
	} else {
		document.getElementById("submit-div").style.display = "block";
	}
});
