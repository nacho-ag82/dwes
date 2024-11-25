<?php
namespace App\Core;

abstract class Controller {
    protected function render($view, $data = []) {
        extract($data);
        require_once __DIR__ . "/../Views/$view.php";
    }
}