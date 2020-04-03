<?php

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

class WhoopsHook {
    public function bootWhoops() {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->register();
    }
}