<?php
/**
 * @package KoerperrechnerPlugin
 */

 class koerperrechnerPluginActivate
 {
     public static function acitvate(){
         flush_rewrite_rules(  );
     }
 }