<?php

class CNavigation {
    public static function GenerateMenu($items, $active_page = '') {

    $html = "<nav>\n";
        foreach($items as $key => $item) {
            $active_class = 'menu_inactive';
            if($key == $active_page) {
                $active_class = 'menu_active';
            }
            $html .= "<a class='{$active_class}' href='{$item['url']}'>{$item['text']}</a>\n";
        }
        $html .= "</nav>\n";
    return $html;
    }
};
