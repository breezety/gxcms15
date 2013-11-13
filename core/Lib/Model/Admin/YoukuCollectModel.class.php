<?php
/**
 * Created by PhpStorm.
 * User: Huashu
 * Date: 13-10-31
 * Time: 下午2:49
 */

class YoukuCollectModel extends Model {

    private $DB;
    private $CDB;

    function  __construct(){
        $this->DB=D('video');
        $this->CDB=D('co_content');
    }

    public function collect($id){
        $where['id']=$id;
        $video=$this->DB->where($where)->find();
        $array=$this->collect0($video['title']);
        return $array;
    }

    public function collect0($title){
        $url='http://www.soku.com/search_video/q_' . urlencode($title.' 预告片');
        $config=array();
        $html=collect::get_html($url,$config);
        $pattern="/v-meta-title.*?title=\"(.*?)\".*?_log_vid=\"(.*?)\"/s";
        $array=array();
        preg_match_all($pattern,$html,$array);
        return $array;
    }

    public function collect1($title){
        $array=$this->collect0($title);
        $a=count($array[0]);
        if(count($array)<=0)
            return '';
        $title1=$array[1][0];
        $youkuId=$array[2][0];
        if(strpos($title1,$title)!==false){
            return $youkuId;
        }else{
            return '';
        }
    }

    public function savePreview($id,$preview_id){
        $where['id']=$id;
        $data['youku_pre_id']=$preview_id;
        $where['id']=$id;
        $Update=$this->DB->where($where)->save($data);
        if($Update==true)
            return true;
        else
            return false;
    }

    public function autoCollect($id){
        $where['id']=$id;
        $content=$this->CDB->where($where)->find();

        $array=$this->collect0($content['title']);
        if($array[0].length<=0)
            return;

        $title=$array[2][0];
        $youkuId=$array[1][0];

        if(strpos($title,$content['title'])!==false){
            $data['youku_pre_id']=$youkuId;
            $this->CDB->where($where)->save($data);
        }else{
            return;
        }
    }


}