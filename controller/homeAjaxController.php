<?php
include_once('controller.php');
include_once('module/HomeModel.php');
include_once('module/pagerAjax.php');

class homeAjaxController extends Controller
{
    public function getIndexAjax(){
        $model = new homeModel;
        $today = $model->getFoodsToday();
        $dsMonan = $model->getFoodsList();
        $tongSp = count($dsMonan);
        $currentPage = isset($_GET['page']) ? abs($_GET['page']) : 1;        
        // echo $currentPage;exit;
        $soLuong = 6;
        $soTrang = 4;
        // $pagConfig = array('baseURL'=>'getData.php', 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
        // $pagination =  new Pagination($pagConfig);
        $pager = new pagerAjax($tongSp,$currentPage,$soLuong,$soTrang);   
        $phan_trang = $pager->showPagination(); 
          
        $data  = ['today'=>$today,'phan_trang'=>$phan_trang];
        return $this->loadView('trangchuAjax',$data);
    }
}
