<?php
function site_title($delimiter = '|', $display=true){
    $title = '';
    if(defined('site_title') && !defined('page_title')){
        $title = site_title;
    } else if(defined('site_title') && defined('page_title')){
        $title = site_title . ' ' . $delimiter . ' ' . page_title;
    }
    if($display){
        echo "<title>$title</title>";
    }else{
        return $title;
    }
}
