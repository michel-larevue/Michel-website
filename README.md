# Tanuki

Ce projet utilise le framework Kohana en design pattern MVVM.

## Dépendances

	- Tanuki-core
	- Kostache (Mustache for Kohana)
	- Flatffile
	- Markdown PHP

## Installation

Installer les dépendance à partir de Tanuki avec Composer : `composer install`?

### Configuration

Le dossier de configuration n'est pas versionné dans le projet, car il contient des informations sensibles et propre à chaque serveur.
http://kohanaframework.org/3.3/guide/kohana/files/config

Ainsi à chaque installation vous devez créer les dossier et fichiers suivants : 

	config
		- session.php


*session.php* doit contenir le code suivant :

	<?php defined('SYSPATH') OR die('No direct script access.');

	return array(
		'cookie' => array(
			'encrypted' => FALSE,
			'salt'		=> 'clef-aleatoire-de-plus-de-32-caracteres',
		),
	);


### Contenu

Le dossier de contenu est situé à la racine du projet et est géré dans dépôt séparé. Avec la configuration par défaut de Tanuji, il doit contenir la page `welcome.md` au minimum.

	project
		| application
		| content
			| pages
				- welcome.md
		| modules
		| vendor
		- .htaccess
		- index.php

	