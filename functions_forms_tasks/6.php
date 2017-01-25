<?php
/*
 * Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в
 * папку gallery и выводиться на странице в виде таблицы.
 */

/**
 * Возвращает путь к директории с изображениями
 * @return string
 */
function getImageDir()
{
    return __DIR__ . DIRECTORY_SEPARATOR . '6' . DIRECTORY_SEPARATOR . 'gallery';
}

/**
 * Возвращает URL изображения
 * @param $image
 * @return string
 */
function getImageUrl($image)
{
    $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '/6/gallery/' . basename($image);

    return "{$scheme}{$host}{$uri}{$extra}";
}

/**
 * Проверяет, является ли файл изображением
 * @param $file
 * @return bool
 */
function checkMimeType($file)
{
    $acceptedMimeTypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'];
    return in_array(mime_content_type($file), $acceptedMimeTypes);
}

/**
 * Возвращает список файлов изображений
 * @return array|bool
 */
function getImages()
{
    $imageDir = getImageDir();

    // Подавляем вывод сообщения об ошибке для несуществующей директории.
    // TODO: Задать обработчик ошибок E_WARNING.
    $filenames = @scandir($imageDir, SCANDIR_SORT_NONE);

    if ($filenames) {
        $result = [];
        foreach ($filenames as $filename) {
            $file = $imageDir . DIRECTORY_SEPARATOR . $filename;

            if (is_file($file) && checkMimeType($file)) {
                $result[] = getImageUrl($file);
            }
        }
    } else {
        $result = FALSE;
    }

    return $result;
}

/**
 * Выводит блок с изображением
 * @param $image
 */
function displayImage($image)
{
    ?>
    <article class="col-md-4">
        <img src="<?= $image ?>" alt="<?= basename($image) ?>" class="img-responsive thumbnail">
    </article>
    <?php
}

/**
 * Сохраняет загруженное изображение на сервере
 * @param $image
 * @return bool
 */
function uploadImage($image)
{
    $path = getImageDir() . DIRECTORY_SEPARATOR . basename($image['name']);
    return move_uploaded_file($image['tmp_name'], $path);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_FILES['image1']) || !$_FILES['image1']['size'] || $_FILES['image1']['error'] != UPLOAD_ERR_OK ||
        !checkMimeType($_FILES['image1']['tmp_name'])
    ) {
        $error = 'Загрузите изображение.';
    } else {
        $result = uploadImage($_FILES['image1']);
        if (!$result) {
            $error = 'Ошибка при загрузке изображения.';
        }
    }
}

$images = getImages();

include 'include/header.php';
?>

    <h2>6.php</h2>
    <p class="lead">
        Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны
        помещаться в папку gallery и выводиться на странице в виде таблицы.
    </p>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= $error ?></p>
<?php endif; ?>

<?php if (!empty($images)): ?>
    <div class="row">
        <?php foreach ($images as $key => $image): ?>
            <?php displayImage($image); ?>
            <?php if ($key % 3 == 2): ?>
                <div class="clearfix visible-md-block visible-lg-block"></div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <form enctype="multipart/form-data" action="" method="post">
                <div class="form-group">
                    <label for="image1">Изображение</label>
                    <input type="file" name="image1" id="image1" accept="image/*" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';