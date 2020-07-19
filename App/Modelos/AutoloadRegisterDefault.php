<?php 

namespace App\Modelos;

class AutoloadRegisterDefault{
    
    static function add(){

        $content = "<?php\n";
        $content .= "\n";
        $content .= "spl_autoload_register(include __DIR__ . '/autoload_function.php');\n";
    
        return $content;
    }
}