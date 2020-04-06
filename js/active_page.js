document.addEventListener("DOMContentLoaded", () => {
	let currenthref = window.location.href;

	let selector = "";
	selector += "a[href~='";
	selector += currenthref;
	selector += "']";

	let activeLink;
	activeLink = document.querySelector(selector);
	activeLink.classList.toggle("active");
});
