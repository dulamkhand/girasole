<?php

class myTools 
{
    public static $objectType = array('content'=>'Content');
    public static $catPositions = array(2=>'2 - Босоо хажуу', 3=>'3 - Хөндлөн дунд', 4=>'4 - Хөндлөн доод', 5=>'5 - Хөндлөн доод',);
    public static $catTypes = array('businesswoman'=>'businesswoman', 'housewife'=>'housewife', 'diva'=>'diva', 'teenage'=>'teenage', 'patriot'=>'patriot');
    public static $catTypesMn = array('businesswoman'=>'АЖИЛ ХЭРЭГ', 'housewife'=>'АЙЛ ГЭРИЙН АМЬДРАЛ', 'diva'=>'ГОО САЙХАН', 'teenage'=>'ӨСВӨР ҮЕИЙНХЭН', 'patriot'=>'ЭХ ОРОНЧ');
    public static $bannerPosition = array(
                        'header'=>'Header 300px65px', 
                        'home-featured'=>'Home featured 450px', 
                        'home-hor'=>'Home horizintal 715px',
                        'home-right'=>'Home right 270px', 
                        'branch1-hor'=>'Branch1 horizintal 800px', 
                        'branch1-left'=>'Branch1 left 450px', 
                        'branch1-pos2'=>'Branch1 pos2 320px', 
                        'branch1-right'=>'Branch1 right 170px', 
                        'branch2-hor'=>'Branch2 horizintal 670px', 
                        'branch2-right'=>'Branch2 right 300px', 
                        'leaf1-left'=>'Leaf1 horizintal 650px',
                        'leaf1-right'=>'Leaf1 right 325px',
                        'footer-up'=>'Footer up 1000px',
                        'sideright'=>'Sideright',
                        'search'=>'Search 1000px');
    public static $alphaEn = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    public static $alphaMn = array('A','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','Ө','П','Р','С','Т','У','Ү','Х','Ц','Ч','Ш','Щ','Ъ','Ь','Э','Ю','Я','','');
    public static $badWords = array('shit','crap','damn','bugger','jerk','asshole','bastard','douche','slut','fucking','fuck','bitch','cock','dick','darn','fag','piss','penis','pussy');
    public static $reservedWords = array('whats the reserved words');
    public static $modPermissions = array('content-view'=>'content-view', 
              'content-edit'=>'content-edit', 'content-delete'=>'content-delete', 'comment'=>'comment', 
              'discuss'=>'discuss', 'category'=>'category', 'banner'=>'banner', 'coupon'=>'coupon', 'quote'=>'quote', 
              'quiz'=>'quiz', 'poll'=>'poll', 'subscriber'=>'subscriber', 'admin'=>'admin', 'user'=>'user', 'feedback'=>'feedback');
              
    public static $days = array(1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,
            17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31);

    public static function getArray($type)
    {
        switch ($type) {
          	case 'objectType': return self::$objectType;
          	case 'catPositions': return self::$catPositions;
          	case 'catTypes': return self::$catTypes;
          	case 'catTypesMn': return self::$catTypesMn;
          	case 'bannerPosition': return self::$bannerPosition;
            case 'alphaEn': return self::$alphaEn;
          	case 'alphaMn': return self::$alphaMn;
          	case 'badWords': return self::$badWords;
          	case 'reservedWords': return self::$reservedWords;
          	case 'modPermissions': return self::$modPermissions;
          	case 'days': return self::$days;
        }
        return array();
    }
    
    public static function getArrayValues($type)
    {
        return array_values(self::getArray($type));
    }
    
    public static function getArrayKeys($type)
    {
        return array_keys(self::getArray($type));
    }
    
    public static function getValueByKey($type, $key)
    {
        $array = self::getArray($type);
        return $array[$key];
    }
    
    ################################################################################################################################################################
    
    static function clearReservedWords($text){
        $a = myTools::getArray('reservedWords');
        foreach ($a as $word) {
            $text = str_ireplace($word, '', $text);
        }
        return $text;
    }

    static function clearInput($text) {
        // xss, html tags are escaped here?
        $text = preg_replace('/\?/', ' ', $text);
        $text = preg_replace('/\"/', ' ', $text);
        $text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/</', ' ', $text);
        $text = preg_replace('/>/', ' ', $text);
        
        // strip tags
        $text = strip_tags($text);
        
        // don't clear badwords here
        
        // reserved words
        return myTools::clearReservedWords($text);
    }
    
