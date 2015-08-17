<?php

/*
	Template Class
	Trata de todas as tarefas relacionadas com os templates - mostrar as vistas, alertas,erros e informação
*/

class Template
{
	private $data;
	private $alert_types = array('success', 'alert', 'error');

	function __construct() {}
	
	/**
	 * Carrega um URL específico
	 *
	 * @access	public
	 * @param	string, string
	 * @return	null
	 */
	public function load($url, $title = '')
	{
		if ($title != '') { $this->set_data('page_title', $title); }
		include($url);
	}
	
	/**
	 * Redireciona para um URL especifico
	 *
	 * @access	public
	 * @param	string
	 * @return	null
	 */
	public function redirect($url)
	{
		header("Location: $url");
		exit;
	}
	
	
	/*
		Get / Set Data
	*/
	
	/**
	 * Guarda informação para ser usada pela vista mais tarde
	 *
	 * @access	public
	 * @param	string, string, bool
	 * @return	null
	 */
	public function set_data($name, $value, $clean = FALSE)
	{
		if ($clean == TRUE)
		{
			$this->data[$name] = htmlentities($value, ENT_QUOTES);
		}
		else 
		{
			$this->data[$name] = $value;
		}
	}
	
	/**
	 * Recupera informação através do nome providenciado para a vista aceder
	 *
	 * @access	public
	 * @param	string, bool
	 * @return	string
	 */
	public function get_data($name, $echo = TRUE)
	{
		if (isset($this->data[$name]))
		{
			if ($echo)
			{
				echo $this->data[$name];
			}
			else 
			{
				return $this->data[$name];
			}
		}
		return '';
	}
	
	
	/*
		Get / Set Alerts
	*/
	
	/**
	 * Define uma mensagem de alerta guardada na sessão
	 *
	 * @access	public
	 * @param	string, string (optional)
	 * @return	null
	 */
	public function set_alert($value, $type = 'success')
	{
		$_SESSION[$type][] = $value;
	}
	
	/**
	 * Devolve um string, contendo multiplas listas de alertas
	 *
	 * @access	public
	 * @param	
	 * @return	string
	 */
	public function get_alerts()
	{
		$data = '';
		
		foreach($this->alert_types as $alert)
		{
			if (isset($_SESSION[$alert]))
			{
				foreach($_SESSION[$alert] as $value)
				{
					$data .= '<li class="' . $alert . '">' . $value . '</li>';
				}
				unset($_SESSION[$alert]);
			}
		}
		echo $data;
	}
	
}