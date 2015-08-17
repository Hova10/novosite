<?php

/*
	Categories Class
	Trata de todas as tarefas relacionadas com a busca e mostra das categorias
*/

class Categories
{
	private $Database;
	private $db_table = 'categories';

	function __construct()
	{
		global $Database;
		$this->Database = $Database;
	}
	
	/*
		Setting/Getting categorias da Base de Dados
	*/
	
	/**
	 * Devolve um array com a informação das categorias
	 *
	 * @access	public
	 * @param	int (optional)
	 * @return	array
	 */
	public function get_categories($id = NULL)
	{
		$data = array();
		if ($id != NULL)
		{
			// Busca uma categoria específica
			if ($stmt = $this->Database->prepare("SELECT id, name FROM " . $this->db_table . " WHERE id = ? LIMIT 1"))
			{
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$stmt->store_result();
				
				$stmt->bind_result($cat_id, $cat_name);
				$stmt->fetch();
				
				if ($stmt->num_rows > 0)
				{
					$data = array('id' => $cat_id, 'name' => $cat_name);
				}
				$stmt->close();
			}
		}
		else 
		{
			// Busca todas as categorias
			if ($result = $this->Database->query("SELECT * FROM " . $this->db_table . " ORDER BY name"))
			{
				if ($result->num_rows > 0)
				{
					while ($row = $result->fetch_array())
					{
						$data[] = array('id' => $row['id'], 'name' => $row['name']);
					}	
				}
			}
		}
		return $data;
	}


	/*
		Cria as secções da página
	*/

	/**
	 * Devolve uma lista de links para todas as páginas das categorias
	 *
	 * @access	public
	 * @param	string (optional)
	 * @return	string
	 */
	public function create_category_nav($active = NULL)
	{
		// Busca todas as categorias
		$categories = $this->get_categories();
		
		// Monta o item 'all'
		$data = '<li';
		if ($active == strtolower('home')) 
		{
			$data .= ' class="active"';
		}
		$data .= '><a href="' . SITE_PATH . '">Home</a></li>';
		
		// Faz o loop entre cada categoria
		if ( ! empty($categories))
		{
			foreach($categories as $category)
			{
				$data .= '<li';
				if (strtolower($active) == strtolower($category['name']))
				{
					$data .= ' class="active"';
				}
				$data .= '><a href="' . SITE_PATH . 'index.php?id=' . $category['id'] . '">' . $category['name'] . '</a></li>';
			}
		}
		
		return $data;
	}
	
}