<?php

function getBirthdateToString($date) {
  $strtime = strtotime($date);
  $month = date('n', $strtime);
  $day = date('j', $strtime);

  return $month.'-р сарын '.$day;
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

  /*if ($pager->getNbResults() > 0) {
    $navigation .= '<span class="total">Нийт '.$pager->getNbResults().'. Энэ хуудсанд '.$pager->getFirstIndice().'-'.$pager->getLastIndice().'.</span>';
  }*/
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




function blurBadWords($text) {
    // TODO: find magic
    $a = myTools::getArray('badWords');
    foreach ($a as $word) {
        $text = str_ireplace($word, '<span class="bluring">'.$word.'</span>', $text);
    }
    return $text;
}

function striptags($text)
{
    return nl2br(strip_tags($text, '<strong><b><i><em><u><sup><sub><ol><ul><li><a><img><embed><object>'));
}

function stripalltags($text)
{
    return nl2br(strip_tags(htmlspecialchars_decode($text)));
}

?>
