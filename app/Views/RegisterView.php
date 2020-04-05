<main>
  <div class="container">
    <h2>Créer un compte</h2>
    <form action="<?php echo htmlspecialchars("./../app/Controllers/RegisterController.php"); ?>" method="POST">

      <p>Choisissez votre identifiant</p>
      <ul>
        <li>Doit comporter au moins 2 lettres</li>
      </ul>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Identifiant</span>
        </div>
        <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="new-user-id-field" name="new-user-id" />
        <div class="valid-feedback" id="new-user-id-field-feedback">
          Looks good!
        </div>
      </div>

      <p>Choisissez votre mot de passe</p>
      <ul>
        <li>Différent de l'identifiant.</li>
        <li>Au moins 8 caractères</li>
        <li>Au moins 1 majuscule</li>
        <li>Au moins 1 chiffre</li>
      </ul>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe</span>
        </div>
        <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="new-user-password-field" name="new-user-password" />
        <div class="valid-feedback" id="new-user-password-field-feedback">
          Looks good!
        </div>
      </div>
      <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Terminer l'inscription" id="submit-sub-button" />
    </form>
  </div>
</main>