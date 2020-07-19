<?php 

namespace App\Modelos;

class ModuleDefault{
    
    static function add($param){

        $content = "<?php\n";
        $content .= "\n";

        $content .= "namespace {$param};\n";
        $content .= "\n";
        $content .= "use Laminas\Db\Adapter\AdapterInterface;\n";
        $content .= "use Laminas\Db\ResultSet\ResultSet;\n";
        $content .= "use Laminas\Db\TableGateway\TableGateway;\n";
        $content .= "use Laminas\ModuleManager\Feature\ConfigProviderInterface;\n";
        $content .= "use Laminas\ModuleManager\Feature\AutoloaderProviderInterface;\n";
        $content .= "use Laminas\ModuleManager\ModuleManager;\n";
        $content .= "class Module implements AutoloaderProviderInterface, ConfigProviderInterface\n";
        $content .= "{\n";
        $content .= "    public function getAutoloaderConfig()\n";
        $content .= "    {\n";
        $content .= "        return array(\n";
        $content .= "            'Laminas\Loader\ClassMapAutoloader' => array(\n";
        $content .= "                __DIR__ . '/autoload_classmap.php',\n";
        $content .= "            ),\n";
        $content .= "            'Laminas\Loader\StandardAutoloader' => array(\n";
        $content .= "                'namespaces' => array(\n";
        $content .= "                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,\n";
        $content .= "                ),\n";
        $content .= "            ),\n";
        $content .= "        );\n";
        $content .= "    }\n";
        $content .= "    public function getConfig()\n";
        $content .= "    {\n";
        $content .= "        return include __DIR__ . '/config/module.config.php';\n";
        $content .= "    }\n";
        $content .= "    public function getServiceConfig()\n";
        $content .= "    {\n";
        $content .= "        return [\n";
        $content .= "            'factories' => [\n";
        $content .= "                Model\{$param}Table::class  => function(\$container) {\n";
        $content .= "                    \$tableGateway = \$container->get(Model\\{$param}TableGateway::class);\n";
        $content .= "                    return new Model\\{$param}Table(\$tableGateway);\n";
        $content .= "                },\n";
        $content .= "                Model\\{$param}TableGateway::class => function (\$container) {\n";
        $content .= "                    \$dbAdapter = \$container->get(AdapterInterface::class);\n";
        $content .= "                    \$resultSetPrototype = new ResultSet();\n";
        $content .= "                    \$resultSetPrototype->setArrayObjectPrototype(new Model\\{$param}());\n";
        $content .= "                    return new TableGateway('{$param}', \$dbAdapter, null, \$resultSetPrototype);\n";
        $content .= "                },\n";
        $content .= "            ],\n";
        $content .= "        ];\n";
        $content .= "    }\n";
        $content .= "    public function init(ModuleManager \$moduleManager)\n";
        $content .= "    {\n";
        $content .= "        // TODO: it needs to be documented why we want to inject the current_controller and current_action here..\n";
        $content .= "        \$sharedEvents = \$moduleManager->getEventManager()->getSharedManager();\n";
        $content .= "        \$sharedEvents->attach(__NAMESPACE__, 'dispatch', function (\$e) {\n";
        $content .= "            \$controller = \$e->getTarget();\n";
        $content .= "            \$controller->layout('{$param}/layout/layout');\n";
        $content .= "                \$route = \$controller->getEvent()->getRouteMatch();\n";
        $content .= "                \$controller->getEvent()->getViewModel()->setVariables(array(\n";
        $content .= "                    'current_controller' => \$route->getParam('controller'),\n";
        $content .= "                    'current_action' => \$route->getParam('action'),\n";
        $content .= "                ));\n";
        $content .= "        }, 100);\n";
        $content .= "    }\n";
        $content .= "}\n";
    
        return $content;
    }
}