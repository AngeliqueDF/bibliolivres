// class ValidateInput {
//     constructor(inputElement, feedbackElement) {
//         this.input = document.getElementById(inputElement);
//         this.feedback = document.getElementById(feedbackElement);
//         this.inputEntered = this.input.value;
//     }
// }

// let test = new ValidateInput("")


// let input = inputElement;
// let inputClasses = input.classList;
// let inputEntered = input.value;
// let inputLength = input.value.length;

// let feedback = feedbackElement;
// let feedbackClasses = feedback.classList;
// let feedbackContent = feedback.textContent;

// let hasLowercase = inputEntered.match("(.*[a-z].*)");
// let hasUppercase = inputEntered.match("(.*[A-Z].*)");
// let hasNumbers = inputEntered.match(".*[0-9].*");
// let lettersOnly = "^s*[a-zA-Zéçèàê]+s*$";

// function checkRegex(inputElement, feedbackElement, regex) {
//     let regexMatch = inputEntered.match(regex);
//     if (!regexMatch && typeOfInput == "password") {
//         feedbackContent = "Votre mot de passe doit"
//     }
// }
// function setValid() {
//     inputClasses.add("is-invalid");
//     feedbackClasses.add("invalid-feedback");
//     inputClasses.remove("is-valid");
//     feedbackClasses.remove("valid-feedback");
// }
// function setInvalid() {
//     inputClasses.add("is-valid");
//     feedbackClasses.add("valid-feedback");
//     inputClasses.remove("is-invalid");
//     feedbackClasses.remove("invalid-feedback");
// }
// function checkLength(length) {
//     if (inputLength <= length) {
//         feedbackContent = `Votre mot de passe doit comporter au moins ${length} caractères.`;
//     }
// }
// function checkLetters() {
//     if (lettersOnly) {
//         feedbackContent = ""
//     }
//     feedbackContent = "Votre mot de passe doit contenir des minuscules."
// }
// function checkLowercase() {
//     if (hasLowercase) {
//         feedbackContent = ""
//     }
//     feedbackContent = "Votre mot de passe doit contenir des minuscules."
// }
// function checkUppercase() {
//     if (hasUppercase) {
//         feedbackContent = ""
//     }
//     feedbackContent = "Votre mot de passe doit contenir des majuscules."
// }
// function checkNumbers() {
//     if (hasNumbers) {
//         feedbackContent = ""
//     }
//     feedbackContent = "Votre mot de passe doit contenir des chiffres."
// }

// function validateInput(inputElement, feedbackElement, typeOfInput) {

// }

// let pwdInput = document.getElementById('new-user-password-field');
// let pwdFeedback = document.getElementById('new-user-password-field-feedback');
// window.addEventListener("load", function () {
//     pwdInput.addEventListener("keyup", () => {
//         validateInput(pwdInput, pwdFeedback);
//     });
// });