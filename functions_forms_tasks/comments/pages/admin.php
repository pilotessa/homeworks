<?php
include 'parts/header.php';
?>

    <h3>Настройки</h3>

<?php include 'parts/messages.php'; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="words">Запрещенные слова</label>
                    <textarea name="words" id="words" class="form-control"
                              rows="3" required><?= isset($words) ? $words : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Сохранить</button>
            </form>
        </div>
    </div>

<?php
include 'parts/footer.php';