<?php 

namespace App\Modelos;

class LayoutDefault{
    
    static function add($param){

        $content = "<?php\n";
        $content .= "/**\n";
        $content .= " * interface/modules/zend_modules/module/{$param}/view/layout/layout.phtml\n";
        $content .= " *\n";
        $content .= " * @package   OpenEMR\n";
        $content .= " * @link      https://www.open-emr.org\n";
        $content .= " * @author    Bindia Nandakumar <bindia@zhservices.com>\n";
        $content .= " * @copyright Copyright (c) 2014 Z&H Consultancy Services Private Limited <sam@zhservices.com>\n";
        $content .= " * @license   https://github.com/openemr/openemr/blob/master/LICENSE GNU General Public License 3\n";
        $content .= " */\n";
        $content .= "\n";
        $content .= "echo \$this->doctype(); ?>\n";
        $content .= "\n";
        $content .= "<html lang=\"en\">\n";
        $content .= "    <head>\n";
        $content .= "        <meta charset=\"utf-8\">\n";
        $content .= "        <?php echo \$this->headTitle(\$this->translate()->xl('{$param}'))->setSeparator(' - ')->setAutoEscape(false) ?>\n";
        $content .= "\n";
        $content .= "        <?php echo \$this->headMeta()->appendName('viewport', 'width=device-width, initial-scale=1.0') ?>\n";
        $content .= "\n";
        $content .= "        <!-- styles -->\n";
        $content .= "        <?php echo \$this->headLink(array('rel' => 'shortcut icon', 'type' => 'image/vnd.microsoft.icon', 'href' => \$this->basePath() . '/img/favicon.ico'))\n";
        $content .= "        ->prependStylesheet(\$this->basePath() . '/css/responsive-tables.css')\n";
        $content .= "        ->prependStylesheet(\$this->basePath() . '/css/loading.css')\n";
        $content .= "        ->prependStylesheet(\$this->basePath() . '../../../../../public/themes/style_cobalt_blue.css')\n";
        $content .= "                ?>\n";
        $content .= "        <!-- Scripts -->\n";
        $content .= "        <?php echo \$this->headScript()\n";
        $content .= "        ->prependFile(\$this->basePath() . '/js/application/common.js')\n";
        $content .= "        ->prependFile(\$this->basePath() . '/js/lib/jquery-ui.js')\n";
        $content .= "        ->prependFile(\$this->basePath() . '/js/lib/jquery-1.10.2.min.js')\n";
        $content .= "        ->prependFile(\$this->basePath() . '/js/lib/modernizr-2.6.2.min.js')\n";
        $content .= "        ->prependFile(\$this->basePath() . '/js/scripts/jquery-2.2.1.min.js')\n";
        $content .= "        ?>\n";
        $content .= "\n";
        $content .= "    </head>\n";
        $content .= "    <body class=\"body_top\">\n";
        $content .= "        <div class=\"container-fluid\" style=\"width:100%\">\n";
        $content .= "            <?php echo \$this->javascriptGlobals(); ?>\n";
        $content .= "            <?php echo \$this->content; ?>\n";
        $content .= "        </div>\n";
        $content .= "        <?php echo \$this->inlineScript() ?>\n";
        $content .= "    </body>\n";
        $content .= "</html>\n";

        return $content;
    }
}