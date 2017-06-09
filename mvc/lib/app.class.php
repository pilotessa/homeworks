<?php
class App {
    protected static $router;
    protected static $db;

    public static function getRouter() {
        return self::$router;
    }

    public static function getDb() {
        return self::$db;
    }

    public static function run($uri) {
        try {
            self::$router = new Router($uri);
            self::$db = new Db(Config::get('dbHost'), Config::get('dbUser'), Config::get('dbPassword'), Config::get('dbName'));

            // Setup controller
            $controllerClass = ucfirst(self::$router->getController()) . 'Controller';
            $controllerMethod = self::$router->getMethodPrefix() ? strtolower(self::$router->getMethodPrefix()) . ucfirst(self::$router->getAction()) . 'Action' : strtolower(self::$router->getAction()) . 'Action';

            // User role check
            $layout = self::$router->getRoute();
            if($layout == 'admin' && Session::get('role') != 'admin') {
                if($controllerMethod != 'adminLoginAction') {
                    Router::redirect('/admin/users/login');
                }
            }

            // Create controller object
            $controllerObject = new $controllerClass();
            if(method_exists($controllerObject, $controllerMethod)) {
                $vewPath = $controllerObject->$controllerMethod();
                $view = new View($controllerObject->getData(), $vewPath);
                $content = $view->render();
            } else {
                throw new Exception('Method ' . $controllerMethod . ' of class ' . $controllerClass . ' does not exist.');
            }

            $layoutPath = VIEWS . DS . 'layouts' . DS . $layout . '.php';
            $layoutObject = new View(['headerScripts' => $controllerObject->getHeaderScripts(), 'headerStyles' => $controllerObject->getHeaderStyles(), 'content' => $content, 'bodyScripts' => $controllerObject->getBodyScripts()], $layoutPath);
            echo $layoutObject->render();
        } catch(Exception $e) {
            $errorController = new ErrorController(['error' => $e->getMessage()]);
            $vewPath = $errorController->indexAction();
            $view = new View($errorController->getData(), $vewPath);
            $content = $view->render();
            $layoutPath = VIEWS . DS . 'layouts' . DS . 'default.php';
            $layoutObject = new View(['headerScripts' => $errorController->getHeaderScripts(), 'headerStyles' => $errorController->getHeaderStyles(), 'content' => $content, 'bodyScripts' => $errorController->getBodyScripts()], $layoutPath);
            echo $layoutObject->render();
        }
    }
}