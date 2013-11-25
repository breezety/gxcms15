<?php
/**
 * Created by PhpStorm.
 * User: Huashu
 * Date: 13-10-31
 * Time: 下午4:18
 */

require("./core/Common/Admin/collect.class.php");
header('Content-Type:text/html;charset=utf-8');


$title = $_POST['tx1'];
$url = 'http://www.soku.com/search_video/q_' . urlencode(join(' ',collect::get_segment_text_array($title)) . ' 预告片');
$html = @file_get_contents($url);
$pattern = "/v-meta-title.*?title=\"(.*?)\".*?_log_vid=\"(.*?)\"/s";
$array = array();
preg_match_all($pattern, $html, $array);
foreach($array[1] as $tmp){
    if(strpos($tmp,'预告')===false){
        continue;
    }
    $tp='';
    $tp.=$title . '预告片 ' . $tmp;
    $score=collect::get_similar_score($title,$tmp);
    $tp.=' '.$score;
    echo $tp.'</br>';
}

?>