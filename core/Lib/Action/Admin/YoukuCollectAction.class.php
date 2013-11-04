<?php
/**
 * Created by PhpStorm.
 * User: Huashu
 * Date: 13-10-31
 * Time: 下午2:45
 */

class YoukuCollectAction extends AdminAction{
    private $YModel;

    public function _initialize(){
        parent::_initialize();
        $this->YModel =D('Admin.YoukuCollect');
    }

    public  function collect(){
        $data=$this->YModel->collect($_GET['id']);
        $this->ajaxReturn($data);
    }

    public function  submitPreview(){
        $preview_id=$_REQUEST['preview_id'];
        $id=$_REQUEST['id'];
        $res=$this->YModel->savePreview($id,$preview_id);
        $this->ajaxReturn($res);
    }
}