    static public function slugify($text)
    {
        // replace all non letters or digits by -
        $text = preg_replace('/\W+/', '-', $text);
     
        // trim and lowercase
        $text = strtolower(trim($text, '-'));
     
        return $text;
    }
    
    
    ################################################################################################################################################################

    public static function truncateText($text, $length = 30, $truncate_string = '...', $truncate_lastspace = false) {
        if ($text == '') {
            return '';
        }

        if (mb_strlen($text) > $length) {
            $truncate_text = self::utf8_substr($text, 0, $length - mb_strlen($truncate_string));
            if ($truncate_lastspace) {
                $truncate_text = preg_replace('/\s+?(\S+)?$/', '', $truncate_text);
            }

            return $truncate_text.$truncate_string;
        }
        else {
            return $text;
        }
    }


    public static function validateEmail($email) {
        return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
    }

    public static function getFileName($fileName) {
        try {
            return substr($fileName, strrpos($fileName,'/')+1,strlen($fileName)-strrpos($fileName,'/'));
        }catch (Exception $e) {

        }
        return ;
    }

    public static function getFileExtension($fileName) {
        return strtolower(substr(strrchr($fileName, '.'), 1));
    }

    public static function changeFileExtension($fileName, $old_ext, $new_ext) {
        return str_replace(".".$old_ext, ".".$new_ext, $fileName);
    }

