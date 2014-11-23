<?php

class GlobalLib
{
public static $MENU = array();
public static function getArray($array)
{
    switch ($array) {
      	case 'menu': return self::$MENU;
    }
    return array();
}

public static function getArrayValues($array)
{
    return array_values(self::getArray($array));
}

public static function getArrayKeys($array)
{
    return array_keys(self::getArray($array));
}

public static function getValueByKey($array, $key)
{
    $array = self::getArray($array);
    return $array[$key];
}

/****************************************************************/

public static function utf8_substr($str,$from,$len) {
    # utf8 substr
    $str = preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
            '$1',$str);
    return GlobalLib::clearOutput($str);
}


public static function createThumbs($filename, $folder, $thumbs=array(), $removeOrg=false) 
{
    try {
        $ext = myTools::getFileExtension($filename);
        if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
        {
            $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
            if (sizeof($thumbs) && $filename && file_exists($uploadDir.$filename)) {
                // create thumbs
                foreach ($thumbs as $thumb) {
                    $thumbnail = new sfThumbnail($thumb, null, true, false, 75);
                    $thumbnail->loadFile($uploadDir.$filename);
                    $thumbnail->save($uploadDir."t".$thumb."-".$filename);
                }
                // remove orig image
                if($removeOrg) unlink($uploadDir.$filename);
                return true;
            }
        } // not an image file
    }catch (Exception $e) {

    }
    return false;
}  

public static function createQualities($filename, $folder, $qualities=array(), $removeOrg=false) 
{
    try {
        $ext = myTools::getFileExtension($filename);
        if(in_array($ext, array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF'))) 
        {
            $uploadDir = sfConfig::get('sf_upload_dir').'/'.$folder.'/';
            if (sizeof($qualities) && $filename && file_exists($uploadDir.$filename)) {
                // create quilities
                foreach ($qualities as $quality) {
                    $thumbnail = new sfThumbnail(null, null, true, false, $quality);
                    $thumbnail->loadFile($uploadDir.$filename);
                    $thumbnail->save($uploadDir."q".$quality."-".$filename);
                }
                // remove orig image
                if($removeOrg) unlink($uploadDir.$filename);
                return true;
            }
        } // not an image file
    }catch (Exception $e) {

    }
    return false;
}



public static function clearOutput($text)
{
    return nl2br(htmlspecialchars_decode(strip_tags($text, '<strong><b><i><em><u><sup><sub><ol><ul><li><a><img><embed><object>')));
}

public static function clearInput($text)
{
    // xss, html tags are escaped here?
    $text = preg_replace('/\?/', ' ', $text);
    $text = preg_replace('/\"/', ' ', $text);
    $text = preg_replace('/\'/', ' ', $text);
    $text = preg_replace('/</', ' ', $text);
    $text = preg_replace('/>/', ' ', $text);
    
    // strip tags
    $text = strip_tags($text);
    return $text;
}

}

?>