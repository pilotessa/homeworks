<?php
class ErrorController extends Controller {
    public function indexAction() {
        return VIEWS . DS . 'error' . DS . 'index.php';
    }
}