<?php

require_once('autoload.php');
require_once('./src/core/core.php');

use App\Core\Router;

include VIEWS . '/layout/head.php';
include VIEWS . '/layout/messages.php';
Router::handle();
include VIEWS . '/layout/footer.php';
