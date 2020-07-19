<?php 

namespace App\Modelos;

class ModelDefault{
    
    static function add($param){

        $content = "<?php\n";
        $content .= "\n";
        $content .= "namespace {$param}\Model;\n";
        $content .= "use DomainException;\n";
        $content .= "use Laminas\Filter\StringTrim;\n";
        $content .= "use Laminas\Filter\StripTags;\n";
        $content .= "use Laminas\Filter\ToInt;\n";
        $content .= "use Laminas\InputFilter\InputFilter;\n";
        $content .= "use Laminas\InputFilter\InputFilterAwareInterface;\n";
        $content .= "use Laminas\InputFilter\InputFilterInterface;\n";
        $content .= "use Laminas\Validator\StringLength;\n";
        $content .= "\n";
        $content .= "class {$param} implements InputFilterAwareInterface\n";
        $content .= "{\n";
        $content .= "    \n";
        $content .= "}\n";
        
        return $content;
    }
}