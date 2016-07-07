/** Active Menu Item Switcher
 * 
 * Goal: Activate menu item which have id match with last url segment. 
 */

// Initialize the current url and path
window.onload=function() {
	var curUri = window.location.href;
	var pathUri = window.location.pathname;

	console.log("path uri: "+pathUri); // Checking got the pathname
	var path = pathUri.split("/");

	console.log("last uri: "+path[path.length-1]); // Checking got the last url segment
	setAtcive(path[path.length-1]);
}

// Activate menu item by last url segment
function setAtcive(id) {
	var target = document.getElementById(id); // Filter menu item id that match with last url segment
	if (target !== null) {
		target.classList.add("active"); // Activate matched menu item
	} else {
		document.getElementById("home").classList.add("active"); // Else, activate "Home" menu
	}
}
