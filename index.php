<?php
/*
 * Pega a URL Requisitada
 */
$url = $_SERVER['REQUEST_URI'];

/**
 * Pega pedaços da srtring
 * baseado no segundo e terceiro parametro
 * sendo que o segundo é o começo
 * e o terceiro até onde quero recuperar
 * o valor daquela string
 * O parametro 3 não é obrigatorio
 */
$url = substr($url, 1);

/**
 * Pega uma string e 
 * transforma num array
 * com base no primeiro parametro
 * Ex.: "/produto/1" -> ['produto', '1']
 */
$url = explode('/', $url);

/**
 * Carrega arquivo data/db.php
 */
$produtos = require __DIR__ . '/data/db.php';

if(isset($url[1]) 
	&& $url[1] == 'produtos') {
	
	$id = isset($url[2]) ? $url[2] : null;

	$produto = array_filter($produtos, function($p) use($id){
		return $p['id'] == $id;
	});

	$produto = current($produto);

	require __DIR__ . '/views/produtos.phtml';
}

if(isset($url[1])
	&& !$url[1]) {

	require __DIR__ . '/views/index.phtml';
}











