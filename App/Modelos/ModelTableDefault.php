<?php 

namespace App\Modelos;

class ModelTableDefault{
    
    static function add($param){

        $lowerParam = strtolower($param);

        $content = "<?php\n";
        $content .= "\n";
        $content .= "namespace {$param}\Model;\n";
        $content .= "use Laminas\Db\ResultSet\ResultSet;\n";
        $content .= "use laminas\Db\TableGateway\TableGateway;\n";
        $content .= "use Laminas\Db\TableGateway\AbstractTableGateway;\n";
        $content .= "use \Application\Model\ApplicationTable;\n";
        $content .= "\n";
        $content .= "class {$param}Table extends AbstractTableGateway\n";
        $content .= "{\n";
        $content .= "    protected \$tableGateway;\n";
        $content .= "    protected \$adapter;\n";
        $content .= "    protected \$resultSetPrototype;\n";
        $content .= "    protected \$applicationTable;\n";
        $content .= "    protected \${$param}Table;\n";
        $content .= "    \n";
        $content .= "    public function __construct(TableGateway \$tableGateway) \n";
        $content .= "    {\n";
        $content .= "        \$adapter                    =   \Laminas\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();\n";
        $content .= "        \$this->tableGateway         =   \$tableGateway;\n";
        $content .= "        \$this->adapter              =   \$adapter;\n";
        $content .= "        \$this->resultSetPrototype   =   new ResultSet();\n";
        $content .= "        \$this->applicationTable     =   new ApplicationTable;\n";
        $content .= "        \$this->{$param}Table         =   new TableGateway('{$param}', \$adapter);\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "\n";
        $content .= "    public function searchList(\$params)\n";
        $content .= "    {\n";
        $content .= "        /* Exemple query view \n";
        $content .= "        \$query = \"  SELECT\n";
        $content .= "                        pid,\n";
        $content .= "                        dt,\n";
        $content .= "                        fname,\n";
        $content .= "                        lname,\n";
        $content .= "                        deceased_date,\n";
        $content .= "                        falta,\n";
        $content .= "                        fbaja \n";
        $content .= "                    from vw_{$lowerParam} WHERE fname IS NOT NULL \";\n";
        $content .= "\n";
        $content .= "        if(\$params['fname'] != null && \$params['lname'] != null){\n";
        $content .= "            \$query .= \" AND ( fname LIKE '%{\$params['fname']}%' AND lname LIKE '%{\$params['lname']}%' ) \";\n";
        $content .= "        } else {\n";
        $content .= "            if(\$params['fname'] != null ){\n";
        $content .= "                \$query .= \" AND fname LIKE '%\" .\$params['fname']. \"%'\";\n";
        $content .= "            }\n";
        $content .= "            if(\$params['lname'] != null ){\n";
        $content .= "                \$query .= \" AND lname LIKE '%\" .\$params['lname']. \"%'\";\n";
        $content .= "            }\n";
        $content .= "        }\n";
        $content .= "    \n";
        $content .= "        if(\$params['fechaInicioI'] != null && \$params['fechaFinI'] != null ){\n";
        $content .= "            \$query .= \" AND dt BETWEEN {\$params['fechaInicioI']} AND {\$params['fechaFinI']} \";\n";
        $content .= "        }else{\n";
        $content .= "            if(\$params['fechaInicioI'] != null){\n";
        $content .= "                \$query .= \" AND dt >= {\$params['fechaInicioI']} \";\n";
        $content .= "            }\n";
        $content .= "            if(\$params['fechaFinI'] != null){\n";
        $content .= "                \$query .= \" AND dt <= {\$params['fechaFinI']} \";\n";
        $content .= "            }\n";
        $content .= "        }\n";
        $content .= "        if(\$params['residente_status'] == 0){\n";
        $content .= "            \$query .= \" AND deceased_date IS NOT NULL \";\n";
        $content .= "        }\n";
        $content .= "        if(\$params['residente_status'] == 1){\n";
        $content .= "            \$query .= \" AND deceased_date IS NULL \";\n";
        $content .= "        }\n";
        $content .= "        \n";
        $content .= "        \$query .= \" ORDER BY fname ASC, lname ASC, falta DESC; \";\n";
        $content .= "        \$result = \$this->applicationTable->zQuery(\$query);\n";
        $content .= "        return \$result;\n";
        $content .= "        */\n";
        $content .= "    }\n";
        $content .= "\n";
        $content .= "}\n";
    
        return $content;
    }
}