<?php

include "EditMe.php";

$config = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<!--
{{COPY}}
 -->
 <config>
    <modules>
        <{{PACKAGE}}_{{MODULE}}>
            <active>true</active>
            <codePool>{{CODEPOOL}}</codePool>
        <{{PACKAGE}}_{{MODULE}}>
    </modules>
</config> 
EOT;

$patterns = array(
    'CODEPOOL' => $codePool,
    'PACKAGE' => $packageName,
    'MODULE' => $moduleName,
    'COPY' => $header,
);

define('DS', DIRECTORY_SEPARATOR);
define('BP', dirname(__FILE__));

$dir = BP . DS . 'app/code' . DS . $codePool . DS . ($packageName) . DS . $moduleName . DS . 'etc' ;
$filename = $dir . DS . 'config.xml';

$folders = array(
    'etc', 'sql', 'Block/Adminhtml', 'Helper', 'Model', 'controllers/Adminhtml'
);

foreach ($folders as $folder) {
    $dir = $dir = BP . DS . 'app/code' . DS . $codePool . DS . ($packageName) . DS . $moduleName . DS . $folder;
    try {
        if (!is_dir ( $dir )) {
            if (mkdir($dir, 0755, true)) {
                echo "dir {$dir} created\n";
            } else {
                throw new Exception("mkdir {$dir} - oblom!");      
            }    
        }
    } catch (Exception $e) {
        die ($e->getMessage());
    }
}

$files = array (
    "etc/config.xml" => $config,
    
);

$dir = BP . DS . 'app/code' . DS . $codePool . DS . ($packageName) . DS . $moduleName;
foreach ($files as $file => $template) {
    try {
        $filename = $dir . DS . $file;
        $content = make_subst($template, $patterns);
        $content = make_subst($content, $patterns);
        if (file_put_contents($filename, $content)) {
            echo "file {$filename} written\n";
        } else {
            throw new Exception("{$filename} - oblom!");
        }
    } catch (Exception $e) {
        die ($e->getMessage());
    }
}
        
function make_subst ($data, $patterns) 
{
    foreach ($patterns as $key => $value) {
        $data = str_replace('{{'.$key.'}}', $value, $data);
    }
    return $data;
}
