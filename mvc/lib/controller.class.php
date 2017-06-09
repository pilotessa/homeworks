<?php
class Controller {
    protected $headerScripts;
    protected $headerStyles;
    protected $bodyScripts;
    protected $data;
    protected $params;

    public function __construct($data = []) {
        $this->headerScripts = Config::get('headerScripts');
        $this->headerStyles = Config::get('headerStyles');
        $this->bodyScripts = Config::get('bodyScripts');
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
    }

    public function getHeaderScripts() {
        return $this->headerScripts;
    }

    public function getHeaderStyles() {
        return $this->headerStyles;
    }

    public function getBodyScripts() {
        return $this->bodyScripts;
    }

    public function getData() {
        return $this->data;
    }

    public function getParams() {
        return $this->params;
    }
}