<?php
include 'header.php';
?>

    <h3>Вход</h3>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= $error ?></p>
<?php endif; ?>

<?php if (!empty($user)): ?>
    <p class="alert alert-success">Добро пожаловать, <?= $user ?>!</p>
<?php else: ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="alert alert-info">Используйте admin/password для авторизации.</p>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="login" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php
include 'footer.php';