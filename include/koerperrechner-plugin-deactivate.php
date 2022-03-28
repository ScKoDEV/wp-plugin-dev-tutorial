<?php
/**
 * @package KoerperrechnerPlugin
 */

 class koerperrechnerPluginDeactivate
 {
     public static function deacitvate(){
         flush_rewrite_rules(  );
     }
 }