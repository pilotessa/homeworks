<?php
class Session {
    protected static $flashMessage;

    public static function setFlash($message) {
        self::$flashMessage = $message;
    }

    public static function hasFlash() {
        return ! is_null(self::$flashMessage);
    }

    public static function flash() {
        echo self::$flashMessage;
        self::$flashMessage = null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public static function delete($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function destroy() {
        session_destroy();
    }
}