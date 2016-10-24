<?php
/**
 * Created by PhpStorm.
 * User: nhan
 * Date: 10/12/16
 * Time: 8:10 PM
 */

/**
 * mapping array key value
 */
function mapping_menu_key($key)
{
    $class = array(
        0 => t('fa-home'),
        1 => t('fa-plane'),
        2 => t('fa-star'),
        3 => t('fa-flag'),
        4 => t('fa-bell'),
        5 => t('fa-heart'),
        6 => t('fa-user'),
        7 => t('fa-user')
    );
    return $class[$key];
}

/**
 * Get menu angiaphat
 */
function getMenu()
{
    $output = '';
    $output .= '<ul class="sf-menu sf-js-enabled sf-arrows">';
    $menu = menu_load_links('main-menu');

    foreach ($menu as $key => $item) {
        $class = '';
        if ($_GET['q'] == $item['link_path']) {
            $class = 'current';
        }
        if (drupal_is_front_page() && $item['link_path'] == '<front>') {
            $class = 'current';
        }
        if ($item['plid'] <= 0) {
            $classA = '';
            $narrow = '';
            if(getChildMenu($item['mlid'])){
                $classA = 'sf-with-ul';
                $narrow = '<strong></strong>';
            }
            $output .= '<li class="' . $class . '"><a class="'.$classA.'" href="' . url($item["link_path"]) . '">';
            $output .= '<span class="fa ' . mapping_menu_key($key) . '"></span>'.$narrow . $item["link_title"] . '</a>';
            $output .= getChildMenu($item['mlid']);
            $output .= '</li>';
        }
    }
    $output .= '</ul>';
    return $output;
}

/**
 * get child menu
 */
function getChildMenu($plid)
{
    $select = db_select('menu_links','m');
    $select->fields('m');
    $select->condition('hidden',0);
    $select->condition('plid',$plid);
    $select->orderBy('weight','ASC');
    $result = $select->execute()->fetchAllAssoc('mlid');

    if($result){
        $output = '';
        $output .='<ul class="sub-menu" style="display: none;">';
        foreach($result as $item){
            $class = '';
            if ($_GET['q'] == $item->link_path) {
                $class = 'active';
            }
          $output .='<li class="'.$class.'"><a href="'.url($item->link_path).'">'.$item->link_title.'</a></li>';
        }
        $output .='</ul>';

        return $output;

    }else{
        return false;
    }
}

/**
 * get background
 */
function getBackground(){
    $background = 'booking_block_page';
    if(drupal_is_front_page()){
        $background = 'booking_block';
    }
    if($_GET['q']=='ticket/checking'){
        $background = 'booking_block_ticket';
    }
    return $background;
}
