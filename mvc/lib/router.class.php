<?php
class Router {
    protected $uri;
    protected $controller;
    protected $action;
    protected $params;
    protected $route;
    protected $methodPrefix;

    private static function prepareUri($uri) {
        $uri = trim(urldecode($uri), '/');
        $baseUrl = trim(Config::get('baseUrl'), '/');

        return trim(preg_replace('/^' . preg_quote($baseUrl, '/') . '/', '', $uri), '/');
    }

    public function __construct($uri) {
        // Prepare uri
        $this->uri = self::prepareUri($uri);

        // Set defaults
        $routes = Config::get('routes');
        $this->route = Config::get('defaultRoute');
        $this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->controller = Config::get('defaultController');
        $this->action = Config::get('defaultAction');
        $this->params = [];

        // Parse uri like /route/controller/action/param1/param2... or /controller/action/param1/param2...
        $uriParts = explode('?', $this->uri);
        $uriParts2 = explode('#', $uriParts[0]);
        $path = $uriParts2[0];
        $pathParts = explode('/', $path);
        if(count($pathParts)) {
            // Get route name if defined
            if(in_array(strtolower(current($pathParts)), array_keys($routes))) {
                $this->route = strtolower(current($pathParts));
                $this->methodPrefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($pathParts);
            }

            // Get controller name
            if(current($pathParts)) {
                $this->controller = strtolower(current($pathParts));
                array_shift($pathParts);
            }

            // Get action name
            if(current($pathParts)) {
                $this->action = strtolower(current($pathParts));
                array_shift($pathParts);
            }

            // Assign all the rest to params
            $this->params = $pathParts;
        }
    }

    public function getUri() {
        return $this->uri;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getParams() {
        return $this->params;
    }

    public function getRoute() {
        return $this->route;
    }

    public function getMethodPrefix() {
        return $this->methodPrefix;
    }

    public static function redirect($location) {
        header('Location: ' . self::uri($location));
    }

    public static function uri($uri) {
        return Config::get('baseUrl') . $uri;
    }
}