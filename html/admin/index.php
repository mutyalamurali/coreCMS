<?php require_once '../../private/init.php'; ?>

<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>

<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <h2>Main Menu</h2>

    <ul>
        <li><a href="<?php echo url('admin/subjects/index.php'); ?>">Menu Names</a></li>
        <li><a href="<?php echo url('admin/pages/index.php'); ?>">Pages</a></li>
    </ul>
</main>


<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>

<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>