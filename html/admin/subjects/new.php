<?php
require_once '../../../private/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu_name = filter_input(INPUT_POST, 'menu_name', FILTER_SANITIZE_STRING);
    $position = (int) filter_input(INPUT_POST, 'position', FILTER_SANITIZE_NUMBER_INT);
    $visible = (int) filter_input(INPUT_POST, 'visible', FILTER_SANITIZE_NUMBER_INT);
}
?>



<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>

<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <h1>Create Menu</h1>

    <form action="" method="post">
        <div class="form-group col-4">
            <label for="menu_name">Menu Name:</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control">
        </div>

        <div class="form-group col-2">
            <label for="position">Position: </label>
            <select name="position" id="position" class="form-control">
                <option value="1">1</option>
            </select>
        </div>

        <div class="form-group col-4">
            <label for="visible">Visible: </label>
            <input type="radio" name="visible" id="visible" value="1">Yes
            &nbsp;
            <input type="radio" name="visible" id="visible" value="0">No
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</main>

<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>
<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>