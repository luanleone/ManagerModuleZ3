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
        $content .= "    public \$id;\n";
        $content .= "    public \$artist;\n";
        $content .= "    public \$title;\n";
        $content .= "    protected \$inputFilter;\n";
        $content .= "\n";
        $content .= "    public function exchangeArray(\$data)\n";
        $content .= "    {\n";
        $content .= "        \$this->id     = (isset(\$data['id']))     ? \$data['id']     : null;\n";
        $content .= "        \$this->artist = (isset(\$data['artist'])) ? \$data['artist'] : null;\n";
        $content .= "        \$this->title  = (isset(\$data['title']))  ? \$data['title']  : null;\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    // Add content to these methods:\n";
        $content .= "    public function setInputFilter(InputFilterInterface \$inputFilter)\n";
        $content .= "    {\n";
        $content .= "        throw new \Exception(\"Not used\");\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    public function getInputFilter()\n";
        $content .= "    {\n";
        $content .= "        if (!\$this->inputFilter) {\n";
        $content .= "            \$inputFilter = new InputFilter();\n";
        $content .= "\n";
        $content .= "            \$inputFilter->add(array(\n";
        $content .= "                'name'     => 'id',\n";
        $content .= "                'required' => true,\n";
        $content .= "                'filters'  => array(\n";
        $content .= "                    array('name' => 'Int'),\n";
        $content .= "                ),\n";
        $content .= "            ));\n";
        $content .= "\n";
        $content .= "            \$inputFilter->add(array(\n";
        $content .= "                'name'     => 'artist',\n";
        $content .= "                'required' => true,\n";
        $content .= "                'filters'  => array(\n";
        $content .= "                    array('name' => 'StripTags'),\n";
        $content .= "                    array('name' => 'StringTrim'),\n";
        $content .= "                ),\n";
        $content .= "                'validators' => array(\n";
        $content .= "                    array(\n";
        $content .= "                        'name'    => 'StringLength',\n";
        $content .= "                        'options' => array(\n";
        $content .= "                            'encoding' => 'UTF-8',\n";
        $content .= "                            'min'      => 1,\n";
        $content .= "                            'max'      => 100,\n";
        $content .= "                        ),\n";
        $content .= "                    ),\n";
        $content .= "                ),\n";
        $content .= "            ));\n";
        $content .= "\n";
        $content .= "            \$inputFilter->add(array(\n";
        $content .= "                'name'     => 'title',\n";
        $content .= "                'required' => true,\n";
        $content .= "                'filters'  => array(\n";
        $content .= "                    array('name' => 'StripTags'),\n";
        $content .= "                    array('name' => 'StringTrim'),\n";
        $content .= "                ),\n";
        $content .= "                'validators' => array(\n";
        $content .= "                    array(\n";
        $content .= "                        'name'    => 'StringLength',\n";
        $content .= "                        'options' => array(\n";
        $content .= "                            'encoding' => 'UTF-8',\n";
        $content .= "                            'min'      => 1,\n";
        $content .= "                            'max'      => 100,\n";
        $content .= "                        ),\n";
        $content .= "                    ),\n";
        $content .= "                ),\n";
        $content .= "            ));\n";
        $content .= "\n";
        $content .= "            \$this->inputFilter = \$inputFilter;\n";
        $content .= "        }\n";
        $content .= "\n";
        $content .= "        return \$this->inputFilter;\n";
        $content .= "    }\n";
        $content .= "}\n";
    
        return $content;
    }
}