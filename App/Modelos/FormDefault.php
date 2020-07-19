<?php 

namespace App\Modelos;

class FormDefault{
    
    static function add($param){

        $content = "<?php\n";
        $content .= "namespace {$param}\Form;\n";
        $content .= "\n";
        $content .= "use Laminas\Form\Form;\n";
        $content .= "\n";
        $content .= "class {$param}Form extends Form\n";
        $content .= "{\n";
        $content .= "    public function __construct(\$name = null)\n";
        $content .= "    {\n";
        $content .= "        \n";
        $content .= "    }\n";
        $content .= "}\n";
    
        return $content;
    }
}