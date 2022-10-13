<?php

declare(strict_types=1);

use Imi\App;
use Imi\AppContexts;
use Imi\RoadRunner\RoadRunnerApp;

require_once \dirname(__DIR__) . '/vendor/autoload.php';

if (!class_exists(RoadRunnerApp::class))
{
    exit('Please install imiphp/imi-roadrunner');
}

App::set(AppContexts::APP_PATH, \dirname(__DIR__), true);
App::run('ImiApp', RoadRunnerApp::class);
