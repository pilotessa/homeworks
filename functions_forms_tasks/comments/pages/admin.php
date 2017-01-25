<?php
include 'header.php';
?>

    <h3>Настройки</h3>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= $error ?></p>
<?php endif; ?>

<?php if (isset($success)): ?>
    <p class="alert alert-success"><?= $success ?></p>
<?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="words">Запрещенные слова</label>
                    <textarea name="words" id="words" class="form-control"
                              rows="3"><?= isset($words) ? $words : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Сохранить</button>
            </form>
        </div>
    </div>

<?php
include 'footer.php';