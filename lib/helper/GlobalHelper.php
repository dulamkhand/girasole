<?php
function getOnlineIcon($is_online) {
  $title = $is_online ? 'онлайн гишүүн' : 'оффлайн гишүүн';
  return $is_online?'<a href="/pages/online" rel="facebox" title="онлайн">'.image_tag('power_on.png', ' title="'.$title.'" class=middle').'</a>':'';
}

function getConnectClass($count) {
  switch ($count) {
    case 2:
      $class = 'two';
      break;
    case 3:
      $class = 'three';
      break;
    case 4:
      $class = 'four';
      break;
    case 5:
      $class = 'five';
      break;
    case 6:
      $class = 'six';
      break;
    case 7:
      $class = 'seven';
      break;
  }

  return $class;
}

function get_user_info($user, $additional = true) {
	
	if($additional == true) {
    $confirm = $user->getIsFeatured() ? "<a href='/pages/confirmed' rel='facebox' title='Баталгаажсан Профайл'><img src='/images/confirmed.gif'/></a>" : '';
	} else {
		$confirm = '';
	}
    
  $image = "<div class='profile_image'>".user_profile_img($user, 't')."</div>";
  $title = "<div class='profile_title'>".link_to($user->getName(), '@user_profile?username='.$user->getUsername())." ".$confirm.getOnlineIcon($user->isOnline())."</div>";
  $industry = "<div class='description'>".$user->getIndustry()->getName()."</div>";

  return $image.$title.$industry;
}

function get_employee_info($employee, $size = 's') {
  $confirm = $employee->getIsFeatured() ? "<a href='/pages/confirmed' rel='facebox' title='Баталгаажсан Профайл'><img src='/images/confirmed.gif'/></a>" : '';

  $width = $size == 't'?30:($size == 'm'?40:($size=='s'?60:120));

  $filename = user_profile_img_path($employee, $size);

  $image = '<div class="profile_image"><img border="0" id="user_'.$employee->getId().'" width="'.$width.'" align="absmiddle" src="' .  $filename  . '" alt="'. $employee->getUsername() .'" title="'. $employee->getUsername() .'"/></div>';
  $title = "<div class='profile_title'>".link_to($employee->getName(), '@user_profile?username='.$employee->getUsername())." ".$confirm.getOnlineIcon($employee->isOnline())."</div>";
  $position = "<div class='description'>".$employee->getProfile()->getPosition()->getName()."</div>";
  $company = "<div class='description'>".$employee->getProfile()->getCompany()->getName()."</div>";

  return $image.$title.$position.$company;
}


function submit_premium() {
  ?>
  <div class="success">
  
  <a href="/upgrate">Гишүүнчлэлийн</a> давуу тал:
  <ul>
    <li><a href="/upgrade" style="width: 100px; border: 1px Solid #FFFF00; background:#FFFF99 url('/images/business-member.png') no-repeat 0px 0px; padding-left: 20px;"> Бизнес</a> гишүүний оруулсан зар <b>2 өдрийн турш</b> жагсаалтад давуу эрх эдлэнэ.</li>  
    <li><a href="/upgrade" style="width: 100px; border: 1px Solid #6699FF; background:#66CCFF url('/images/support-member.png') no-repeat 0px 0px; padding-left: 20px;"> Дэмжигч</a></br> гишүүний оруулсан зар <b>1 өдрийн турш</b> жагсаалтад давуу эрх эдлэнэ.</li>  
    <li>Жирийн гишүүний оруулсан зар бизнес болон дэмжигч гишүүдийн зарын доор байрлана.</li>
  </ul>
  </div>
  <?php
}
function submit_warning() {
  return ;
  ?>
  <div class="error">
  
  Та мэдээлэл оруулахдаа доорх зүйлсийг анхаарна уу!
  <ul>
    <li>Үнэн бодитой байх</li>
    <li>Давхардаагүй байх</li>
  </ul>
  Дээрх 2 заалтад нийцээгүй мэдээлэл сануулгагүй сайтаас устана.
  </div>
  <?php
}

function getBirthdateToString($date) {
  $strtime = strtotime($date);
  $month = date('n', $strtime);
  $day = date('j', $strtime);

  return $month.'-р сарын '.$day;
}

function network_logo_path($network, $size = '')
{
  $filename = $network->getLogo() ;

  switch ($size) {
    case 't':
      $dir = '/uploads/network/thumb/small/';
      break;
    case 'm':
      $dir = '/uploads/network/thumb/';
      break;
    case 's':
      $dir = '/uploads/network/thumb/';
      break;
    default:
      $dir = '/uploads/network/';
      break;
  }

  if ($network->getLogo() && file_exists( SF_ROOT_DIR . "/web". $dir . $network->getLogo() ) )
  {
    $filename = $network->getLogo() ;
  }

  return $dir . $filename;
}

