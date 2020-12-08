<?php require_once '../../private/init.php'; ?>

<!-- Admin Header -->
<?php include_once SHARED_PATH . DS . 'admin_header.php'; ?>

<?php $var1 = "<script>
    alert('hello')
</script>"; ?>
<?php var_dump(findByQuery('SELECT * FROM subjects where id >= 1 ')); ?>

<!-- Admin Footer -->
<?php include_once SHARED_PATH . DS . 'admin_footer.php'; ?>