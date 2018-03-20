<?php
    require_once('connections/db.php');

    if (!isset($_GET['controller']) && isset($_GET['action']))
    {
        $action = str_replace('-', '', strtolower($_GET['action']));

        if($_GET['action'] == 'blog')
        {
            $controller = 'blog';
            $action = 'index';
        }
        else if($_GET['action'] == 'admin')
        {
            $controller = 'account';
            $action     = 'login';
        }
        else
        {
            $controller = 'home';
        }

        $post = null;
    }
    else if (isset($_GET['controller']) && isset($_GET['action'])&& !isset($_GET['post'])) {
        $controller = str_replace('-', '', strtolower($_GET['controller']));
        $action = str_replace('-', '', strtolower($_GET['action']));
        $post = null;
    }
    else if (isset($_GET['controller']) && isset($_GET['action']) && isset($_GET['post'])) {
        $controller = str_replace('-', '', strtolower($_GET['controller']));
        $action = str_replace('-', '', strtolower($_GET['action']));
        $post     = strtolower($_GET['post']);
    }
    else {
        $controller = 'home';
        $action     = 'index';
        $post = null;
    }

    require_once('views/routes.php');