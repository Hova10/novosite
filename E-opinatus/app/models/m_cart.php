<?php

/*
	Cart Class
	Trata de todas as funções relacionadas com a modificação do nº de items no carrinho ou a visualização dos mesmos
	
	O Carrinho toma nota dos itens selecionados pelo utilizador,usando uma session variable chamada $_SESSION['cart']. 
	A session variable contém um array que por sua vez contém os ids e o nº selecionado
	de produtos no carrinho.
	
	$_SESSION['cart']['product_id'] = nº do item específico no carrinho
*/

class Cart
{
	function __construct() {}
	
	
	/*
		Getters e Setters
	*/
	
	/**
	 * Devolve um array de toda a informação dos produtos que estão no carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	array, null
	 */
	public function get()
	{
		if (isset($_SESSION['cart']))
		{
            // Busca todos os id's dos produtos que estão no carrinho
			$ids = $this->get_ids();
			
            // usa a lista de id's para ir buscar a informação dos produtos à base de dados
			global $Products;
			return $Products->get($ids);
		}
		return NULL;
	}
	
	/**
	 * Devolve um array de todos os id's dos produtos no carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	array, null
	 */
	public function get_ids()
	{
		if (isset($_SESSION['cart']))
		{
			return array_keys($_SESSION['cart']);
		}
		return NULL;
	}
	
	/**
	 * Adiciona o item ao carrinho
	 *
	 * @access	public
	 * @param	int, int
	 * @return	null
	 */
    public function add($id, $num = 1)
    {
        // Monta ou recupera o carrinho
        $cart = array();
        if (isset($_SESSION['cart']))
        {
            $cart = $_SESSION['cart'];
        }

        // Verifica se o item já está presente no carrinho
        if (isset($cart[$id]))
        {
            // se o item já existe no carrinho
            $cart[$id] = $cart[$id] + $num;
        }
        else 
        {
            // se o item não existe no carrinho	
            $cart[$id] = $num;
        }
        $_SESSION['cart'] = $cart;
    }
	
	/**
	 * Actualiza a quantidade de um item específico no carrinho
	 *
	 * @access	public
	 * @param	int, int
	 * @return	NULL
	 */ 
	public function update($id, $num) 
	{
		if ($num == 0)
	    {
	        unset($_SESSION['cart'][$id]);
	        if (empty($_SESSION['cart'])) { unset($_SESSION['cart']); } //add
	    }
	    else 
	    {
	        $_SESSION['cart'][$id] = $num; 
	    }
	}
	
	/**
	 * Esvazia todos os itens do carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	null
	 */
	public function empty_cart()
	{
		unset($_SESSION['cart']);
	}
	
	/**
	 * Devolve o nº total de items no carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	int
	 */
	public function get_total_items()
	{
		$num = 0;
		
		if (isset($_SESSION['cart']))
		{
			foreach($_SESSION['cart'] as $item)
			{
				$num = $num + $item;
			}
		}
		return $num;
	}
	
	/**
	 * Devolve o custo total de todos os items no carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	int
	 */
	public function get_total_cost()
	{
		$num = '0.00';
		if (isset($_SESSION['cart']))
		{
			// se há items para mostrar
			
			// busca os id's dos produtos
			$ids = $this->get_ids();
			
			// busca os preços dos produtos
			global $Products;
			$prices = $Products->get_prices($ids);
			
			// faz o loop, adicionando o custo de cada item * o nº de item no carrinho ao $num cada vez que faz o loop
			if ($prices != NULL)
			{
				foreach($prices as $price)
				{
					$num += doubleval($price['price'] * $_SESSION['cart'][$price['id']]);
				}
			}
		}
		return $num;
	}
	
	/**
	 * Devolve o custo de envio baseado no custo dos items
	 *
	 * @access	public
	 * @param	double
	 * @return	double
	 */
	public function get_shipping_cost($total)
	{
		if ($total > 200)
		{
			return 40.0;
		}
		else if ($total > 50)
		{
			return 15.0;
		}
		else if ($total > 10)
		{
			return 4.0;
		}
		else 
		{
			return 2.0;	
		}
	}
	
	
	
	/*
		Cria as secções da página
	*/
	/**
	 * Devolve um string, contendo uma lista para cada produto no carrinho
	 *
	 * @access	public
	 * @param	
	 * @return	array
	 */
	public function create_cart()
	{
		// busca os produtos existentes no carrinho
		$products = $this->get();
		
		$data = '';
		$total = 0;
		
		$data .= '<li class="header_row"><div class="col1">Product Name:</div><div class="col2">Quantity:</div><div class="col3">Product Price:</div><div class="col4">Total Price:</div></li>';
		
		if ($products != '')
		{
			// produtos a mostrar
			$line = 1;
			$shipping = 0;
			
			foreach($products as $product)
			{
				$item_shipping = $this->get_shipping_cost($product['price']) * $_SESSION['cart'][$product['id']];
				$shipping += $item_shipping;
			
				// cria um novo item no carrinho
				$data .= '<li';
				if ($line % 2 == 0)
				{
					$data .= ' class="alt"';
				}
				$data .= '><div class="col1">' . $product['name'] . '</div>';
				$data .= '<div class="col2"><input name="product' . $product['id'] .'" value="'. $_SESSION['cart'][$product['id']] .'"></div>';
				$data .= '<div class="col3">$' . $product['price'] . '</div>';
				$data .= '<div class="col4">$' . $product['price'] * $_SESSION['cart'][$product['id']] . '</div></li>';
				
				$total += $product['price'] * $_SESSION['cart'][$product['id']];
				$line++;
			}
			
			// adiciona o subtotal
			$data .= '<li class="subtotal_row"><div class="col1">Subtotal:</div><div class="col2">$' . $total . '</div></li>';
			
			// portes de envio
			$data .= '<li class="shipping_row"><div class="col1">Shipping Cost:</div><div class="col2">$' . number_format($shipping, 2) . '</div></li>';
			
			// iva
			if (SHOP_TAX > 0)
			{
				$data .= '<li class="taxes_row"><div class="col1">Tax (' . (SHOP_TAX * 100) . '%):</div><div class="col2">$' . number_format(SHOP_TAX * $total, 2) . '</div></li>';
			}
			
			// Total
			$data .= '<li class="total_row"><div class="col1">Total:</div><div class="col2">$' . number_format((SHOP_TAX * $total) + $total + $shipping, 2) . '</div></li>';
		}
		else 
		{
			// não existem produtos no carrinho
			$data .= '<li><strong>No items in the cart!</strong></li>';
			
			// subtotal
			$data .= '<li class="subtotal_row"><div class="col1">Subtotal:</div><div class="col2">$0.00</div></li>';
			
			// portes de envio
			$data .= '<li class="shipping_row"><div class="col1">Shipping Cost:</div><div class="col2">$0.00</div></li>';
			
			// iva
			if (SHOP_TAX > 0)
			{
				$data .= '<li class="taxes_row"><div class="col1">Tax (' . (SHOP_TAX * 100) . '%):</div><div class="col2">$0.00</div></li>';
			}
			
			// Total
			$data .= '<li class="total_row"><div class="col1">Total:</div><div class="col2">$0.00</div></li>';
		}
		
		return $data;
	}
	
}

