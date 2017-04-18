<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

$appPath = require('path.php');

require($appPath . '/vendor/autoload.php');
require($appPath . '/vendor/yiisoft/yii2/Yii.php');

$config = require($appPath . '/config/web.php');

(new yii\web\Application($config))->run();
