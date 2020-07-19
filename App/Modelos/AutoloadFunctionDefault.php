<?php 

namespace App\Modelos;

class AutoloadFunctionDefault{
    
    static function add(){

        $content = "<?php\n";
        $content .= "\n";
    
        $content .= "return function (\$class) {\n";
        $content .= "    static \$map;\n";
        $content .= "    if (!\$map) {\n";
        $content .= "        \$map = include __DIR__ . '/autoload_classmap.php';\n";
        $content .= "    }\n";
        $content .= "    if (!isset(\$map[\$class])) {\n";
        $content .= "        return false;\n";
        $content .= "    }\n";
        $content .= "    return include \$map[\$class];\n";
        $content .= "};\n";

        return $content;
    }
}



