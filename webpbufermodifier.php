<?
if(preg_match('/image\/webp/', $_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['REQUEST_URI'], '/bitrix/') !== 0)
  AddEventHandler("main", "OnEndBufferContent", Array("BufferModifier", "makeWebp"));


class BufferModifier {

  static function makeWebp(&$content){
    $content = preg_replace_callback("/(\.jpe?g|\.png)/", Array("BufferModifier", "replaceImageToWebp"), $content);
  }

  static function replaceImageToWebp($format){
    return '.webp';
  }


}
