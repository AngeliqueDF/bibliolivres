<main>
  <div class="container">
    <h2>Créer un compte</h2>
    <form action="<?php echo htmlspecialchars("./../app/Controllers/RegisterController.php"); ?>" method="POST">

      <p>Votre addresse e-mail</p>
      <ul>
        <li>Doit être une adresse e-mail valide</li>
      </ul>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="e-mail-address">Adresse e-mail</span>
        </div>
        <input type="text" class="form-control" placeholder="adresse@gmail.com" aria-label="Adresse e-mail" aria-describedby="e-mail-address" id="new-user-e-mail-field" name="new-user-e-mail-field" />
        <div class="" id="new-user-e-mail-field-feedback">
        </div>
      </div>

      <p>Choisissez votre identifiant</p>
      <ul>
        <li>Doit comporter au moins 2 lettres</li>
      </ul>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="new-user-id">Identifiant</span>
        </div>
        <input type="text" class="form-control" placeholder="Lecteur" aria-label="Username" aria-describedby="new-user-id" id="new-user-id-field" name="new-user-id" />
        <div class="" id="new-user-id-field-feedback">
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
        <div class="" id="new-user-password-field-feedback">
        </div>
      </div>
      <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Terminer l'inscription" id="submit-sub-button" />
    </form>
  </div>
</main>