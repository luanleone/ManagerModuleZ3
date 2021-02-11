<?php

namespace App\Modelos;

class ControllerDefault {

    static function add($param){
        $lowerParam = strtolower($param);
        $content = "<?php\n";
        $content .= "\n";
        $content .= "namespace {$param}\Controller;\n";
        $content .= "\n";
        $content .= "use Laminas\Mvc\Controller\AbstractActionController;\n";
        $content .= "use Laminas\View\Model\ViewModel;\n";
        $content .= "use {$param}\Model\\{$param};\n";
        $content .= "use {$param}\Model\\{$param}Table;\n";
        $content .= "use {$param}\Form\\{$param}Form;\n";
        $content .= "\n";
        $content .= "class {$param}Controller extends AbstractActionController\n";
        $content .= "{\n";
        $content .= "  protected \${$param}; \n";
        $content .= "  protected \${$param}Table; \n";
        $content .= "\n";
        $content .= "  public function __construct(){\n";
        $content .= "    \$this->{$param} = new {$param};\n";
        $content .= "    \$this->{$param}Table = new {$param}Table;\n";
        $content .= "    \$GLOBALS['menu'] = 'menu';\n";
        $content .= "    \$GLOBALS['menuId'] = 1;\n";        
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function indexAction()\n";
        $content .= "  {\n";
        $content .= "    \$data = [\n";
        $content .= "\n";
        $content .= "    ];\n";
        $content .= "\n";
        $content .= "    return \$data;\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "}\n";
    
        return $content;
    }
}
