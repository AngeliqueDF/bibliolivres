<?php

function display_add_book_view()
{
  if (array_key_exists("authenticated_user", $_SESSION)) {
    // if (session_status() == 0 || session_status() == 1 || !$_SESSION["authenticated_user"]) {
    echo "<main>
    <div class=\"container\">
    <p>Vous devez être connecté(e) pour ajouter un livre.</p>";
    echo "<a href=";
    href("/se-connecter/");
    echo ">Connectez-vous ici : connexion</a>";
    echo "<p>Vous êtes un nouvel utilisateur ? <a href=";
    href("/inscription/");
    echo ">Inscrivez-vous ici: inscription.</a></p>
    </div>
    </main>";
  } else if (session_status() == 2) {
    echo '<main>
      <div class="container">
        <form>
          <div class="form-group">
            <label for="exampleFormControlFile1">Couverture</label>
            <input
              type="file"
              class="form-control-file"
              id="exampleFormControlFile1"
            />
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">ISBN</label>
            <input
              type="number"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We\'ll never share your email with anyone else.</small
            >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We\'ll never share your email with anyone else.</small
            >
          </div>
    
          <div class="form-group">
            <label for="exampleInputEmail1">Auteur</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We\'ll never share your email with anyone else.</small
            >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Genre</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We\'ll never share your email with anyone else.</small
            >
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
            ></textarea>
          </div>
          <input
            class="btn btn-primary btn-lg btn-block"
            type="submit"
            value="Ajouter le livre"
          />
        </form>
      </div>
    </main>
    ';
  }
}
display_add_book_view();
