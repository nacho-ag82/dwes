<?php namespace App\Helpers;

class Session {
    public static function start($data = []) {
        session_start();
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function destroy() {
        session_unset();
        session_destroy();
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }
}
?>