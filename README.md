# Sortir
Projet 2: Analyse, conception et développement d’un site d’organisation d'événements d’entreprises avec PHP et MySQL : définition de tests et d’outils de passage des tests.


1 - Installer PhpStorm + Plugins

2 - Installer WAMP 

3 - Installer CMDER

4 - Installer au minimum PHP 7.1.31 (Dossier WAMP => Extraire dans C:\wamp64\bin\php)

5 - Installer Composer (Developpeur => Choisir au minimum la version PHP 7.1.31 + Paramétrer le proxy)

6 - Installer Node

7 - Installer Yarn

9 - Installation des modules

	=> composer req webserver
	
	=> composer req symfony/routing
	
	=> composer req annotations
	
	=> composer req --dev symfony/profiler-pack
	
	=> composer req annotation
	
	=> composer req twig
	
	=> composer req doctrine
	
	=> composer req maker
	
	=> composer req form
	
	=> composer req security-csrf
	
	=> composer req validator
	

OU 	
=> composer require webserver symfony/routing annotations --dev symfony/profiler-pack annotation twig doctrine maker form security-csrf validator debug security


10 - Installation WebPack 

	=> composer require symfony/webpack-encore-bundle
	
	=> yarn install
	
	=> yarn add --dev @symfony/webpack-encore
	
	=> yarn add webpack-notifier --dev
	
	=> yarn add copy-webpack-plugin --dev
	
	=> Ajouter au fichier "webpack.config.js" le code suivant
	
var CopyWebpackPlugin = require('copy-webpack-plugin');

		.addPlugin(new CopyWebpackPlugin([
		
			{ from: './assets/images' to: 'images' }
			
		]))
		
	=> Utilisation de Webpack Encore (Ajout de la déclaration des scripts JS et CSS dans le fichier "webpack.config.js")
	
		=> Images: <img src="{{ asset('build/images/[Votre_Image.Extension]') }}" alt="Mon Image"/>
		
		=> CSS: {{ encore_entry_link_tag('Nom_Du_Fichier_Sans_Extension') }}
		
		=> JS: {{ encore_entry_script_tag('Nom_Du_Fichier_Sans_Extension') }}
		
		=> Compilation: yarn dev ou yarn watch
		
		
11 - Installer Doctrine : php bin/console doctrine:database:create ( modifier le .env pour MAJ la connexion à la BDD et php.ini  et update avant la création)
	
	=> sur php.ini enlever le commentaire pdo_mysql et modifier le timezone ( UTC )
	
	=> composer update



12 - MAJ BDD : php bin/console doctrine:schema:update --force


13 - php bin/console server:run

/!\ Aucun compte de créer pour se connecter. Afin de palier, vous devez commenter - { path: ^/register, roles: ROLE_ADMIN } dans security.yaml et supprimer le {% extends 'base.html.twig' %} se trouvant dans register.html.twig.
Ensuite se connecter http://127.0.0.1:8000/register
