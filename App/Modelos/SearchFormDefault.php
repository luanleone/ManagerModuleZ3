<?php

namespace App\Modelos;

class SearchFormDefault {
    
    static function add($param){

        $lowerParam = strtolower($param);

        $content = "<?php\n";
        $content .= "namespace {$param}\Form;\n";
        $content .= "\n";
        $content .= "use Laminas\Form\Form;\n";
        $content .= "\n";
        $content .= "class {$param}SearchForm extends Form\n";
        $content .= "{\n";
        $content .= "    public function __construct(\$name = null)\n";
        $content .= "    {\n";
        $content .= "        /* Exemple search form\n";
        $content .= "        parent::__construct('{$lowerParam}');\n";
        $content .= "        \$this->setAttribute('method', 'post');\n";
        $content .= "\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name' => 'id',\n";
        $content .= "            'type' => 'Hidden',\n";
        $content .= "        ));\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name'          => 'fname',\n";
        $content .= "            'type'          => 'Text',\n";
        $content .= "            'attributes'    => array(\n";
        $content .= "                'class' => 'form-control',\n";
        $content .= "                'size'  => 30,\n";
        $content .= "                'id'    => 'fname'\n";
        $content .= "            ),\n";
        $content .= "        ));\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name'          => 'lname',\n";
        $content .= "            'type'          => 'Text',\n";
        $content .= "            'attributes'    => array(\n";
        $content .= "                'class' => 'form-control',\n";
        $content .= "                'size'  => 30,\n";
        $content .= "                'id'    => 'lname'\n";
        $content .= "            ),\n";
        $content .= "        ));\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name' => 'fechaInicioI',\n";
        $content .= "            'type' => 'Date',\n";
        $content .= "            'attributes' => array(\n";
        $content .= "                'class'         => 'form-control',\n";
        $content .= "                'id'            => 'fechaInicioI',\n";
        $content .= "                'placeholder'   => 'Fecha Inicio',\n";
        $content .= "            ),\n";
        $content .= "        ));\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name' => 'fechaFinI',\n";
        $content .= "            'type' => 'Date',\n";
        $content .= "            'attributes' => array(\n";
        $content .= "                'class'         => 'form-control',\n";
        $content .= "                'id'            => 'fechaFinI',\n";
        $content .= "                'placeholder'   => 'Fecha Fin',\n";
        $content .= "            ),\n";
        $content .= "        ));\n";
        $content .= "        \$this->add(array(\n";
        $content .= "            'name'          => 'residente_status',\n";
        $content .= "            'type'          => 'Select',\n";
        $content .= "            'attributes'    => array(\n";
        $content .= "                'id'    => 'residente_status',\n";
        $content .= "                'class' => 'form-control',\n";
        $content .= "            ),\n";
        $content .= "            'options' => array(\n";
        $content .= "                'value_options' => array(\n";
        $content .= "                        '0' => 'Inactivos',\n";
        $content .= "                        '1' => 'Activos',\n";
        $content .= "                        '2' => 'Todos Residentes',\n";
        $content .= "                ),\n";
        $content .= "            ),\n";
        $content .= "        ));\n";
        $content .= "        \$this->add([\n";
        $content .= "            'name' => 'submit',\n";
        $content .= "            'type' => 'submit',\n";
        $content .= "            'attributes' => [\n";
        $content .= "                'value' => 'Buscar',\n";
        $content .= "                'id'    => 'submitbutton',\n";
        $content .= "                'data-toggle' => 'modal',\n";
        $content .= "                'data-target' => '#modal',\n";
        $content .= "            ],\n";
        $content .= "        ]);\n";
        $content .= "       */\n";
        $content .= "    }\n";
        $content .= "}\n";
    
        return $content;
    }
}