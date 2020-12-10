<?php require_once '../../../private/init.php'; ?>

<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>


<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <a href="<?php echo url('admin/index.php'); ?>"><i class="fas fa-arrow-left">Back Main Menu</i></a>
    <h2>Menu Names</h2>

    <a href="<?php echo url('admin/subjects/new.php'); ?>">+Create new MenuName</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Visible</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            <?php $subject_set = findAll('subjects'); ?>
            <?php foreach ($subject_set as $subject) : ?>
                <tr>
                    <td><?php echo $subject['id']; ?></td>
                    <td><?php echo $subject['menu_name']; ?></td>
                    <td><?php echo $subject['position']; ?></td>
                    <td><?php echo $subject['visible']; ?></td>
                    <td><a href="<?php echo url('admin/subjects/show.php?id=' . $subject['id']); ?>">Show</a></td>
                    <td><a href="<?php echo url('admin/subjects/edit.php?id=' . $subject['id']); ?>">Edit</a></td>
                    <td><a href="<?php echo url('admin/subjects/delete.php?id=' . $subject['id']); ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>


<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>


<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>