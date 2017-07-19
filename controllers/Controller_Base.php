<?php

class Controller_Base {

    public function show ()
    {
        return 'This is the default show action!';
    }

    public function partial ($controller_method)
    {
        $parts      = explode('@', $controller_method);
        $controller = new $parts[0]();
        $method     = $controller->{$parts[1]}();
        return $method;
    }

    public function view ($name, $additional = false)
    {
        if (true == file_exists(__DIR__ . './../views/' . $name . '.php')) {
            if (false != $additional) {
                extract($additional);
            }
            ob_start();
                include __DIR__ . './../views/' . $name . '.php';
                $compiled = ob_get_contents();
            ob_end_clean();
            echo $compiled;
        }
    }

}