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

    // let idSubField = document.getElementById("new-user-id-field");
    let idSubField = document.querySelector("#new-user-id-field");
    let idSubFieldFeedback = document.getElementById(
        "new-user-id-field-feedback"
    );

    let passwordSubField = document.getElementById("new-user-password-field");
    let passwordSubFieldFeedback = document.getElementById(
        "new-user-password-field-feedback"
    );

    let lowercaseRegex = "(.*[a-z].*)";
    let uppercaseRegex = "(.*[A-Z].*)";
    let numberRegex = ".*[0-9].*";
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

    function checkPassword() {
        let pwdEntered = passwordSubField.value;
        let pwdLength = passwordSubField.value.length;
        let pwdNumbersFormat = pwdEntered.match(numberRegex);
        let pwdLowercaseFormat = pwdEntered.match(lowercaseRegex);
        let pwdUppercaseFormat = pwdEntered.match(uppercaseRegex);

        if (idSubField.value == pwdEntered) {
            passwordSubField.classList.add("is-invalid");

            passwordSubFieldFeedback.classList.add("invalid-feedback");
            passwordSubFieldFeedback.classList.remove("valid-feedback");

            passwordSubFieldFeedback.innerHTML =
                "Votre mot de passe ne peut pas être votre identifiant";
        } else if (pwdLength <= 7) {
            passwordSubField.classList.add("is-invalid");

            passwordSubFieldFeedback.classList.add("invalid-feedback");
            passwordSubFieldFeedback.classList.remove("valid-feedback");

            passwordSubFieldFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 8 caractères.";
        } else if (!pwdNumbersFormat) {
            passwordSubField.classList.add("is-invalid");

            passwordSubFieldFeedback.classList.add("invalid-feedback");
            passwordSubFieldFeedback.classList.remove("valid-feedback");

            passwordSubFieldFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 1 chiffre.";
        } else if (!pwdLowercaseFormat) {
            passwordSubField.classList.add("is-invalid");

            passwordSubFieldFeedback.classList.add("invalid-feedback");
            passwordSubFieldFeedback.classList.remove("valid-feedback");

            passwordSubFieldFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 1 majuscule.";
        } else if (!pwdUppercaseFormat) {
            passwordSubField.classList.add("is-invalid");

            passwordSubFieldFeedback.classList.add("invalid-feedback");
            passwordSubFieldFeedback.classList.remove("valid-feedback");

            passwordSubFieldFeedback.innerHTML =
                "Votre mot de passe doit avoir au moins 1 majuscule.";
        } else {
            passwordSubField.classList.remove("is-invalid");
            passwordSubField.classList.add("is-valid");

            buttonSub.classList.add("btn-success");
            buttonSub.classList.remove("btn-secondary");

            passwordSubFieldFeedback.classList.add("valid-feedback");
            passwordSubFieldFeedback.classList.remove("invalid-feedback");

            passwordSubFieldFeedback.innerHTML = "";
        }
    }
    idSubField.addEventListener("keyup", checkId);
    passwordSubField.addEventListener("keyup", checkPassword);

    //check username is available WITH AJAX

};

window.addEventListener("load", validateRegister);