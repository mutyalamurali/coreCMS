<?php
require_once '../../../private/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu_name = filter_input(INPUT_POST, 'menu_name', FILTER_SANITIZE_STRING);
    $position = (int) filter_input(INPUT_POST, 'position', FILTER_SANITIZE_NUMBER_INT);
    $visible = (int) filter_input(INPUT_POST, 'visible', FILTER_SANITIZE_NUMBER_INT);

    $result = create_subject($menu_name, $position, $visible);
    if ($result) {
        $_SESSION['success'] = "New subject created successfully";
        redirect(url('admin/subjects/index.php'));
    }
}

$subjects_array = findAll('subjects');
$num_rows = count($subjects_array);
?>



<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>

<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <a href="<?php echo url('admin/subjects/index.php'); ?>">&laquo;Back</a>
    <h1>Create Menu</h1>
    <form action="" method="post">
        <div class="form-group col-4">
            <label for="menu_name">Menu Name:</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control">
        </div>

        <div class="form-group col-2">
            <label for="position">Position: </label>
            <select name="position" id="position" class="form-control">

                <!-- adds next number and selected by default -->
                <?php for ($i = 1; $i <= ($num_rows + 1); $i++) : ?>
                    <option value="<?php echo $i; ?>" <?php if ($i == ($num_rows + 1)) {
                                                            echo 'selected';
                                                        } ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <!-- Default visible to No -->
        <div class="form-group col-4">
            <label for="visible">Visible: </label>
            <input type="radio" name="visible" id="visible" value="1">Yes
            &nbsp;
            <input type="radio" name="visible" id="visible" value="0" checked>No
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</main>

<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>
<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>