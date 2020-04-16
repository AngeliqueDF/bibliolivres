import { activePage } from './activePage.js'
import { validateRegister } from './validateRegister.js'

window.addEventListener("load", activePage());

if (window.location.pathname == /inscription/) {
    window.addEventListener("load", validateRegister());
}