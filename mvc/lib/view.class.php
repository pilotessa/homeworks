<?php
class View {
    protected $data;
    protected $path;

    protected static function getDefaultViewPath() {
        $router = App::getRouter();

        if(! $router) {
            return false;
        }
        $pathParts = [
            VIEWS,
            $router->getController()
        ];
        if($router->getMethodPrefix()) {
            $pathParts[] = $router->getMethodPrefix();
        }
        $pathParts[] = $router->getAction() . '.php';
        return implode(DS, $pathParts);
    }

    public function __construct($data = array(), $path = null) {
        if(! $path) {
            // Use default path
            $path = self::getDefaultViewPath();
        }

        if(! file_exists($path)) {
            throw new Exception('Template file ' . $path . ' is not found.');
        }
        $this->data = $data;
        $this->path = $path;
    }

    public function render() {
        $data = $this->data;

        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }
}