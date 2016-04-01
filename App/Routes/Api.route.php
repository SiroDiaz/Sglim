<?php namespace Routes;

$app->get('/', function($req, $res, $args) {
    return $this->view->render($res, 'index.html', []);
});