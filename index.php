<?php

    include_once('controller/homeAjaxController.php');    

    $c = new homeAjaxController;
    
    $c->getIndexAjax();

    // $c->getIndex();