function network_logo_img($network, $size = '')
{
  $width = $size == 't'?30:($size == 'm'?40:($size=='s'?60:120));

  $filename = network_logo_path($network, $size);

  return '<a href="'.url_for('@networkShow?id='.$network->getId()).'"><img border="0" width="'.$width.'" align="absmiddle" src="' .  $filename  . '" alt="'. $network->getName() .'" title="'. $network->getName() .'"/></a>';
}

function search_simple_link($value, $type, $style = '', $text = '') {

  switch ($type) {
    case 'industry_id':
      if (!$text) {
        $text = IndustryPeer::getNameById($value);
      }
      break;
    case 'language_id':
      $text = LanguagePeer::getNameById($value);
      break;
    case 'language_level':
      $text = AppConstants::getLanguageLevelName($value);
      break;
    default:
      $text = $value;
      break;
  }

  if ($style == 'bold') {
    return '<a href="'.url_for('@search_profile?'.$type.'='.$value).'" style="font-weight: 100; color: #555"><b>'.$text.'</b></a>';
  }
  return '<a href="'.url_for('@search_profile?'.$type.'='.$value).'" style="font-weight: 100; color: #555">'.$text.'</a>';
}

function input_custom_tag($name, $default, $value = '', $style = '')
{
  $value = $value == '' ? sfContext::getInstance()->getRequest()->getParameter($name) : $value;
  $value = $value == '' ? $default : $value;
  $style = $value == $default ? "color:#afafaf; ".$style : $style;

  return input_tag($name,
  $value,
  array(
  'class' => "" ,
  "style" => $style,
  'onclick' => "clearDefault(this, '$default')" ,
  'onblur' => "recallDefault(this, '$default')",
  'onfocus' => "clearDefault(this, '$default')")
  );
}

function textarea_custom_tag($name, $default, $value = '', $style = 'height:120px')
{
  $value = $value == '' ? sfContext::getInstance()->getRequest()->getParameter($name) : $value;
  $value = $value == '' ? $default : $value;
  $style = $value == $default ? "color:#afafaf; ".$style : $style;

  return textarea_tag($name,
  $value,
  array(
  'class' => "b70" ,
  "style" => $style,
  'onclick' => "clearDefault(this, '$default')" ,
  'onblur' => "recallDefault(this, '$default')",
  'onfocus' => "clearDefault(this, '$default')")
  );
}

function login_warning()
{
  $login = 'Та <a href='.url_for('@login').'>энд</a> дарж нэвтэрч орно уу?';
  $register = 'Хэрвээ та бүртгэлгүй бол <a href='.url_for('@join').'>энд</a> дарж бүртгүүлнэ үү?';
  $warning = $login.'<br />'.$register;

  return $warning;
}

function event_list_img($event)
{
  $dir = '/uploads/event/';
  $filename = "icn_public_event.gif";

  if ( file_exists( SF_ROOT_DIR . "/web". $dir . 'm_' . $event->getImage() ) )
  {
    $filename = 'm_' . $event->getImage() ;
  }

  return '<img width="40" align="absmiddle" src="' . $dir . $filename  . '" alt="'. $event->getUser()->getUsername() .'" title="'. $event->getUser()->getUsername() .'"/>';
}

function event_detail_img($event)
{
  $dir = '/uploads/event/';
  $filename = "icn_public_event.gif";

  if ( file_exists( SF_ROOT_DIR . "/web". $dir . 's_' . $event->getImage() ) )
  {
    $filename = 's_' . $event->getImage() ;
  }

  return '<img align="left" vspace=2 hspace=2 width="120" src="' . $dir . $filename  . '" alt="'. $event->getName() .'" title="'. $event->getName() .'"/>';
}

function link_to_rss($name, $uri)
{
  return link_to(image_tag('feed.gif', array('alt' => $name, 'title' => $name, 'align' => 'absmiddle')), $uri);
}

function link_to_login($name, $uri = null)
{
  use_helper('Javascript');

  if ($uri && sfContext::getInstance()->getUser()->isAuthenticated())
  {
    return link_to($name, $uri);
  }
  else
  {
    //return link_to_function($name, visual_effect('blind_down', 'login', array('duration' => 0.5)));
    return link_to($name, '/login');
  }
}

