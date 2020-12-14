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

    $subject_result = findById('subjects', $id);
    ?>

    <a href="<?php echo url('admin/subjects/index.php'); ?>">&laquo; Back</a>

    <h2>Subject: <?php echo $subject_result['menu_name']; ?></h2>

    <b>ID:</b> <?php echo $subject_result['id']; ?><br>
    <b>Menu Name:</b> <?php echo $subject_result['menu_name']; ?><br>
    <b>Position:</b> <?php echo $subject_result['position']; ?><br>
    <b>Visible: </b><?php echo $subject_result['visible'] == 1 ? 'True' : 'False'; ?>
</main>

<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>


<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>