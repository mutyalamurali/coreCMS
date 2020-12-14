<?php require_once '../../../private/init.php'; ?>

<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>


<!-- Admin Nav -->
<?php include_once SHARED_PATH . DS . 'admin_nav.php'; ?>

<main class="container">
    <a href="<?php echo url('admin/index.php'); ?>">&laquo;Back</a>
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
                <tr id="<?php echo $subject['id']; ?>">
                    <td><?php echo $subject['id']; ?></td>
                    <td><?php echo $subject['menu_name']; ?></td>
                    <td><?php echo $subject['position']; ?></td>
                    <td><?php echo $subject['visible']; ?></td>
                    <td><a class="btn btn-info" href="<?php echo url('admin/subjects/show.php?id=' . $subject['id']); ?>">Show</a></td>
                    <td><a class="btn btn-warning" href="<?php echo url('admin/subjects/edit.php?id=' . $subject['id']); ?>">Edit</a></td>
                    <td><button class="btn btn-danger del-subject">Delete</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>


<!-- Javascript scripts file -->
<?php include_once SHARED_PATH . DS . 'js_scripts.php'; ?>

<!-- Delete ajax function -->
<script>
    $(".del-subject").click(function() {
        var id = $(this).parents('tr').attr('id');

        if (confirm('Are you sure want to delete menu?')) {

            $.ajax({
                url: '/admin/subjects/delete.php',
                type: 'GET',
                data: {
                    id: id
                },
                success: successFn,
                error: errFn
            });

            function successFn(data) {
                $("#" + id).remove();
            }

            function errFn(xhr, status, errMsg) {
                console.log(errMsg);
            }
        }
    });
</script>
<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>