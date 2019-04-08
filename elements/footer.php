</main><!-- /.container -->

<footer>
    <hr>
    
    <div class="row">
        <div class="col-md-4">
            <?php
            require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
            add_view();
            $views = nbr_views();
            ?>
            Il y a eu <?= $views ?> visite<?php if ($views > 1): ?>s<?php endif; ?> sur le site.
        </div>
        <div class="col-md-4">
            <form action="./newsletter.php" method="post" class="form-inline">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre email" required>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
        <div class="col-md-4">
            <h5>Navigation</h5>
            <ul class="list-unstyled text-small">
                <?= nav_menu(); ?>
            </ul>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>