function pager_navigation($pager, $uri)
{
  if ($uri[0] != '/') {
    $uri = url_for($uri);
  }

  $navigation = '';

  if ($pager->haveToPaginate())
  {
    $uri .= (preg_match('/\?/', $uri) ? '&amp;' : '?').'page=';    

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= '<a href="'.$uri.'1">&laquo; Эхэнд</a>';
      $navigation .= '<a href="'.$uri.$pager->getPreviousPage().'">Өмнөх</a>';
    }

    // Pages one by one
    $links = array();
    $options = '';
    foreach ($pager->getLinks() as $page)
    {
      $links[] = '<a href="'.$uri.$page.'" class="'.($page == $pager->getPage()?"current":"").'">'.$page.'</a>';
    }
    $navigation .= join('', $links);
    
    
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {

      $navigation .= '<a href="'.$uri.$pager->getNextPage().'" >Дараах</a>';
      $navigation .= '<a href="'.$uri.$pager->getLastPage().'" >Сүүлд &raquo;</a>';
    }

  }

  /*$min_page = ($pager->getPage() - 20 > 0)?$pager->getPage() - 20:1;
  $max_page = $pager->getPage() + 20 > $pager->getLastPage()? $pager->getLastPage():$pager->getPage() + 20;

  if ($pager->getNbResults() > 0) {
    $navigation .= '<span>Нийт <b>'.$pager->getNbResults().'</b> үр дүн. Энэ хуудсанд '.$pager->getFirstIndice().'-'.$pager->getLastIndice().'.</span>';

    //for($i = $min_page; $i <= $max_page; $i++){
    //  $navigation .='<option value="'.$uri.$i.'" '.($i == $pager->getPage()?"selected":"").'>'.$i.'</option>';
    //}

  }
*/
  
  return $navigation;
}

function ajax_pager($pager, $js_options = array(), $html_options = array()){
  use_helper("Javascript");

  $navigation = '<div class="pagination">
                    <div class="pagination_inner">';


  $uri = $js_options['url'];

  if ($pager->haveToPaginate())
  {
    $uri .= (preg_match('/\?/', $uri) ? '&' : '?').'page=';

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= link_to_remote('<em> << </em>', array("url"=>$uri.'1') + $js_options, $html_options);
      $navigation .= link_to_remote('<em> < </em>', array("url"=>$uri.$pager->getPreviousPage()) + $js_options, $html_options).'&nbsp;';
    }

    // Pages one by one
    $links = array();
    foreach ($pager->getLinks() as $page)
    {
      $html_options['class'] = ($page == $pager->getPage()) ? "selected" : "";
      $links[] = link_to_remote('<em>'.$page.'</em>', array("url" => $uri.$page) + $js_options, $html_options);
    }
    $navigation .= join(' ', $links);

    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {
      $navigation .= link_to_remote('<em> > </em>', array("url"=>$uri.$pager->getNextPage()) + $js_options, $html_options);
      $navigation .= link_to_remote('<em> >> </em>', array("url"=>$uri.$pager->getLastPage()) + $js_options, $html_options);
    }
  }

  if ($pager->getNbResults() > 0) {
    $navigation .= ' <span>Нийт <b>'.$pager->getNbResults().'</b> үр дүн. Энэ хуудсанд '.$pager->getFirstIndice().'-'.$pager->getLastIndice().'.</span>';
  }

  $navigation .= '</div>
                 </div><!--pagination-->';

  return $navigation;
}



function pager($pager, $uri)
{
  if ($uri[0] != '/') {
    $uri = url_for($uri);
  }

  $navigation = '<div class="pager">';

  if ($pager->haveToPaginate())
  {
    $uri .= (preg_match('/\?/', $uri) ? '&amp;' : '?').'page=';    

    // First and previous page
    if ($pager->getPage() != 1)
    {
      $navigation .= '<a href="'.$uri.'1">&laquo; Эхэнд</a>';
      $navigation .= '<a href="'.$uri.$pager->getPreviousPage().'">Өмнөх</a>';
    }

    // Pages one by one
    $links = array();
    $options = '';
    foreach ($pager->getLinks() as $page)
    {
      $links[] = '<a href="'.$uri.$page.'" class="'.($page == $pager->getPage()?"selected":"").'">'.$page.'</a>';
    }
    $navigation .= join('', $links);
    
    // Next and last page
    if ($pager->getPage() != $pager->getCurrentMaxLink())
    {

      $navigation .= '<a href="'.$uri.$pager->getNextPage().'" >Дараах</a>';
      $navigation .= '<a href="'.$uri.$pager->getLastPage().'" >Сүүлд &raquo;</a>';
    }
  }

  if ($pager->getNbResults() > 0) {
    $navigation .= '<span class="total">Нийт '.$pager->getNbResults().'. Энэ хуудсанд '.$pager->getFirstIndice().'-'.$pager->getLastIndice().'.</span>';
  }
  $navigation .= '</div>';

  return $navigation;
}


function csrf_tag()
{
  $secret = sfConfig::get('app_csrf_secret');
  $tag = '<input type="hidden" name="token" value="'.md5($secret.session_id()).'" />';
  return $tag;
}

