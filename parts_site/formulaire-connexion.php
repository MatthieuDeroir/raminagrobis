<!-- 
    Faire un formulaire avec un overlay prenant 100% de la page. 
    Si on clic sur l'overlay, la page de connexion se ferme.
-->


<div class="grey-overlay hidden" id="overlay-connexion">

    <div class="section-form-connexion">
        <!-- Div contenant titre et formulaire -->
        <div class="border-formulaire-connexion">

            <h2 class="form-title">Sign In</h2>

            <form action="actions/admin-connexion.php" method="post" class="form-connexion">
                <div class="div-input-label">
                    <label for="username">Username : </label>
                    <input type="text" name="username" class=".input-connexion">
                </div>

                <div class="div-input-label">
                    <label for="password">Password : </label>
                    <input type="text" name="password" class=".input-connexion">
                </div>

                <input type="submit" value="Confirmer" id="submit-connexion" class="btn-submit">

                <?php
                //TODO : Condition PhP pour ensuite mettre la fonction js verified

                ?>
            </form>
        </div>
    </div>

</div>
