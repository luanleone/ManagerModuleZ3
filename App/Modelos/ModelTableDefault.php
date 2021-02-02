<?php 

namespace App\Modelos;

class ModelTableDefault{
    
    static function add($param){

        $lowerParam = strtolower($param);

        $content = "<?php\n";
        $content .= "\n";
        $content .= "namespace {$param}\Model;\n";
        $content .= "\n";
        $content .= "use RuntimeException;\n";
        $content .= "use Laminas\Db\TableGateway\AbstractTableGateway;\n";
        $content .= "use Laminas\Db\TableGateway\Feature\GlobalAdapterFeature;\n";
        $content .= "use laminas\Db\TableGateway\TableGateway;\n";
        $content .= "use Laminas\Db\Sql\Select;\n";
        $content .= "use Laminas\Db\Sql\Where;\n";
        $content .= "use Laminas\Db\Sql\Sql;\n";
        $content .= "use \Application\Model\ApplicationTable;\n";
        $content .= "\n";
        $content .= "class {$param}Table extends AbstractTableGateway\n";
        $content .= "{\n";
        $content .= "    protected \$applicationTable;\n";
        $content .= "    protected \$adapter;\n";
        $content .= "    protected \${$param}Table;\n";
        $content .= "    \n";
        $content .= "    public function __construct() \n";
        $content .= "    {\n";
        $content .= "        \$this->applicationTable     =   new ApplicationTable;\n";
        $content .= "        \$this->adapter              =   GlobalAdapterFeature::getStaticAdapter();\n";
        $content .= "        \$this->{$param}Table        =   new TableGateway('table_name', \$this->adapter);  //set table name here \n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "\n";
        $content .= "    public function fetchAll()\n";
        $content .= "    {\n";
        $content .= "        return \$this->{$param}Table->select();\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    public function getch{$param}(\$id)\n";
        $content .= "    {\n";
        $content .= "        \$id  = (int) \$id;\n";
        $content .= "        \$rowset = \$this->{$param}Table->select(array('id' => \$id));\n";
        $content .= "        \$row = \$rowset->current();\n";
        $content .= "        if (!\$row) {\n";
        $content .= "            throw new \Exception(\"Could not find row \$id\");\n";
        $content .= "        }\n";
        $content .= "        return \$row;\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    public function save{$param}({$param} \${$lowerParam})\n";
        $content .= "    {\n";
        $content .= "        \$data = array(\n";
        $content .= "            'artist' => \$album->artist, // this set yours attributes\n";
        $content .= "            'title'  => \$album->title,  // this set yours attributes\n";
        $content .= "        );\n";
        $content .= "\n";
        $content .= "        \$id = (int) \$album->id;\n";
        $content .= "        if (\$id == 0) {\n";
        $content .= "            \$this->{$param}Table->insert(\$data);\n";
        $content .= "        } else {\n";
        $content .= "            if (\$this->getAlbum(\$id)) {\n";
        $content .= "                \$this->{$param}Table->update(\$data, array('id' => \$id));\n";
        $content .= "            } else {\n";
        $content .= "                throw new \Exception('Album id does not exist');\n";
        $content .= "            }\n";
        $content .= "        }\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "    public function delete{$param}(\$id)\n";
        $content .= "    {\n";
        $content .= "        \$this->{$param}Table->delete(array('id' => (int) \$id));\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "}\n";
    
        return $content;
    }
}
