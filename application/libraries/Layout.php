<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	private $CI;
	private $var = array();
	private $theme = '';

	/*
	|===============================================================================
	| Constructeur
	|===============================================================================
	*/

	public function __construct()
	{

		$this->CI =& get_instance();
		$this->var['output'] = '';

		//  Le titre est composé du nom de la méthode et du nom du contrôleur
		//  La fonction ucfirst permet d'ajouter une majuscule
		$this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

		//  Nous initialisons la variable $charset avec la même valeur que
		//  la clé de configuration initialisée dans le fichier config.php
		$this->var['charset'] = $this->CI->config->item('charset');
	}

	/*
	|===============================================================================
	| Méthodes pour charger les vues
	|	. view
	|	. views
	|===============================================================================
	*/

	public function view($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		$this->CI->load->view('../themes/' . $this->theme, $this->var);
	}

	public function views($name, $data = array())
	{
		$this->var['output'] .= $this->CI->load->view($name, $data, true);
		return $this;
	}

	public function set_theme($theme)
	{

		if (is_string($theme) AND !empty($theme) AND file_exists('./application/themes/' . $theme . '.php')) {
			$this->theme = $theme;
			return true;
		}

		return false;
	}

	/*
	|===============================================================================
	| Méthodes pour modifier les variables envoyées au layout
	|	. set_titre
	|	. set_charset
	|===============================================================================
	*/
	public function set_titre($titre)
	{

		if (is_string($titre) AND !empty($titre)) {
			$this->var['titre'] = $titre;
			return true;
		}
		return false;
	}

	public function set_charset($charset)
	{

		if (is_string($charset) AND !empty($charset)) {
			$this->var['charset'] = $charset;
			return true;
		}
		return false;
	}
}
