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
use App\Modelos\PathDefault;
use App\Modelos\SearchFormDefault;
use App\Modelos\SearchViewDefault;

require 'functions.php';

if ($argc < 2) {
    echo "\033[31mO comando deve ser passado.\n\033[0m";
    exit(1);
}

$metodo = explode(":", strtolower($argv[1]));
if(count($metodo) != 2){
    echo "\033[31mO método deve ser informado.\n\033[0m";
    echo "\033[33mExemplo: \033[34mphp vendor/bin/fxt module:\033[31mcreate \033[32m[caminho]\n\033[0m";
    exit(1);
}

if($metodo[0] == 'module'){

    if ($argc < 3) {
        echo "\033[31mO nome do módulo deve ser passado.\n\033[0m";
        exit(1);
    }

    $vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
    $baseDir = dirname($vendorDir);
    
    if($metodo[1] == 'path'){
        $path = $argv[2];
        
        if(substr($path, -1) != "/" ){
            $path .= "/";
        }

        if(is_dir($path)){
            echo "Salvando o caminho padrão...\n";
            $vendorDir = dirname(dirname(dirname(dirname(__FILE__))));
            $baseDir = dirname($vendorDir);
            if(file_exists($vendorDir.'path.php')){
                unlink('path.php');
            }
            $i = strpos($path, $baseDir);
            if( $i === FALSE){
                $path = $baseDir."/".$path;
            }
            $content = PathDefault::add($path);
            $file = fopen($vendorDir."/fxt-solutions/manager-module-z3/path.php","w");
            fwrite($file, $content);
            fclose($file);
            echo "Caminho salvo com sucesso!!\n\033[32m".$path."\n\033[0m";
            die();
        } else {
            echo "O path informado não é válido.\n";
            exit(1);
        }
    }

    if(!file_exists($vendorDir."/fxt-solutions/manager-module-z3/path.php")){
        echo "\033[33mFavor informar o diretório onde serão salvos os módulos.\n\033[0m";
        echo "\033[33mComando: \033[34mphp vendor/bin/fxt module:path \033[32m[caminho]\n\033[0m";
        exit (1);
    } else {
        $path = include "{$vendorDir}/fxt-solutions/manager-module-z3/path.php";
    }

    if($metodo[1] == 'create'){
        $name = ucfirst($argv[2]);
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
            $file = fopen($diretorios['layoutDir']."layout.phtml","w");
            fwrite($file, $content);
            fclose($file);
    
            $content = SearchViewDefault::add($name);
            $file = fopen($diretorios['viewDir']."search.phtml","w");
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
            $file = fopen($diretorios['moduleDir']."Module.php","w");
            fwrite($file, $content);
            fclose($file);
    
    
            echo "Módulo ". $name ." criado com sucesso!\n";
        } else {
            echo "Módulo ". $name ." já existe\n";
        }

    } 
    
    if($metodo[1] == 'delete'){
        $name = ucfirst($argv[2]);
        if(is_dir($path.$name)){
            echo "Excluindo o módulo ". $name ."...\n";
            recurseRmdir($path.$name);
            echo "Módulo ". $name ." excluído com sucesso!\n";
        } else {
            echo "Módulo ". $name ." não encontrado\n";
        }
        
    }
} else {
    echo "\033[31mComando não encontrado.\n\033[0m";
}
