<?php
/**
 * Created by PhpStorm.
 * User: Huashu
 * Date: 13-10-31
 * Time: 下午2:49
 */

class YoukuCollectModel extends Model {

    private $DB;

    function  __construct(){
        $this->DB=D('video');
    }

    public function collect($id){
        $where['id']=$id;
        $video=$this->DB->where($where)->find();
        $url='http://www.soku.com/search_video/q_' . urlencode($video['title'].'官方高清预告片');
        $config=array();
        $html=collect::get_html($url,$config);
        $pattern="/v-link.*?title=\"(.*?)\".*?v_show\/id_(.*?)\.html/s";
        $array=array();
        preg_match_all($pattern,$html,$array);
        var_dump($array);
    }
}