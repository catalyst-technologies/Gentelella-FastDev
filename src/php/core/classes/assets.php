<?php

class Assets {
    private $assets_url = '';
    private $assets = array();
    public function __construct($assets_url) {
        global $assets;
        if(!empty($assets)):
            $this->assets = $assets;
        endif;
        $this->assets_url = $assets_url;
    }
    public function get_script($url, $ext = false) {
        if (!$ext) {
            $url = $this->assets_url . $url;
        }
        print "<script src='$url'></script>" . "\n";
    }

    public function get_style($url, $ext = false) {
        if (!$ext) {
            $url = $this->assets_url . $url;
        }
        print "<link rel='stylesheet' href='$url'/>" . "\n";
    }
    /**
     * 
     * @param string $url
     * @param type $ext
     * @param type $class
     * @param type $alt
     */
    public function get_image($url, $ext = false, $class = '', $alt = '') {
        if (!$ext) {
            $url = $this->assets_url . $url;
        }
        print ("<img src='$url' class='$class' alt='$alt'/>");
    }
    public function img($url,$alt,$class,$style='',$ext=false){
        if (!$ext) {
            $url = $this->assets_url . $url;
        }
        print ("<img src='$url' class='$class' alt='$alt' style='$style'/>");
    }
    public function enqueue_style($tag, $url, $ext = false, $priority = null) {
        $this->assets['style'][$tag][] = array(
            'url' => $url,
            'ext' => $ext
        );
    }
    public function enqueue_styles($tag, $styles = array()) {
        foreach ($styles as $style):
            if (!array_key_exists('ext', $style)):
                $style['ext'] = false;
            endif;
            if (!array_key_exists('priority', $style)):
                $style['priority'] = null;
            endif;
            $this->enqueue_style($tag, $style['url'], $style['ext'], $style['priority']);
        endforeach;
    }
    public function enqueue_script($tag, $url, $ext = false, $priority = null) {
        $this->assets['script'][$tag][] = array(
            'url' => $url,
            'ext' => $ext
        );
    }
    public function enqueue_scripts($tag, $scripts = array()) {
        foreach ($scripts as $script):
            if (!array_key_exists('ext', $script)):
                $script['ext'] = false;
            endif;
            if (!array_key_exists('priority', $script)):
                $script['priority'] = null;
            endif;
            $this->enqueue_script($tag, $script['url'], $script['ext'], $script['priority']);
        endforeach;
    }
    public function get_styles($tag) {
        if (!array_key_exists($tag, $this->assets['style']))
            return;
        foreach ($this->assets['style'][$tag] as $style):
            if(!array_key_exists('ext',$style)):
                $style['ext'] = false;
            endif;
            $this->get_style($style['url'], $style['ext']);
        endforeach;
    }
    public function get_scripts($tag) {
        if (!array_key_exists($tag, $this->assets['script']))
            return;
        foreach ($this->assets['script'][$tag] as $script):
            if(!array_key_exists('ext',$script)):
                $script['ext'] = false;
            endif;
            $this->get_script($script['url'], $script['ext']);
        endforeach;
    }

}
$assets = new Assets('../assets/');
function get_styles($tag){
    global $assets;
    $assets->get_styles($tag);
}
function get_scripts($tag){
    global $assets;
    $assets->get_scripts($tag);
}
function get_image($url, $ext = false, $class = '', $alt = ''){
    global $assets;
    $assets->get_image($url,$ext,$class,$alt);
}

function img($url,$alt='',$class='',$style='',$ext=false){
    global $assets;
    $assets->img($url,$alt,$class,$style,$ext);
}