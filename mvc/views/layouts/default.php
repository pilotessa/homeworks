<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC</title>
    <?=implode('', $data['headerScripts'])?>
    <?=implode('', $data['headerStyles'])?>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Router::uri('/') ?>">MVC</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Session::get('role') == 'admin') { ?>
                    <li>
                        <a href="<?= Router::uri('/admin') ?>"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Admin area</a>
                    </li>
                    <?php } ?>
                    <?php if(Session::get('login')) { ?>
                    <li>
                        <a href="<?= Router::uri('/admin/users/logout') ?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a href="<?= Router::uri('/admin/users/login') ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="/"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Homerworks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
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