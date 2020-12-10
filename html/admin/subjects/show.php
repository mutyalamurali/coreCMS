<?php require_once '../../../private/init.php'; ?>

<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>


<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <?php
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 1;

    if ($id == 0) {
        $id = 1;
    }
    echo $id;
    ?>
</main>

<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>


<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>