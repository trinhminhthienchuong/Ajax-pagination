<?php
    include_once('connect.php');

    class homeModel extends Connect{
        public function getFoodsToday(){
            $sql = 
            'SELECT `id`,`name`,`summary`,`price`,`image`
            FROM `foods` WHERE `today`=1';
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function getFoodsList(){
            $sql = 
            'SELECT `id`,`name`,`summary`,`detail`,`price`,`image`,`promotion_price`
            FROM `foods`  ';
            $this->setQuery($sql);
            return $this->loadAllRows();
        }

        public function countAllFoods(){
            $sql = 
            'SELECT COUNT(*) AS allFoods
            FROM `foods`  ';
            $this->setQuery($sql);
            return $this->loadRow();
        }

        public function getFoodsPagination($vitri=-1,$soluong=0){

            // $sql = 
            // "SELECT `id`,`name`,`summary`,`detail`,`price`,`image`,`promotion_price`
            // FROM `foods`";

             $sql = "SELECT f.*,p.url FROM foods  f inner join page_url p on p.id=f.id_url";
            if($vitri>=0){
                $sql.=" LIMIT $vitri,$soluong";
            }
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }