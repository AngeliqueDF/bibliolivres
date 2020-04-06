<?php require __DIR__ . "./../Controllers/FooterController.php"; ?>

<footer>

    <nav class="fixed-bottom navbar-expand-sm navbar-dark bg-dark">

        <ul class="navbar-nav d-flex flex-row justify-content-around">
            <?php toggle_login_link(); ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php href("/ajouter-livre/"); ?>">Ajouter un livre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php href("/bibliotheque/"); ?>">Bibliothèque</a>
            </li>
        </ul>

    </nav>
    <script src="<?php href("/js/script.js"); ?>"></script>
</footer>
<script defer src="<?php href("/js/active_page.js"); ?>"></script>
</body>

</html>