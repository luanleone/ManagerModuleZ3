<?php

namespace App;

use App\Modelos\AutoloadClassmapDefault;
use App\Modelos\AutoloadFunctionDefault;
use App\Modelos\AutoloadRegisterDefault;
use App\Modelos\ConfigDefault;
use App\Modelos\ControllerDefault;
use App\Modelos\FormDefault;
use App\Modelos\LayoutDefault;
use App\Modelos\ModelDefault;
use App\Modelos\ModelTableDefault;
use App\Modelos\ModuleDefault;
use App\Modelos\SearchFormDefault;
use App\Modelos\SearchViewDefault;

require 'functions.php';

if ($argc < 2) {
  echo "O nome comando de execução deve ser passado.\n";
  exit(1);
}
if ($argc < 3) {
    echo "O nome do módulo deve ser passado.\n";
    exit(1);
}
$metodo = $argv[1];
$name = ucfirst($argv[2]);
$path = 'Modulos/';

if($argv[1] == 'create'){

    if(!is_dir($path.$name)){
        echo "Criando o módulo ".$name."...\n";

        // Criando diretórios
        $diretorios = [
            'moduleDir'      => $path.$name."/",
            'configDir'      => $path.$name."/config/",
            'controllerDir'  => $path.$name."/src/".$name."/Controller/",
            'formDir'        => $path.$name."/src/".$name."/Form/",
            'modelDir'       => $path.$name."/src/".$name."/Model/",
            'layoutDir'      => $path.$name."/view/layout/",
            'viewDir'        => $path.$name."/view/".strtolower($name)."/".strtolower($name)."/",
        ];

        foreach($diretorios as $diretorio){
            mkdir($diretorio, 0777, true);
        }

        // Criando arquivos
        $content = ConfigDefault::add($name);
        $file = fopen($diretorios['configDir']."module.config.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = ControllerDefault::add($name);
        $file = fopen($diretorios['controllerDir'].$name."Controller.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = FormDefault::add($name);
        $file = fopen($diretorios['formDir'].$name."Form.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = SearchFormDefault::add($name);
        $file = fopen($diretorios['formDir'].$name."SearchForm.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = ModelDefault::add($name);
        $file = fopen($diretorios['modelDir'].$name.".php","w");
        fwrite($file, $content);
        fclose($file);

        $content = ModelTableDefault::add($name);
        $file = fopen($diretorios['modelDir'].$name."Table.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = LayoutDefault::add($name);
        $file = fopen($diretorios['layoutDir']."layout.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = SearchViewDefault::add($name);
        $file = fopen($diretorios['viewDir']."search.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = AutoloadClassmapDefault::add();
        $file = fopen($diretorios['moduleDir']."autoload_classmap.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = AutoloadFunctionDefault::add();
        $file = fopen($diretorios['moduleDir']."autoload_function.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = AutoloadRegisterDefault::add();
        $file = fopen($diretorios['moduleDir']."autoload_register.php","w");
        fwrite($file, $content);
        fclose($file);

        $content = ModuleDefault::add($name);
        $file = fopen($diretorios['moduleDir']."module.php","w");
        fwrite($file, $content);
        fclose($file);


        echo "Módulo ". $name ." criado com sucesso!\n";
    } else {
        echo "Módulo ". $name ." já existe\n";
    }
}

if($argv[1] == 'delete'){
    
    if(is_dir($path.$name)){
        echo "Excluindo o módulo ". $name ."...\n";
        recurseRmdir($path.$name);
        echo "Módulo ". $name ." excluído com sucesso!\n";
    } else {
        echo "Módulo ". $name ." não encontrado\n";
    }
    
}