<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <div class="container">
        <div class="navbar-brand">CoreCMS</div>

        <ul class="navbar-nav">
            <?php $public_subjects = findAll('subjects'); ?>
            <?php foreach ($public_subjects as $public_subject) : ?>
                <li class="nav-item">
                    <a class="nav-link" href=""><?php echo $public_subject['menu_name']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</nav>