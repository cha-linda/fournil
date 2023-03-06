<?php
#############################
## ----- BACK OFFICE ----- ##
#############################

use App\Autoloader;

session_start();

require 'Autoloader.php';

Autoloader::register();

require 'Router/routing.php';

include_once 'Views/layout.php';