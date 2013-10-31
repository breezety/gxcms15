<?php
/**
 * Created by PhpStorm.
 * User: Huashu
 * Date: 13-10-31
 * Time: 下午4:18
 */

$a='<div class="v-link">\n<a title="《RIME》官方高清预告片" target="_blank" href="http://v.youku.com/v_show/id_XNjA0NzkyMzI4.html"  _log_type="3" _log_pos="1"  _log_vid="XNjA0NzkyMzI4"  _log_cid="99"></a>\n</div>\n <div class="v-meta va">'
.'<div class="v-link">\n<a title="adsfsdfsd" target="_blank" href="http://v.youku.com/v_show/id_XNjA0NzkyMzI4.html"  _log_type="3" _log_pos="1"  _log_vid="XNjA0NzkyMzI4"  _log_cid="99"></a>\n</div>\n <div class="v-meta va">';
$array=array();
preg_match_all("/v-link.*?title=\"(.*?)\"/",$a,$array);
var_dump($array);