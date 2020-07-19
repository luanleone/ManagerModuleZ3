<?php 

namespace App\Modelos;

class AutoloadClassmapDefault{
    
    static function add(){

        $content = "<?php\n";
        $content .= "\n";
        $content .= "return array();\n";
    
        return $content;
    }
}

