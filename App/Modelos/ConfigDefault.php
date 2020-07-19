<?php

namespace App\Modelos;

class ConfigDefault {

    static function add($param){
        $content = "<?php\n";
        $content .= "namespace {$param};\n";
        $content .= "use Laminas\Router\Http\Segment;\n";
        $content .= "use Interop\Container\ContainerInterface;\n";
        $content .= "use Laminas\Db\TableGateway\TableGateway;\n";
        $content .= "use Laminas\Db\ResultSet\ResultSet;\n";
        $content .= "use {$param}\Controller\\{$param}Controller;\n";
        $content .= "use {$param}\Model\\{$param}Table;\n";
        $content .= "use {$param}\Model\\{$param};\n";
        $content .= "\n";
        $content .= "return array(\n";
        $content .= "    'controllers' => array(\n";
        $content .= "        'factories' => array(\n";
        $content .= "            {$param}\Controller\\{$param}Controller::class => function (ContainerInterface \$container, \$requestedName) {\n";
        $content .= "                return new {$param}Controller(\$container->get({$param}Table::class));\n";
        $content .= "            }\n";
        $content .= "        ),\n";
        $content .= "        'invokables' => array(\n";
        $content .= "            '{$param}\Controller\\{$param}' => '{$param}\Controller\\{$param}Controller'\n";
        $content .= "        )\n";
        $content .= "    ),\n";
        $content .= "\n";
        $content .= "    'router' => array(\n";
        $content .= "        'routes' => array(\n";
        $content .= "            '{$param}' => array(\n";
        $content .= "                'type'    => Segment::class,\n";
        $content .= "                'options' => array(\n";
        $content .= "                    'route' => '/{$param}[/:action][/:id]',\n";
        $content .= "                    'constraints' => array(\n";
        $content .= "                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',\n";
        $content .= "                        'id'     => '[0-9]+',\n";
        $content .= "                    ),\n";
        $content .= "                    'defaults' => array (\n";
        $content .= "                        'controller' => {$param}\Controller\\{$param}Controller::Class,\n";
        $content .= "                        'action'     => 'index',\n";
        $content .= "                    ),\n";
        $content .= "                ),\n";
        $content .= "                'may_terminate' => true,\n";
        $content .= "                'child_routes' => array(\n";
        $content .= "                    'default' => array(\n";
        $content .= "                        'type'    => 'Segment',\n";
        $content .= "                        'options' => array(\n";
        $content .= "                            'route'    => '/[:controller[/:action]]',\n";
        $content .= "                            'constraints' => array(\n";
        $content .= "                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',\n";
        $content .= "                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',\n";
        $content .= "                            ),\n";
        $content .= "                            'defaults' => array(),\n";
        $content .= "                        ),\n";
        $content .= "                    ),\n";
        $content .= "                ),\n";
        $content .= "            ),\n";
        $content .= "        ),\n";
        $content .= "    ),\n";
        $content .= "    \n";
        $content .= "    'view_manager' => array(\n";
        $content .= "        'template_path_stack' => array(\n";
        $content .= "            '{$param}' => __DIR__ . '/../view/',\n";
        $content .= "        ),\n";
        $content .= "        'template_map' => array(\n";
        $content .= "            '{$param}/layout/layout' => __DIR__ . '/../view/layout/layout.phtml',\n";
        $content .= "        ),\n";
        $content .= "    ),\n";
        $content .= "\n";
        $content .= "    'service_manager' => array(\n";
        $content .= "        'factories' => array(\n";
        $content .= "            \\{$param}\Model\\{$param}Table::class => function (ContainerInterface \$container, \$requestedName) {\n";
        $content .= "                \$dbAdapter = \$container->get('Laminas\Db\Adapter\Adapter');\n";
        $content .= "                \$resultSetPrototype = new ResultSet();\n";
        $content .= "                \$tableGateway = new TableGateway('module_menu', \$dbAdapter, null, \$resultSetPrototype);\n";
        $content .= "                \$table = new {$param}Table(\$tableGateway);\n";
        $content .= "                return \$table;\n";
        $content .= "            }\n";
        $content .= "        ),\n";
        $content .= "    ),\n";
        $content .= ");\n";
    
        return $content;
    }
}

