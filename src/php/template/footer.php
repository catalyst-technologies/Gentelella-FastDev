<!-- footer content -->
<footer>
  <div class="pull-right">
    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<!-- Base plugins -->
<?php get_scripts('base'); ?>
<!-- Plugins -->
<?php get_scripts('plugins'); ?>
<!-- Theme -->
<?php get_scripts('theme'); ?>
<?php
if(function_exists('custom_scripts')):
    custom_scripts();
endif;
?>
