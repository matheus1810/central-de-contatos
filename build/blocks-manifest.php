<?php
// This file is generated. Do not modify it manually.
return array(
	'lista-contatos' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'central-de-contatos/lista-contatos',
		'version' => '0.1.2',
		'title' => 'Lista de Contatos',
		'category' => 'widgets',
		'icon' => 'id',
		'description' => 'Liste todos os contatos da sua lista',
		'example' => array(
			'attributes' => array(
				'quantidade' => 2
			)
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			),
			'color' => array(
				'background' => true,
				'text' => true
			),
			'spacing' => array(
				'padding' => true,
				'margin' => true
			)
		),
		'textdomain' => 'central-de-contatos',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'attributes' => array(
			'quantidade' => array(
				'type' => 'integer',
				'default' => 5
			),
			'ordenacao' => array(
				'type' => 'string',
				'default' => 'title',
				'enum' => array(
					'title',
					'date'
				)
			),
			'mostrar_email' => array(
				'type' => 'boolean',
				'default' => true
			)
		),
		'render' => 'file:./render.php'
	)
);
