<?php
/*
 * Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в
 * папку gallery и выводиться на странице в виде таблицы.
 */

/*
 * Функции работы с изображениями
 */

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
                $result[] = $file;
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
    $filename = basename($image);
    $url = getImageUrl($image);
    ?>
    <article class="col-md-4">
        <div class="thumbnail" title="<?= htmlentities($filename) ?>" data-toggle="popover" data-trigger="hover"
             data-placement="bottom"
             data-content="Тип: <?= mime_content_type($image) ?>. Размер: <?= getFilesize($image) ?>. Изменен: <?= date('d-m-Y', filemtime($image)) ?>.">
            <img src="<?= htmlentities($url) ?>" alt="<?= htmlentities($filename) ?>" class="img-responsive">
        </div>
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
    $filename = filterFilename($image['name']);
    $path = getImageDir() . DIRECTORY_SEPARATOR . $filename;

    return move_uploaded_file($image['tmp_name'], $path);
}

/*
 * Вспомогательные функции
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
 * Возвращает размер файла в удобочитаемом формате
 * @param $file
 * @param int $precision
 * @return string
 */
function getFilesize($file, $precision = 1)
{
    $size = filesize($file);
    $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $step = 1024;
    $i = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision) . $units[$i];
}

/**
 * Приводит имя файла к безопасному виду
 * @param $s
 * @return mixed|string
 */
function filterFilename($s)
{
    $search = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ы', 'э', 'ю', 'я', 'ъ', 'ь', ' '];
    $replace = ['a', 'b', 'v', 'g', 'd', 'e', 'e', 'j', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'shch', 'y', 'e', 'yu', 'ya', '', '', '-'];

    $s = preg_replace('/\s+/', ' ', $s);
    $s = trim($s);
    $s = mb_strtolower($s);
    $s = str_replace($search, $replace, $s);
    $s = preg_replace('/[^0-9a-z-_. ]/', '', $s);

    return $s;
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

/*
 * Основная функциональность
 */

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

    <p class="lead">
        Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны
        помещаться в папку gallery и выводиться на странице в виде таблицы.
    </p>

<?php if (isset($error)): ?>
    <p class="alert alert-danger"><?= htmlentities($error) ?></p>
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
                    <input type="file" name="image1" id="image1" accept="image/gif, image/jpeg, image/pjpeg, image/png"
                           class="form-control" required>
                </div>
                <button type="submit" class="btn btn-default">Ок</button>
            </form>
        </div>
    </div>

<?php
include 'include/footer.php';