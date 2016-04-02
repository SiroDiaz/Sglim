<?php

use App\Models\Mymodel;

$app->get('/', function($req, $res, $args) {
    // $mymodel = new Mymodel($this->db);
    // $users = $mymodel->getAllUsers();
    
    return $this->view->render($res, 'index.html', []);
});