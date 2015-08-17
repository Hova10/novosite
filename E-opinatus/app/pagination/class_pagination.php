<?php


define("PAGINATION_PATH", dirname(__FILE__));

Class Pagination {

    /**
     * Guarda o nº de resultados a mostrar por pág
     * @var int $limit nº de resultados por pág
     */

    public $limit;

    /******
     * Nº de resultados que foram inquiridos
     * @var int $rows Number of results returned from query
     * @var int $rows Nº de resultados devolvidos pela query
     */

    public $rows;

    /******
     * Guarda a página actual
     * @var int $current_page Página actual
     */

    public $current_page;

    /******
     * O path do URI
     * @var string $location O URI actual sem página
     */

    public $location;

    /******
     * Guarda o nº total de páginas
     * @var int Nº total de páginas
     */

    protected $total;

    /******
     * Guarda o tipo de paginação a mostrar
     * @var int $type 1|2, 1-standard, 2- seta
     */

    protected $type;

    /******
     * Se mostra o jumpto ou não
     * @var boolean $jumpto
     */

    protected $jumpTo;

    /******
     * Construct
     * @param int $limit Limita o nº de resultados por página
     * @param int $rows Nº de resultados devolvidos pela query
     * @param int $current_page Nº pág actual
     * @param string $location URI
     * @return null
     */

    public function __construct($limit, $rows, $current_page, $location, $type=1, $jumpto=0)
    {
        $this->limit        = (int) $limit;
        $this->rows         = (int) $rows;
        $this->current_page = (int) $current_page;
        $this->location     = strip_tags($location);
        $this->type         = (int) $type;
        $this->jumpTo       = (int) $jumpto;

        if($this->limit < 1)
        {
            die("The limit (max results per page) must be greater than zero.");
        }

        if(!file_exists(PAGINATION_PATH."/pagination_templates.php"))
        {
            die("Unable to find pagination_templates.php file.");
        }

        if($this->type !== 1 && $this->type !== 2)
        {
            $this->type = 1;
        }

        if($this->jumpTo !== 0 && $this->type !== 1)
        {
            $this->jumpTo = 0;
        }

        $this->total = (int) ceil($this->rows/$this->limit);

        
        if(($this->current_page < 1) || $this->current_page > $this->total)
        {
            $this->current_page = 1;
        }

    }

    /******
     * Calcula o ponto de partida dos resultados para o query
     * @return int $start
     */

    public function prePagination()
    {
        $start = ($this->current_page - 1) * $this->limit;

        return $start;
    }

    /******
     * Gera o código de paginação
     * @param boolean $return se falso faz o echo do resultado
     * @return string $display
     */

    public function pagination($return = false)
    {
        //Guarda o output do display
        $display = $this->_include("pagination_header");

        if($this->total > 1 && $this->type === 1)
        {
            //determina se é mostrado o "previous"
            if($this->current_page !== 1)
            {
                $display .= $this->_include("previous");
            }

            //mostra todas as páginas
            if($this->total > 1 && $this->total < 7)
            {
                for($i=1; $i <= $this->total; $i++)
                {
                    if($this->current_page === $i)
                    {
                        $display .= $this->_include("selected", $i);
                    }

                    else
                    {
                        $display .= $this->_include("unselected", $i);
                    }
                }
            }

            //vista dividida (hidden)
            elseif($this->total >= 7)
            {
                $least = $this->current_page - 3;
                $great = $this->current_page + 3;

                //quando a 5ª pág é escolhida, mostra apenas 3 pontinhos
                $nomore = false;

                if($least < 1)
                {
                    $least = 1;
                }

                if($great > $this->total)
                {
                    $great = $this->total;
                }

                for($i = $least; $i <= $great; $i++)
                {

                    if($this->current_page >= 5)
                    {
                        if($i === $least)
                        {
                            $display .= $this->_include("unselected", 1).'...';
                        }

                        if($this->current_page === 5 && $nomore === false)
                        {
                            $display = substr($display, 0, -3);
                            $nomore   = true;
                        }
                    }

                    if($this->current_page === $i)
                    {
                        $display .= $this->_include("selected", $i);
                    }

                    else
                    {
                        $display .= $this->_include("unselected", $i);
                    }

                    if($this->current_page <= ($this->total - 4))
                    {
                        if($i === $great)
                        {
                            $display .= '...'.$this->_include("unselected", $this->total);
                        }
                    }
                }
            }

            //Se mostra o "NEXT" ou não
            if($this->current_page !== $this->total)
            {
                $display .= $this->_include("next");
            }
        }

        //Mostra apenas as setas
        elseif($this->total > 1 && $this->type === 2)
        {
            if($this->current_page === 1)
            {
                $display .= $this->_include("left_arrow_disabled");
            }

            else
            {
                $display .= $this->_include("left_arrow");
            }

            if($this->current_page === $this->total)
            {
                $display .= $this->_include("right_arrow_disabled");
            }

            else
            {
                $display .= $this->_include("right_arrow");
            }
        }

        //determina se é preciso mostrar o menu jumpto
        if($this->jumpTo === 1)
        {
            $display .= $this->_include("jumpto_header");

            for($i=1; $i <= $this->total; $i++)
            {
                $display .= $this->_include("jumpto_body", $i);
            }

            $display .= $this->_include("jumpto_footer");
        }

        $display .= $this->_include("pagination_footer");

        if($return)
        {
            return $display;
        }

        echo $display;
    }

    /******
     * Recupera e compila os templates
     * @param string $template nome do template a recuperar
     * @param int $page nº pág dado, caso contrário usa a pág actual
     * @return string $match[1]
     */

    private function _include($template, $page=false)
    {
        $cachedTemplates = array ();

        if($page === false)
        {
            $page = $this->current_page;
        }

        else
        {
            $page = (int) $page;
        }

        $search = array (
            		  "[location]",
            		  "[current_page]",
            		  "[nth_page]",
            		  "[previous_page]",
            		  "[next_page]"
        		      );

        $replacement = array (
        			  $this->location,
        			  $this->current_page,
        			  $page,
        			  $this->current_page - 1,
        			  $this->current_page + 1
        			);

        if(array_key_exists($template, $cachedTemplates))
        {
            //Comp
            $result = str_ireplace($search, $replacement, $cachedTemplates[$template]);

            return $result;
        }

        elseif(($template_file = file_get_contents(PAGINATION_PATH."/pagination_templates.php")))
        {
            //Busca o template que é preciso
            preg_match("/\<\!--$template--\>(.*?)\<\!--$template end--\>/is", $template_file, $match);

            if(isset($match[1]))
            {
                //Guarda em cache para uso posterior
                $cachedTemplates[$template] = $match[1];

                $result = str_ireplace($search, $replacement, $match[1]);

                unset($match, $template_file);
                return $result;
            }

            else
            {
                echo "Warning: Pagination template $template not found!";
            }
        }
    }
}

?>
