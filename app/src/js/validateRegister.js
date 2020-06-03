// /*
// /inscription/
//     ID
//         only letters
//         at least 2 letters
//     password
//         can't be the same as ID
//         lowercases
//         at least one uppercase
//         at least one number
//         at least 8 characters
//     button
//         starts grey, inactive
//         once all fields are valid, turns green
//  */
function validateRegister() {

    let emailValid = false;
    let idValid = false;
    let passwordValid = false;

    let emailField = document.getElementById(`new-user-e-mail-field`);
    let emailFieldFeedback = document.getElementById(`new-user-e-mail-field-feedback`)

    let idSubField = document.getElementById(`new-user-id-field`);
    let idSubFieldFeedback = document.getElementById(
        `new-user-id-field-feedback`
    );
    let idPattern = `^s*[a-zA-Zéçèàê]+s*$`;

    function checkEmail() {
        if (emailField.value.length == 0) {
            emailField.className = `form-control`;

            emailValid = true;

            emailFieldFeedback.textContent = ``;
        } else if (
            !emailField.value.includes(`@`)
            || !emailField.value.includes(`.`)
            || emailField.value.length < 6
        ) {
            emailField.classList.add(`is-invalid`);
            emailFieldFeedback.classList.add(`invalid-feedback`);

            emailValid = false;

            emailFieldFeedback.textContent = `Cette adresse semble incorrecte.`;
        } else {
            emailField.classList.add(`is-valid`);
            emailField.classList.remove(`is-invalid`);
            emailFieldFeedback.classList.remove(`invalid-feedback`);
            emailFieldFeedback.classList.add(`valid-feedback`);
            emailFieldFeedback.textContent = `Cette adresse semble correcte.`;
            
            emailValid = true;
        }
    }

    function checkId() {
        if (idSubField.value.length <= 1) {
            idSubField.classList.add(`is-invalid`);
            idSubFieldFeedback.classList.add(`invalid-feedback`);

            idValid = false;

            idSubFieldFeedback.innerHTML =
                `Votre identifiant doit comporter au moins 2 lettres`;
        } else if (!idSubField.value.match(idPattern)) {
            idSubField.classList.add(`is-invalid`);
            idSubField.classList.remove(`is-valid`);

            idValid = false;

            idSubFieldFeedback.innerHTML =
                `Votre identifiant ne doit comporter que des lettres`;
        } else {
            idSubField.classList.add(`is-valid`);
            idSubField.classList.remove(`is-invalid`);

            idSubFieldFeedback.innerHTML = ``;
            idValid = true;
        }
    }

    let pwdInput = document.getElementById(`new-user-password-field`);
    function checkPassword() {
        let pwdFeedback = document.getElementById(
            `new-user-password-field-feedback`
        );
        let pwdEntered = pwdInput.value;
        let pwdLength = pwdInput.value.length;

        let lowercaseRegex = `(.*[a-z].*)`;
        let uppercaseRegex = `(.*[A-Z].*)`;
        let numberRegex = `.*[0-9].*`;

        let pwdNumbersFormat = pwdEntered.match(numberRegex);
        let pwdLowercaseFormat = pwdEntered.match(lowercaseRegex);
        let pwdUppercaseFormat = pwdEntered.match(uppercaseRegex);

        let pwdInputClasses = pwdInput.classList;
        let pwdFeedbackClasses = pwdFeedback.classList;

        if (idSubField.value == pwdEntered) {
            pwdInputClasses.add(`is-invalid`);

            pwdFeedbackClasses.add(`invalid-feedback`);
            pwdFeedbackClasses.remove(`valid-feedback`);

            passwordValid = false;

            pwdFeedback.innerHTML =
                `Votre mot de passe ne peut pas être votre identifiant`;
        } else if (pwdLength <= 7) {
            pwdInputClasses.add(`is-invalid`);

            pwdFeedbackClasses.add(`invalid-feedback`);
            pwdFeedbackClasses.remove(`valid-feedback`);

            passwordValid = false;

            pwdFeedback.innerHTML =
                `Votre mot de passe doit avoir au moins 8 caractères.`;
        } else if (!pwdNumbersFormat || !pwdLowercaseFormat || !pwdUppercaseFormat) {
            pwdInputClasses.add(`is-invalid`);

            pwdFeedbackClasses.add(`invalid-feedback`);
            pwdFeedbackClasses.remove(`valid-feedback`);

            passwordValid = false;

            pwdFeedback.innerHTML =
                `Votre mot de passe doit contenir des chiffres, des majuscules et des minuscules.`;
        } else {
            pwdInputClasses.remove(`is-invalid`);
            pwdInputClasses.add(`is-valid`);

            pwdFeedbackClasses.add(`valid-feedback`);
            pwdFeedbackClasses.remove(`invalid-feedback`);

            pwdFeedback.innerHTML = ``;
            passwordValid = true;
        }
    }
    function changeButtonState(){
        let buttonSub = document.getElementById(`submit-sub-button`);
        if ( emailValid && idValid && passwordValid ) {
            buttonSub.classList.add(`btn-success`);
            buttonSub.classList.remove(`btn-secondary`);
        }else{
            buttonSub.classList.add(`btn-secondary`);
            buttonSub.classList.remove(`btn-success`);
        }
    }
    ['focusout', 'keyup'].forEach(event => 
        emailField.addEventListener(event, () => {
            checkEmail();
            changeButtonState();
        }
    ));
    ['focusout', 'keyup'].forEach(event => 
        idSubField.addEventListener(event, () => {
            checkId();
            changeButtonState();
        }
    ));
    ['focusout', 'keyup'].forEach(event => 
        pwdInput.addEventListener(event, () => {
            checkPassword();
            changeButtonState();
        }
    ));
};
export { validateRegister };