    public static function utf8_substr($str,$from,$len) {
        # utf8 substr
        return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
                '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
                '$1',$str);
    }

    public static  function utf8_ucfirst($string) {
        return utf8_encode(ucfirst(utf8_decode($string)));
    }

    public static function utf8_strtolower($string) {
        return utf8_encode(strtolower(utf8_decode($string)));
    }

    public static function getCurrentUrl() {
        return (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    }

    public static function mb_strlen($t, $encoding = 'UTF-8') {
        /* --enable-mbstring */
        if (function_exists('mb_strlen')) {
            return mb_strlen($t, $encoding);
        }
        else {
            return strlen(utf8_decode($t));
        }
    }

    public static function getSentences($str, $max_word_count = 30) {
        $sentences = explode('. ', strip_tags($str));
        $description = "";
        $counter = 0;

        foreach ($sentences as $sentence) {
            $words = explode(' ', $sentence);
            $counter += count($words);
            $description .= $sentence . '. ';
            if ($counter > $max_word_count) {
                return trim($description);
            }
        }

        return trim($description);
    }

    public static function scrap($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $html = curl_exec($ch);
        if (!$html) {
            $html = null;
        }

        return $html;
    }

 
    public static function stopwordsToCar($text, $char) {
        $words = preg_split('/[^\pL_]/u', $text, -1, PREG_SPLIT_NO_EMPTY);

        $c = new Criteria();
        $c->add(StopwordPeer::NAME, $words, Criteria::IN);
        $c->addSelectColumn(StopwordPeer::NAME);
        $rs = StopwordPeer::doSelectRS($c);
        while ($rs->next()) {
            $word = $rs->getString(1);
            $text = preg_replace("/([^\pL_])({$word})([^\pL_])/ui", "\\1$char\\3", ' '.$text.' ');
            $text = preg_replace("/([^\pL_])({$word})([^\pL_])/ui", "\\1$char\\3", $text); # removes duplicate ones
        }
        return trim($text);
    }
    

    public static function stripText($text) {
        $text = strtolower($text);

        // strip all non word chars
        $text = preg_replace('/\?/', ' ', $text);
        $text = preg_replace('/\"/', ' ', $text);
        $text = preg_replace('/\'/', ' ', $text);
        $text = preg_replace('/</', ' ', $text);
        $text = preg_replace('/>/', ' ', $text);

        // replace all white space sections with a dash
        $text = preg_replace('/\ +/', '-', $text);

        // trim dashes
        $text = preg_replace('/\-$/', '', $text);
        $text = preg_replace('/^\-/', '', $text);

        return $text;
    }


    public static function longwordBreak($str, $word_width) {
        $new_str = '';
        $len = strlen($str);
        $temp_str = '';
        $seperator = ' ';
        $is_opened = false;
        for($i = 0; $i < $len; $i++) {
            //open
            if($str[$i] == '<') {
                $is_opened = true;
                $new_str .= wordwrap($temp_str, $word_width, $seperator, 1);
                ;
                $temp_str = '';
                $new_str .= '<';
                //close
            } else if ($str[$i] == '>') {
                $is_opened = false;
                $new_str .= '>';
            } else {
                if ($is_opened) {
                    $new_str .= $str[$i];
                } else {
                    if ($str[$i] == $seperator) {
                        $new_str .= $temp_str.$seperator;
                        $temp_str = '';
                    } else {
                        $temp_str .= $str[$i];
                    }
                }
            }
        }
        return $new_str;
    }
    

    /**
     * author Dulamkhand
     *
     * @param unknown_type $filename
     * @param unknown_type $folder
     * @param unknown_type $thumb
     */
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
                        $thumbnail->save($uploadDir.$thumb."t-".$filename);
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

    /**
     * autor Dulamkhand
     * create size scalled image 
     *
     * @param unknown_type $filename
     * @param unknown_type $folder
     * @param unknown_type $qualities
     */
    
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
                        $thumbnail->save($uploadDir.$quality."q-".$filename);
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



    public static function mn2en($st) {
        $replacement = array(
                "й"=>"i","ц"=>"ts","у"=>"u","к"=>"k","е"=>"ye","н"=>"n",'ү'=>'u',
                "г"=>"g","ш"=>"sh","щ"=>"sh","з"=>"z","х"=>"h","ъ"=>"-",'ө'=>'u',
                "ф"=>"f","ы"=>"ii","в"=>"v","а"=>"a","п"=>"p","р"=>"r",
                "о"=>"o","л"=>"l","д"=>"d","ж"=>"j","э"=>"e","ё"=>"yo",
                "я"=>"ya","ч"=>"ch","с"=>"s","м"=>"m","и"=>"i","т"=>"t",
                "ь"=>"-","б"=>"b","ю"=>"yu","\""=>"-","'"=>"-",
                "Й"=>"I","Ц"=>"TS","У"=>"U","К"=>"K","Е"=>"YE","Н"=>"N",'Ү'=>'U',
                "Г"=>"G","Ш"=>"SH","Щ"=>"SH","З"=>"Z","Х"=>"H","Ъ"=>"-",'Ө'=>'U',
                "Ф"=>"F","Ы"=>"II","В"=>"V","А"=>"A","П"=>"P","Р"=>"R",
                "О"=>"O","Л"=>"L","Д"=>"D","Ж"=>"J","Э"=>"E","Ё"=>"YO",
                "Я"=>"YA","Ч"=>"CH","С"=>"S","М"=>"M","И"=>"I","Т"=>"T",
                "Ь"=>"-'","Б"=>"B","Ю"=>"YU",
        );

        foreach($replacement as $i=>$u) {
            $st = mb_eregi_replace($i,$u,$st);
        }
        return $st;
    }


    public static function mb_uppercase($word) {
        $cyr_lower_chars = array(
                'е','щ','ф','ц','у','ж','э',
                'н','г','ш','ү','з','к','ъ',
                'й','ы','б','ө','а','х','р',
                'о','л','д','п','я','ч','ё',
                'с','м','и','т','ь','в','ю',);

        $latin_lower_chars = array(
                'å','ù','ô','ö','ó','æ','ý',
                'í','ã','ø','¿','ç','ê','ú',
                'é','û','á','º','à','õ','ð',
                'î','ë','ä','ï','ÿ','÷','¸',
                'ñ','ì','è','ò','ü','â','þ',);

        $cyr_upper_chars = array(
                'Е','Щ','Ф','Ц','У','Ж','Э',
                'Н','Г','Ш','Ү','З','К','Ъ',
                'Й','Ы','Б','Ө','А','Х','Р',
                'О','Л','Д','П','Я','Ч','Ё',
                'С','М','И','Т','Ь','В','Ю',);

        $latin_upper_chars = array(
                'Å','Ù','Ô','Ö','Ó','Æ','Ý',
                'Í','Ã','Ø','¯','Ç','Ê','Ú',
                'É','Û','Á','ª','À','Õ','Ð',
                'Î','Ë','Ä','Ï','ß','×','¨',
                'Ñ','Ì','È','Ò','Ü','Â','Þ',);

        //replacing lower cyrillic
        $word = str_replace($latin_lower_chars, $cyr_lower_chars, $word);
        //replacing upper cyrillic
        $word = str_replace($latin_upper_chars, $cyr_upper_chars, $word);
        return $word;
    }
	
	
  	function str_split_unicode($str, $l = 0) {
  		if ($l > 0) {
  			$ret = array();
  			$len = mb_strlen($str, "UTF-8");
  			for ($i = 0; $i < $len; $i += $l) {
  				$ret[] = mb_substr($str, $i, $l, "UTF-8");
  			}
  			return $ret;
  		}
  		return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
  	}
  	
  	
  	

}

?>