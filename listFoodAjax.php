<?php

    include_once('controller/listFoodAjaxController.php');    

    $c = new listFoodAjaxController;

    $page = isset($_POST['page']) ? $_POST['page'] : 1;

    
    $c->getListFoodAjaxController($page);