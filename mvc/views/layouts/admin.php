<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC Admin Area</title>
    <?=implode('', $data['headerScripts'])?>
    <?=implode('', $data['headerStyles'])?>
</head>
<body class="admin">
    <?php if(Session::get('role') == 'admin') { ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Router::uri('/admin') ?>">MVC Admin Area</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?= Router::uri('/') ?>"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Website</a>
                    </li>
                    <li>
                        <a href="<?= Router::uri('/admin/users/logout') ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
                    </li>
                    <li>
                        <a href="/"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Homerworks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(Session::hasFlash()) { ?>
                <div class="alert alert-info" role="alert">
                    <?php Session::flash(); ?>
                </div>
                <?php } ?>
                <?=$data['content']?>
            </div>
        </div>
        <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; 2017 <a href="http://helene.com.ua" target="_blank">Elena Mukhina</a></p>
                </div>
            </div>
        </footer>
    </div>
    <?=implode('', $data['bodyScripts'])?>
</body>
</html>