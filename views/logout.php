<?php get_head(); ?>

    <main id="view">
    <?php include (ABSPATH . FUNC . "base.php"); $_SESSION = array(); session_destroy(); ?>
    <meta http-equiv="refresh" content="0;home">
    </main>

<?php get_foot(); ?>
