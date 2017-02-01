<?php
include 'parts/header.php';
?>

    <h3>Комментарии</h3>

<?php include 'parts/messages.php'; ?>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $key => $comment): ?>
        <?php displayComment($comment); ?>
    <?php endforeach; ?>
<?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" value="<?= isset($name) ? htmlentities($name) : '' ?>"
                           class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control"
                              rows="3" required><?= isset($message) ? htmlentities($message) : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Добавить комментарий</button>
            </form>
        </div>
    </div>

<?php
include 'parts/footer.php';