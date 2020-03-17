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
    button
        starts grey, inactive
        once all fields are valid, turns green
 */

function checkId() {
  let idSubFieldFeedback = document.getElementById(
    "new-user-id-field-feedback"
  );
  const idPattern = "^s*[a-zA-Zéçèàê]+s*$";
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
    idSubFieldFeedback.innerHTML = "";
    idSubField.classList.add("is-valid");
    idSubField.classList.remove("is-invalid");
  }
}
let idSubField = document.getElementById("new-user-id-field");
idSubField.addEventListener("keyup", checkId);

function checkPassword() {
  let lowercaseRegex = "(.*[a-z].*)";
  let uppercaseRegex = "(.*[A-Z].*)";
  let numberRegex = ".*[0-9].*";
  let buttonSub = document.getElementById("submit-sub-button");

  if (idSubField.value == passwordSubField.value) {
    passwordSubField.classList.add("is-invalid");
    passwordSubFieldFeedback.classList.add("invalid-feedback");
    passwordSubFieldFeedback.classList.remove("valid-feedback");
    passwordSubFieldFeedback.innerHTML =
      "Votre mot de passe ne peut pas être votre identifiant";
  } else if (passwordSubField.value.length <= 7) {
    passwordSubField.classList.add("is-invalid");
    passwordSubFieldFeedback.classList.add("invalid-feedback");
    passwordSubFieldFeedback.classList.remove("valid-feedback");
    passwordSubFieldFeedback.innerHTML =
      "Votre mot de passe doit avoir au moins 8 caractères.";
  } else if (!passwordSubField.value.match(numberRegex)) {
    passwordSubField.classList.add("is-invalid");
    passwordSubFieldFeedback.classList.add("invalid-feedback");
    passwordSubFieldFeedback.classList.remove("valid-feedback");
    passwordSubFieldFeedback.innerHTML =
      "Votre mot de passe doit avoir au moins 1 chiffre.";
  } else if (!passwordSubField.value.match(lowercaseRegex)) {
    passwordSubField.classList.add("is-invalid");
    passwordSubFieldFeedback.classList.add("invalid-feedback");
    passwordSubFieldFeedback.classList.remove("valid-feedback");
    passwordSubFieldFeedback.innerHTML =
      "Votre mot de passe doit avoir au moins 1 majuscule.";
  } else if (!passwordSubField.value.match(uppercaseRegex)) {
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
let passwordSubField = document.getElementById("new-user-password-field");
let passwordSubFieldFeedback = document.getElementById(
  "new-user-password-field-feedback"
);
passwordSubField.addEventListener("keyup", checkPassword);
/*
/se-connecter/
    display error
        Mot de passe ou identifiant incorrect
 */
