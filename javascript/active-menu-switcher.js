// Menu active switcher
window.onload=function() {
	var curUri = window.location.href;
	var pathUri = window.location.pathname;

	console.log("path uri: "+pathUri);
	var path = pathUri.split("/");

	console.log("last uri: "+path[path.length-1]);
	setAtcive(path[path.length-1]);
}

function setAtcive(id) {
	var target = document.getElementById(id);
	if (target !== null) {
		target.classList.add("active");
	} else {
		document.getElementById("beranda").classList.add("active");
	}
}