<?php

class Controller{
    function loadView($views,$data=[]){
        include_once('views/layout.php');
    }

    protected function loadData($views,$data=[]){
		include_once('views/'.$views);
	}

}