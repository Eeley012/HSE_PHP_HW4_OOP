<?php

trait PrintTrait {
    public function log($message) {
        echo $message . "<br>" . PHP_EOL;
    }
}