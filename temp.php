<?php

$router = 'test';

show();

function show() {
    global $router;

    echo $router;
}