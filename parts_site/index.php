<?php
// création d'un titre de page
$title = "Raminagrobis lp";

include "header.php";

include "formulaire-connexion.php";
include "information.php";
?>


<section id="home-hero" class="section-lp">
    <div class="container">
        <div class="container-card">
            <div class="card">
                <div class="padding-card">
                    <h2 class="card-title">Nos Events !</h2>
                    <p class="card-para"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ad aliquam aliquid asperiores beatae consectetur dignissimos dolor dolorem explicabo fuga fugiat molestias natus perferendis perspiciatis quis repudiandae tempora voluptatibus voluptatum. loremLorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis cumque dignissimos earum eum ipsum maiores quos temporibus! Aliquam dolore et harum nemo nihil numquam pariatur qui recusandae veritatis voluptates. ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur, deleniti ducimus esse iste itaque libero magnam nihil porro possimus quaerat quia repellendus reprehenderit repudiandae sequi totam ullam veniam voluptas.</span><span>Aliquid asperiores, cumque dicta dignissimos dolores ducimus eveniet exercitationem fugiat inventore molestiae mollitia optio, quis rem repellendus sit veritatis vitae? Aut, facilis, nulla! Ducimus fuga illum omnis quae quidem tenetur.</span>
                    </p>
                    <a href="nos-event.php" class="link-btn">Formulaire</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seulement si Admin -->
<?php
if ($_SESSION['admin'] == true){
?>
<section id="home-card" class="section-lp">
    <div class="container">
        <div class="container-card">
            <div class="card">
                <div class="padding-card">
                    <h2 class="card-title">Créer son Event.</h2>
                    <p class="card-para"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, ad aliquam aliquid asperiores beatae consectetur dignissimos dolor dolorem explicabo fuga fugiat molestias natus perferendis perspiciatis quis repudiandae tempora voluptatibus voluptatum. loremLorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium blanditiis cumque dignissimos earum eum ipsum maiores quos temporibus! Aliquam dolore et harum nemo nihil numquam pariatur qui recusandae veritatis voluptates. ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur, deleniti ducimus esse iste itaque libero magnam nihil porro possimus quaerat quia repellendus reprehenderit repudiandae sequi totam ullam veniam voluptas.</span><span>Aliquid asperiores, cumque dicta dignissimos dolores ducimus eveniet exercitationem fugiat inventore molestiae mollitia optio, quis rem repellendus sit veritatis vitae? Aut, facilis, nulla! Ducimus fuga illum omnis quae quidem tenetur.</span>
                    </p>
                    <a href="form-admin-creation-form.php" class="link-btn">Formulaire</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
}
include "footer.php";
?>
