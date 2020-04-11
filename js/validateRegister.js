/*
/inscription/
    ID
        only letters
        at least 2 letters
    password
        can't be the same as ID
        lowercases
        at least one uppercase
        at least one number
        at least 8 characters
    button
        starts grey, inactive
        once all fields are valid, turns green
 */

function validateRegister() {

    let buttonSub = document.getElementById("submit-sub-button");

    let idSubField = document.querySelector("#new-user-id-field");
    let idSubFieldFeedback = document.getElementById(
        "new-user-id-field-feedback"
    );
    let idPattern = "^s*[a-zA-Zéçèàê]+s*$";

    function checkId() {
        if (idSubField.value.length <= 1) {
            idSubField.classList.add("is-invalid");
            idSubFieldFeedback.classList.add("invalid-feedback");

            idSubFieldFeedback.innerHTML =
                "Votre identifiant doit comporter au moins 2 lettres";
        } else if (!idSubField.value.match(idPattern)) {
            idSubField.classList.add("is-invalid");
            idSubField.classList.remove("is-valid");

            idSubFieldFeedback.innerHTML =
                "Votre identifiant ne doit comporter que des lettres";
        } else {
            idSubField.classList.add("is-valid");
            idSubField.classList.remove("is-invalid");

            idSubFieldFeedback.innerHTML = "";
        }
    }

    let pwdInput = document.getElementById("new-user-password-field");
    function checkPassword() {
        let pwdFeedback = document.getElementById(
            "new-user-password-field-feedback"
        );
        let pwdEntered = pwdInput.value;
        let pwdLength = pwdInput.value.length;

        let lowercaseRegex = "(.*[a-z].*)";
        let uppercaseRegex = "(.*[A-Z].*)";
        let numberRegex = ".*[0-9].*";

        let pwdNumbersFormat = pwdEntered.match(numberRegex);
        let pwdLowercaseFormat = pwdEntered.match(lowercaseRegex);
        let pwdUppercaseFormat = pwdEntered.match(uppercaseRegex);

        let pwdInputClasses = pwdInput.classList;
        let pwdFeedbackClasses = pwdFeedback.classList;

        if (idSubField.value == pwdEntered) {
            pwdInputClasses.add("is-invalid");

            pwdFeedbackClasses.add("invalid-feedback");
            pwdFeedbackClasses.remove("valid-feedback");

            pwdFeedback.innerHTML =
                "Votre mot de passe ne peut pas être votre identifiant";
        } else if (pwdLength <= 7) {
            pwdInputClasses.add("is-invalid");

            pwdFeedbackClasses.add("invalid-feedback");
            pwdFeedbackClasses.remove("valid-feedback");

            pwdFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 8 caractères.";
        } else if (!pwdNumbersFormat || !pwdLowercaseFormat || !pwdUppercaseFormat) {
            pwdInputClasses.add("is-invalid");

            pwdFeedbackClasses.add("invalid-feedback");
            pwdFeedbackClasses.remove("valid-feedback");

            pwdFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 1 chiffre.";
        } else {
            pwdInputClasses.remove("is-invalid");
            pwdInputClasses.add("is-valid");

            buttonSub.classList.add("btn-success");
            buttonSub.classList.remove("btn-secondary");

            pwdFeedbackClasses.add("valid-feedback");
            pwdFeedbackClasses.remove("invalid-feedback");

            pwdFeedback.innerHTML = "";
        }
    }
    idSubField.addEventListener("keyup", checkId);
    pwdInput.addEventListener("keyup", checkPassword);

    //check username is available WITH AJAX

};

function validateInput(inputElement, feedbackElement) {
    let input = inputElement;
    let inputClasses = input.classList;
    let inputEntered = inputElement.value;
    let inputLength = inputElement.length;

    let feedback = feedbackElement;
    let feedbackClasses = feedback.classList;
    let feedbackContent = feedback.textContent;

    // let lowercaseRegex = "(.*[a-z].*)";
    // let uppercaseRegex = "(.*[A-Z].*)";
    // let numberRegex = ".*[0-9].*";

    //letters only
    // let idPattern = "^s*[a-zA-Zéçèàê]+s*$";

    // let hasLowercase = inputEntered.match(lowercaseRegex);
    // let hasUppercase = inputEntered.match(uppercaseRegex);
    // let hasNumbers = inputEntered.match(numberRegex);

    // function invalid(inputElement, feedbackElement) {
    //     inputClasses.add("is-invalid");
    //     feedbackClasses.add("invalid-feedback");

    //     inputClasses.remove("is-valid");
    //     feedbackClasses.remove("valid-feedback");
    // }
}

class ValidateInput {
    constructor(inputElement, feedbackElement) {
        this.input = inputElement;
        this.inputClasses = input.classList;
        this.inputEntered = input.value;
        this.inputLength = input.value.length;

        this.feedback = feedbackElement;
        this.feedbackClasses = feedback.classList;
        this.feedbackContent = feedback.textContent;

        this.hasLowercase = inputEntered.match("(.*[a-z].*)");
        this.hasUppercase = inputEntered.match("(.*[A-Z].*)");
        this.hasNumbers = inputEntered.match(".*[0-9].*");
        this.lettersOnly = "^s*[a-zA-Zéçèàê]+s*$";
    }

    checkLength(length) {
        if (this.inputLength <= length) {
            this.feedbackContent = `Votre mot de passe doit comporter au moins ${length} caractères.`;
        }
    }

    checkLowercase() {
        if (this.hasLowercase) {
            this.feedbackContent = ""
        }
        this.feedbackContent = "Votre mot de passe doit contenir des minuscules."
    }
    checkUppercase() {
        if (this.hasUppercase) {
            this.feedbackContent = ""
        }
        this.feedbackContent = "Votre mot de passe doit contenir des majuscules."
    }
    checkNumbers() {
        if (this.hasNumbers) {
            this.feedbackContent = ""
        }
        this.feedbackContent = "Votre mot de passe doit contenir des chiffres."
    }




}

window.addEventListener("load", function () {
    let pwdInput = document.getElementById("new-user-password-field");
    let pwdFeedback = document.getElementById("new-user-password-field-feedback");
    const validatePassword = new ValidateInput(pwdInput, pwdFeedback);

    pwdInput.addEventListener("keyup", () => {
        validatePassword.checkLowercase();
        validatePassword.checkUppercase();
        validatePassword.checkNumbers();
    })

});


export { validateRegister };