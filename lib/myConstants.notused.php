<?php

class myConstants
{
  
  // Type
  public static $TYPES = array('fashion'=>'Хувцас & Загвар', 'collection'=>'Цуглуулга', 'event'=>'Үйл явдлууд', 'videos'=>'Видео');
  public static function getTypes()
  {
      return self::$TYPES;
  }
  public static function getTypeKeys()
  {
      return array_keys(self::$TYPES);
  }
  public static function getTypeValueByKey($key)
  {
      $array = self::$TYPES;
      return $array[$key];
  }

  
  // View Detail
  public static $VIEW_DETAIL = array('list1'=>'list1', 'list2'=>'list2', 'list3'=>'list3', 'list4'=>'list4');
  public static function getViewDetail()
  {
      return self::$VIEW_DETAIL;
  }
  public static function getViewDetailKeys()
  {
      return array_keys(self::$VIEW_DETAIL);
  }
  public static function getViewDetailByKey($key)
  {
      $array = self::$VIEW_DETAIL;
      return $array[$key];
  }

  
  // View LIST
  public static $VIEW_LIST = array('list1'=>'list1', 'list2'=>'list2', 'list3'=>'list3', 'list4'=>'list4');
  public static function getViewList()
  {
      return self::$VIEW_LIST;
  }
  public static function getViewListKeys()
  {
      return array_keys(self::$VIEW_LIST);
  }
  public static function getViewListByKey($key)
  {
      $array = self::$VIEW_LIST;
      return $array[$key];
  }

  
  
  
  // GALLERY Type
  public static $GALLERY_TypeS = array('welcome'=>'Тавтай морил', 'intro'=>'Танилцуулга', 'news'=>'Мэдээ, мэдээлэл', 'service'=>'Үйлчилгээ', 'room'=>'Өрөө', 'Type'=>'Меню', 'other'=>'Бусад');
  public static function getGalleryTypes()
  {
      return self::$GALLERY_TypeS;
  }
  public static function getGalleryTypeKeys()
  {
      return array_keys(self::$GALLERY_TypeS);
  }
  public static function getGalleryTypeValueByKey($key)
  {
      $array = self::$GALLERY_TypeS;
      return $array[$key];
  }
  
  
  
  
  //BANNER
  public static $BANNER_POSITIONS = array(1=>'Вэбийн толгой хэсэгт (өргөн=1000px, өндөр=65px)', 2=>'Нүүр хуудсаны дунд хэсэгт (өргөн=750px)', 3=>'Баруун хэсэгт (өргөн=220px)');

  public static $BANNER_POSITIONS_WIDTH = array(1=>1000, 2=>750, 3=>220);

  // get banner positions array
  public static function getBannerPositions()
  {
      return self::$BANNER_POSITIONS;
  }
  public static function getBannerPositionValue($key)
  {
    $positions = self::$BANNER_POSITIONS;
      return $positions[$key];
  }
  public static function getBannerPositionWidth($key)
  {
      $positions = self::$BANNER_POSITIONS_WIDTH;
      return $positions[$key];
  }

  public static function getBannerPositionWidths()
  {
      return self::$BANNER_POSITIONS_WIDTH;
  }



}