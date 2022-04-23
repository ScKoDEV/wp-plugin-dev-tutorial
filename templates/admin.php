<div class="wrap">
<h1>SWS Plugin</h1>
<?php settings_errors(); ?>
<!-- option.php gehört zu wp und handles forms -->
<form method="post" action="options.php">
   <?php
        settings_fields('sws_options_group');
        do_settings_sections('koerperrechner_plugin');
        submit_button();
       ?> 
</form>
</div>