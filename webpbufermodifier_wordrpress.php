<?php

if(preg_match('/image\/webp/', $_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['REQUEST_URI'], '/bitrix/') !== 0){
  add_action( 'get_header' , ['BufferModifier', 'startWebpHook']);
  add_action( 'wp_footer' , ['BufferModifier', 'endWebpHook']);
}

class BufferModifier {

  static function startWebpHook(){
    ob_start([self::class, 'makeWebp']);
  }

  static function endWebpHook(){
    ob_end_flush();
  }

  static function makeWebp($content){
    return preg_replace_callback("/(\.jpe?g|\.png)/", Array("BufferModifier", "replaceImageToWebp"), $content);
  }

  static function replaceImageToWebp($format){
    return '.webp';
  }

}


