$(document).ready(function() {
	zebraRows('tr:odd td', 'odd');
	
	$('tbody tr').hover(function(){
	  $(this).find('td').addClass('hovered');
	}, function(){
	  $(this).find('td').removeClass('hovered');
	});
	
    // transforma todas as rows para visivel
	$('tbody tr').addClass('visible');
	
    // anula o CSS display:none property
    // para que os utilizadores sem JS vejam
    // o search box
	$('#search').show();
	
	$('#filter').keyup(function(event) {
        // se o esc é premido ou nada é introduzido
    if (event.keyCode == 27 || $(this).val() == '') {
            // se esc é premido, queremos limpar o valor da caixa do search
			$(this).val('');
			
            // Torna todas as rows visiveis porque
            // se nada for introduzido todas as rows aparecem
      $('tbody tr').removeClass('visible').show().addClass('visible');
    }

		//se existe texto, é filtrado
		else {
      filter('tbody tr', $(this).val());
    }

		//reaplica as rows com estilo alternado
		$('.visible td').removeClass('odd');
		zebraRows('.visible:even td', 'odd');
	});
	
	
	$('thead th').each(function(column) {
		$(this).addClass('sortable')
					.click(function(){
						var findSortKey = function($cell) {
							return $cell.find('.sort-key').text().toUpperCase() + ' ' + $cell.text().toUpperCase();
						};
						
						var sortDirection = $(this).is('.sorted-asc') ? -1 : 1;
						
					
						var $rows		= $(this).parent()
																.parent()
																.parent()
																.find('tbody tr')
																.get();
						
                        // faz o loop a todas as rows e efectua a pesquisa
						$.each($rows, function(index, row) {
							row.sortKey = findSortKey($(row).children('td').eq(column));
						});
						
                        // compara e ordena as rows por ordem alfabética
						$rows.sort(function(a, b) {
							if (a.sortKey < b.sortKey) return -sortDirection;
							if (a.sortKey > b.sortKey) return sortDirection;
							return 0;
						});
						
                        // adiciona as rows na ordem correcta no fundo da tabela
						$.each($rows, function(index, row) {
							$('tbody').append(row);
							row.sortKey = null;
						});
						
				
						$('th').removeClass('sorted-asc sorted-desc');
						var $sortHead = $('th').filter(':nth-child(' + (column + 1) + ')');
						sortDirection == 1 ? $sortHead.addClass('sorted-asc') : $sortHead.addClass('sorted-desc');
						
						
						$('td').removeClass('sorted')
									.filter(':nth-child(' + (column + 1) + ')')
									.addClass('sorted');
						
						$('.visible td').removeClass('odd');
						zebraRows('.visible:even td', 'odd');
					});
	});
});


//usado para aplicar estilo alternado entre colunas
function zebraRows(selector, className)
{
	$(selector).removeClass(className)
							.addClass(className);
}

//filtra resultados baseados na query
function filter(selector, query) {
	query	=	$.trim(query); // faz o trim dos espaços em branco
  query = query.replace(/ /gi, '|'); 
  
  $(selector).each(function() {
    ($(this).text().search(new RegExp(query, "i")) < 0) ? $(this).hide().removeClass('visible') : $(this).show().addClass('visible');
  });
}