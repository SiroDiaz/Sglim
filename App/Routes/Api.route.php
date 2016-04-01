<?php namespace Routes;

$app->get('/', function($req, $res, $args) {
    $res->write("Hello world!");
    return $res;
});