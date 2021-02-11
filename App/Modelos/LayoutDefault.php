<?php 

namespace App\Modelos;

class LayoutDefault{
    
    static function add($param){

        $lowerParam = strtolower($param);
        $content = "<?php\n";
        $content .= "use OpenEMR\Core\Header;\n";
        $content .= "?>\n";
        $content .= "\n";
        $content .= "<html lang=\"en\">\n";
        $content .= "    <head>\n";
        $content .= "        <meta charset=\"utf-8\">\n";
        $content .= "        <?php echo \$this->headTitle(\$this->translate()->xl('{$param}'))->setSeparator(' - ')->setAutoEscape(false);\n";
        $content .= "\n";
        $content .= "        Header::setupHeader([]);\n";
        $content .= "\n";
        $content .= "        echo \$this->headLink(array('rel' => 'shortcut icon', 'type' => 'image/vnd.microsoft.icon', 'href' => \$this->basePath() . '/img/favicon.ico'))\n";
        $content .= "           ->prependStylesheet(\$this->basePath() . '/css/{$lowerParam}_style.css?v='.\$GLOBALS['v_js_includes']);\n";
        $content .= "        echo \$this->headScript()\n";
        $content .= "           ->prependFile(\$this->basePath() . '/js/{$lowerParam}/{$lowerParam}.js?v='.\$GLOBALS['v_js_includes'])\n";
        $content .= "           ->prependFile(\$this->basePath() . '/js/application/common.js?v='.\$GLOBALS['v_js_includes']);\n";
        $content .= "        ?>\n";
        $content .= "\n";
        $content .= "    </head>\n";
        $content .= "    <body class=\"body_top\">\n";
        $content .= "        <div class=\"container-fluid w-100\">\n";
        $content .= "            <?php echo \$this->javascriptGlobals(); ?>\n";
        $content .= "            <div class=\"row\">\n";
        $content .= "                <div class=\"col col-menu\">\n";
        $content .= "                    <iframe class=\"border\" src=\"<?=\$this->url('Cabecera', array('action' => $GLOBALS['menu'], 'id' => $GLOBALS['menuId']));?>\"\n";
        $content .= "                            frameborder=\"0\" style=\"width:100%; height:100%;\"></iframe>\n";
        $content .= "                </div>\n";
        $content .= "                <div class=\"col col-content\">\n";
        $content .= "                    <?php echo \$this->content; ?>\n";
        $content .= "                </div>\n";
        $content .= "            </div>\n";
        $content .= "        </div>\n";
        $content .= "    </body>\n";
        $content .= "</html>\n";

        return $content;
    }
}
