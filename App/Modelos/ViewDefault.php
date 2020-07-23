<?php 

namespace App\Modelos;

class ViewDefault{
    
    static function add($param, $page){

        $content = "<?php\n";
        $content .= "\n";
        $content .= "\$title = \$listener->z_xlt('{$param} {$page}');\n";
        $content .= "\n";
        $content .= "?>\n";
        $content .= "\n";
        $content .= "<div id=\"printtable p-4\">\n";
        $content .= "    <div class=\"se_in_16\">\n";
        $content .= "        <h3><?= \$this->escapeHtml(\$title) ?></h3>\n";
        $content .= "    </div>\n";
        $content .= "</div>\n";
        
        return $content;
    }
}