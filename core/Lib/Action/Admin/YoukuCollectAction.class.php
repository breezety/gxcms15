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
        $this->YModel->collect($_GET['id']);
        $data['res']='ok';
        $this->ajaxReturn($data);
    }
}