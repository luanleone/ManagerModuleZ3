<?php 

namespace App\Modelos;

class ViewDefault{
    
    static function add($param, $page){

        $content = "<div>\n";
        $content .= "    {$param} {$page}\n";
        $content .= "</div>\n";
        
        return $content;
    }
}