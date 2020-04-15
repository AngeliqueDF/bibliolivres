function activePage() {
	let currenthref = window.location.href;

	let selector = "";
	selector += "a.nav-link[href~='";
	selector += currenthref;
	selector += "']";

	let activeLink;
	activeLink = document.querySelector(selector);
	activeLink.classList.toggle("active");
};
export { activePage };