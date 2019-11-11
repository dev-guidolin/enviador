<?php


$dir = "geral/";

$diretorios = array();

foreach (glob ($dir."*", GLOB_ONLYDIR) as $pastas) {
    if (is_dir ($pastas)) {
        $diretorios[]= $pastas;
    }
}

$x = array();
foreach ($diretorios as $pastas)
{
    $documentos = array();
    $abrirDir = opendir($pastas);
    while (false !== ($filename = readdir($abrirDir))) {
        $caminho = realpath($pastas);
        $arquivo = str_replace("\\","/",$caminho).'/'.$filename;

        if (is_file($arquivo)){
            $documentos[] =$arquivo;
        }
        continue;
    }
    $x[$pastas] = $documentos;
}

print_r($x);




