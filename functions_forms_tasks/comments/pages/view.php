<?php
include 'header.php';
?>

    <h2>comments.php</h2>
    <p class="lead">
        Написать самостоятельно контактную форму, для ввода-хранения-вывода комментариев. Стилизовать форму и вывод
        комментариев. Реализовать решение по добавлению слов в «антимат» с помощью отдельной формы и хранить их в
        отдельном файле.
    </p>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= $error ?></p>
<?php endif; ?>

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
                    <input type="text" name="name" id="name" value="<?= isset($name) ? $name : '' ?>"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" class="form-control"
                              rows="3"><?= isset($message) ? $message : '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'footer.php';