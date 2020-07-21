<?php 

namespace App\Modelos;

class PathDefault{
    
    static function add($param){

        $content = "<?php\n";
        $content .= "\n";
        $content .= "return '{$param}';\n";

        return $content;
    }
}