function time_ago($from_time, $to_time = null, $include_seconds = false)
{
  if(!is_numeric($from_time)){
    $from_time = strtotime($from_time);
  }
  
  $to_time = $to_time? $to_time: time();
  
  if ($from_time > $to_time) $from_time = $to_time;

  $distance_in_minutes = floor(abs($to_time - $from_time) / 60);
  $distance_in_seconds = floor(abs($to_time - $from_time));

  $string = '';
  $parameters = array();

  if ($distance_in_minutes <= 1)
  {
    if (!$include_seconds)
    {
      $string = $distance_in_minutes == 0 ? 'саяхан' : '1 минут өмнө';
    }
    else
    {
      if ($distance_in_seconds <= 5)
      {
        $string = '5 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 6 && $distance_in_seconds <= 10)
      {
        $string = '10 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 11 && $distance_in_seconds <= 20)
      {
        $string = '20 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 21 && $distance_in_seconds <= 40)
      {
        $string = '30 секундийн өмнө';
      }
      else if ($distance_in_seconds >= 41 && $distance_in_seconds <= 59)
      {
        $string = '50 секундийн өмнө';
      }
      else
      {
        $string = '1 минутын өмнө';
      }
    }
  }
  else if ($distance_in_minutes >= 2 && $distance_in_minutes <= 44)
  {
    $string = '%minutes% минутын өмнө';
    $parameters['%minutes%'] = $distance_in_minutes;
  }
  else if ($distance_in_minutes >= 45 && $distance_in_minutes <= 89)
  {
    $string = '1 цагийн өмнө';
  }
  else if ($distance_in_minutes >= 90 && $distance_in_minutes <= 1439)
  {
    $string = '%hours% цагийн өмнө';
    $parameters['%hours%'] = round($distance_in_minutes / 60);
  }
  else if ($distance_in_minutes >= 1440 && $distance_in_minutes <= 2879)
  {
    $string = '1 өдрийн өмнө';
  }
  else if ($distance_in_minutes >= 2880 && $distance_in_minutes <= 43199)
  {
    $string = '%days% өдрийн өмнө';
    $parameters['%days%'] = round($distance_in_minutes / 1440);
  }
  else if ($distance_in_minutes >= 43200 && $distance_in_minutes <= 86399)
  {
    $string = '1 сарын өмнө';
  }
  else /*if ($distance_in_minutes >= 86400 && $distance_in_minutes <= 525959)
  {
    $string = '%months% сарын өмнө';
    $parameters['%months%'] = round($distance_in_minutes / 43200);
  }
  else if ($distance_in_minutes >= 525960 && $distance_in_minutes <= 1051919)
  {
    $string = '1 жилийн өмнө';
  }
  else
  {
    $string = '%years%  жилийн өмнө';
    $parameters['%years%'] = floor($distance_in_minutes / 525960);
  }*/
  {
    return date("Y-m-d H:i", $from_time);
  }

  return strtr($string, $parameters);
}

function no_contact_data(){
  ?>
  <div class="info">
  Танилуудтай холбоотой ямар нэгэн мэдээлэл олдсонгүй. Таньд танилын хүрээгээ тэлэхийн тулд дараах зүйлсийг санал болгож байна;<br/>
  - <a href="/search/profile">Бүртгэлтэй гишүүдтэй танилцаж болно</a><br/>
  - <a href="/search/simple">Бүртгэлтэй гишүүдээс хайж танилцаж болно</a><br/>
  - <a href="/search/super">Бүртгэлтэй гишүүдээс хялбар хайлт хийж танилцаж болно</a><br/>
  - <a href="/invitation">Бүртгэлгүй танилуудаа BizNetwork-д урьж болно</a><br/>
  - <a href="/suggestion/list">Таниж магадгүй гишүүдээс танилаа олно уу</a><br/>
  </div>  
  <?php
}

function js_collect($js, $head = false)
{
  $name = ($head ? 'js_head' : 'js_foot');
  if (has_slot($name)) $content = get_slot($name); else $content = '';
  slot($name);
  echo $content."\n".$js;
  end_slot();
}


function submit_image_tag($source, $options = array())
{
  if (!isset($options['alt']))
  {
    $path_pos = strrpos($source, '/');
    $dot_pos = strrpos($source, '.');
    $begin = $path_pos ? $path_pos + 1 : 0;
    $nb_str = ($dot_pos ? $dot_pos : strlen($source)) - $begin;
    $options['alt'] = ucfirst(substr($source, $begin, $nb_str));
  }

  return tag('input', array_merge(array('type' => 'image', 'name' => 'commit', 'src' => image_path($source)), _convert_options_to_javascript(_convert_options($options))));
}

?>