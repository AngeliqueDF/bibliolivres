<main>
  <div class="container">
    <form action="<?php echo htmlspecialchars("./../app/controller/LoginController.php"); ?>" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">ID</label>
        <input type="text" class="form-control" id="id-connect-field" />
      </div>
      <div class="form-group">
        <label for="password-connect-field">Password</label>
        <input type="password" class="form-control" id="password-connect-field" />
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" />
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Accéder à votre compte</button>
    </form>
  </div>
</main>