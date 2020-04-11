// import { validateRegister } from "./validateRegister.js";
// import { activePage } from "./activePage.js";

// window.addEventListener("load", validateRegister);
// window.addEventListener("load", activePage);
function ValidateInput(inputElement, feedbackElement) {
    let input = inputElement;
    let inputClasses = input.classList;
    let inputEntered = input.value;
    let inputLength = input.value.length;

    this.feedback = feedbackElement;
    this.feedbackClasses = this.feedback.classList;
    this.feedbackContent = this.feedback.textContent;

    this.hasLowercase = this.inputEntered.match("(.*[a-z].*)");
    this.hasUppercase = this.inputEntered.match("(.*[A-Z].*)");
    this.hasNumbers = this.inputEntered.match(".*[0-9].*");
    this.lettersOnly = "^s*[a-zA-Zéçèàê]+s*$";
    console.log(inputEntered)
}
// setClasses(isValid) {
//     if (isValid == "valid") {
//         this.inputClasses.add('is-valid');
//         this.feedbackClasses.add('valid-feedback');
//         this.inputClasses.remove('is-invalid');
//         this.feedbackClasses.remove('invalid-feedback');
//     } else if (isValid == "invalid") {
//         this.inputClasses.add('is-invalid');
//         this.feedbackClasses.add('invalid-feedback');
//         this.inputClasses.remove('is-valid');
//         this.feedbackClasses.remove('valid-feedback');
//     }
// }
// checkLength(length) {
//     if (this.inputLength <= length) {
//         this.setClasses("invalid");
//         this.feedbackContent = `Votre mot de passe doit comporter au moins ${length} caractères.`;
// }
// this.setClasses("valid");
// this.feedbackContent = "";
// }
// checkLowercase() {
//     if (this.hasLowercase) {
//         this.feedbackContent = ""
//     }
//     this.setClasses("invalid");
//     this.feedbackContent = "Votre mot de passe doit contenir des minuscules."
// }
// checkUppercase() {
//     if (this.hasUppercase) {
//         this.feedbackContent = ""
//     }
//     this.setClasses("invalid");
//     this.feedbackContent = "Votre mot de passe doit contenir des majuscules."
// }
// checkNumbers() {
//     if (this.hasNumbers) {
//         this.feedbackContent = ""
//     }
//     this.setClasses("invalid");
//     this.feedbackContent = "Votre mot de passe doit contenir des chiffres."
// }

// }
window.addEventListener("load", function () {
    let pwdInput = document.getElementById("new-user-password-field");
    let pwdFeedback = document.getElementById("new-user-password-field-feedback");

    const validatePassword = new ValidateInput(pwdInput, pwdFeedback);

    pwdInput.addEventListener("keyup", () => {
        // validatePassword.checkLength(7);
        console.log(validateInput);
        // console.log(validatePassword.inputLength);
        // validatePassword.checkLowercase();
        // validatePassword.checkUppercase();
        // validatePassword.checkNumbers();
    })
});