<?php
include 'header.php';
?>

    <h3>Ошибка</h3>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= $error ?></p>
<?php endif; ?>

<?php
include 'footer.php';