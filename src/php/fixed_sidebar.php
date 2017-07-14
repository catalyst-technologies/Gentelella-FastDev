<?php
require_once('core/main.php');
$assets->enqueue_styles('plugins', array(
    array('url' => 'plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')
));
$assets->enqueue_scripts('plugins', array(
    array('url' => 'plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')
));
define('page_title', 'Fixed Sidebar');
require_once('template/header.php');
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once('template/footer.php');
html_close();
?>