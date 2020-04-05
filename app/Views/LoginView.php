<main>
  <div class="container">
    <form action="<?php echo htmlspecialchars(" ./../app/Controllers/LoginController.php"); ?>" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Identifiant</label>
        <input type="text" class="form-control" id="id-connect-field" name="id-connect-field" />
      </div>
      <div class="form-group">
        <label for="password-connect-field">Password</label>
        <input type="password" class="form-control" id="password-connect-field" name="password-connect-field" />
      </div>
      <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Accéder à votre compte" id="submit-sub-button" />
    </form>
  </div>
</main>