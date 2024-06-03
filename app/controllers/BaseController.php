<?php

namespace Controllers;

class BaseController
{
    /**
     * Render a view and pass data to it.
     * 
     * @param string $view The view file to render.
     * @param array $data The data to pass to the view.
     */
    protected function render($view, $data = [])
    {
        extract($data);
        require_once(__DIR__ . "/../views/$view.php");
    }
}