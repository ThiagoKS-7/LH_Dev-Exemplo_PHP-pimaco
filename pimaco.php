<?php 

require_once __DIR__ . "/vendor/autoload.php";

use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

$data = json_decode(file_get_contents('php://input'));
$cod = $data->codpimaco;
$pimaco = new Pimaco($cod);
foreach($data->lista as $value ){
    $tag = new Tag();
    $tag->setPadding(4);
    $tag->p($value->nome)->b()->setSize(4)->br();
    $tag->p('Rua: '. $value->rua)->setSize(4)->br();
    $tag->p('Telefone: ' . $value->telefone)->setSize(4)->br();
    $tag->setBorder(0.1);
    $pimaco->addTag($tag);
}

/*
for ($i = 1; $i <= 60; $i++) {
    $tag = new Tag();
    $tag->p("Etiqueta $i");
    $tag->setBorder(0.1);
    $pimaco->addTag($tag);
}
*/
$pimaco->output();
