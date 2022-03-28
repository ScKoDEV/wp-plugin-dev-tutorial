<?php
/**
 * @package KoerperrechnerPlugin
 */

 class koerperrechnerPluginDeactivate
 {
     public static function deactivate(){
         flush_rewrite_rules(  );
     }
 }