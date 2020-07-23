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
        $content .= "use Application\Listener\Listener;\n";
        $content .= "use {$param}\Model\\{$param};\n";
        $content .= "use {$param}\Form\\{$param}Form;\n";
        $content .= "use {$param}\Form\\{$param}SearchForm;\n";
        $content .= "use {$param}\Model\\{$param}Table;\n";
        $content .= "\n";
        $content .= "class {$param}Controller extends AbstractActionController\n";
        $content .= "{\n";
        $content .= "  protected \${$param}Table; \n";
        $content .= "  protected \$listenerObject;\n";
        $content .= "  protected \$date_format;\n";
        $content .= "\n";
        $content .= "  public function __construct( {$param}Table \$table){\n";
        $content .= "    \$this->{$param}Table = \$table;\n";
        $content .= "    \$this->listenerObject   = new Listener;\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function indexAction()\n";
        $content .= "  {\n";
        $content .= "    echo \"index\";\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function addAction()\n";
        $content .= "  {\n";
        $content .= "    echo \"add\";\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function editAction()\n";
        $content .= "  {\n";
        $content .= "    echo \"edit\";\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function deleteAction()\n";
        $content .= "  {\n";
        $content .= "    echo \"delete\";\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "  public function searchAction(){\n";
        $content .= "    \n";
        $content .= "    \$request = \$this->getRequest();\n";
        $content .= "    \$form = new {$param}SearchForm();\n";
        $content .= "\n";
        $content .= "    \$data = array(\n";
        $content .= "      'listenerObject'  => \$this->listenerObject,\n";
        $content .= "      'form'            => \$form,\n";
        $content .= "      'commonplugin'    => \$this->CommonPlugin(),\n";
        $content .= "    );\n";
        $content .= "\n";
        $content .= "    if(! \$request->isPost()){\n";
        $content .= "      \$data['isForm'] = 0;\n";
        $content .= "    } else {\n";
        $content .= "      \$data['isForm'] = 1;\n";
        $content .= "      \$form->setData(\$request->getPost());\n";
        $content .= "      \$form->isValid();\n";
        $content .= "      \${$lowerParam} = \$this->{$param}Table->searchList(\$form->getData());\n";
        $content .= "      \$data['{$lowerParam}'] = \${$lowerParam};\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    return new ViewModel(\$data);\n";
        $content .= "  }\n";
        $content .= "\n";
        $content .= "}\n";
    
        return $content;
    }
}