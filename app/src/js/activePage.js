function activePage() {
    document.querySelector(`[href*='${window.location.pathname}']`).classList.toggle("active");
};

export { activePage }