<?php

//continue only if $_GET is set and it is a Ajax request
if(isset($_GET) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
include_once('controller.php');
include_once('module/HomeModel.php');
include_once('module/pagerAjax.php');

class listFoodAjaxController extends Controller
{

    public function getListFoodAjaxController($page){
        
        $model  = new homeModel;
        $dsMonan = $model->getFoodsList();
        $tongSp = count($dsMonan);
        $dsMonan = $model->getFoodsList();                        
        $currentPage = !empty($page) ? abs($page) : 1;
        $soLuong = 6;
        $soTrang = 4;
        $pager = new pagerAjax($tongSp,$currentPage,$soLuong,$soTrang);   

        $vitri = ($currentPage-1)*$soLuong;
        $listFoods = $model->getFoodsPagination($vitri,$soLuong);       
        $phan_trang = $pager->showPagination(); 
          
        $arrData  = ['listFoods'=>$listFoods,'phan_trang'=>$phan_trang];

        return $this->loadData('dsMonAnAjax.php',$arrData);
    }    
}
}
