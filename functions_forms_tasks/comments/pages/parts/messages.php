<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= htmlentities($error) ?></p>
<?php endif; ?>

<?php if (isset($success)): ?>
    <p class="alert alert-success"><?= htmlentities($success) ?></p>
<?php endif; ?>