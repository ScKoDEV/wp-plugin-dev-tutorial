<?php
/**
 * @package KoerperrechnerPlugin
 */

 class koerperrechnerPluginActivate
 {
     public static function activate(){
         flush_rewrite_rules(  );
     }
 }