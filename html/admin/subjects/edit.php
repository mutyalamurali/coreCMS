<?php
require_once '../../../private/init.php';

$menu_name = '';
$position = '';
$visible = '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 1;

if ($id == 0) {
    $id = 1;
} else {
    $result = findById('subjects', $id);
    if (!$result) {
        die('No menu name');
    }
}

$subjects_array = findById('subjects', $id);
$num_rows = count(findAll('subjects'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $menu_name = filter_input(INPUT_POST, 'menu_name', FILTER_SANITIZE_STRING);
    $position = (int) filter_input(INPUT_POST, 'position', FILTER_SANITIZE_NUMBER_INT);
    $visible = (int) filter_input(INPUT_POST, 'visible', FILTER_SANITIZE_NUMBER_INT);

    $result = edit_subject($menu_name, $position, $visible, $id);
    if ($result) {
        $_SESSION['success'] = "Subject update success";
        redirect(url('admin/subjects/index.php'));
    }
}


?>



<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>

<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <a href="<?php echo url('admin/subjects/index.php'); ?>">&laquo;Back</a>
    <h1>Eidt: <?php echo $subjects_array['menu_name']; ?> </h1>

    <form action="" method="post">
        <div class="form-group col-4">
            <label for="menu_name">Menu Name:</label>
            <input type="text" name="menu_name" id="menu_name" class="form-control" value="<?php echo $subjects_array['menu_name']; ?>">
        </div>

        <div class="form-group col-2">
            <label for="position">Position: </label>
            <select name="position" id="position" class="form-control">

                <!-- adds next number and selected by default -->
                <?php for ($i = 1; $i <= ($num_rows); $i++) : ?>
                    <option value="<?php echo $i; ?>" <?php if ($i == $subjects_array['position']) {
                                                            echo 'selected';
                                                        } ?>><?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <!-- Default visible to No -->
        <div class="form-group col-4">
            <label for="visible">Visible: </label>
            <input type="radio" name="visible" id="visible" value="1" <?php if ($subjects_array['visible'] == 1) {
                                                                            echo 'checked';
                                                                        } ?>>Yes
            &nbsp;
            <input type="radio" name="visible" id="visible" value="0" <?php if ($subjects_array['visible'] == 0) {
                                                                            echo 'checked';
                                                                        } ?>>No
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</main>

<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>
<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>