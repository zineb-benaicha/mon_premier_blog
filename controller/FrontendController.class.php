<?php
class FrontendController
{

    static public function HomePage()
    {
        require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'homeView.html');

    }
}