jQuery(document).ready(function($) {

		var mainContent = $('#tax-items-container');

		if ( ~location.href.indexOf('action=get_tax') ) {
			var urlParams = '?' + location.href.split('?')[1];

			ajaxTaxUrl(urlParams);
		}

		// обработка события клика по кнопке с фильтром
		$('#tax-items-container').on('click', '.show-filter', function(event) {
			event.preventDefault();

			var thisWidget = $(this).closest('.widget');
			var termSlug = $('.filters-block.container').attr('id');

			if($('input:checked').length > 0) {

				var selectedColors = [];
				var selectedTextures = [];
				var selectedProperties = [];

				$('input:checked').each(function(){
					if ($(this).hasClass('color')) {
						selectedColors.push($(this).attr('id'));
					}
					if ($(this).hasClass('texture')) {
						selectedTextures.push($(this).attr('id'));
					}
					if ($(this).hasClass('property')) {
						selectedProperties.push($(this).attr('id'));
					}
				});

				ajaxTax(selectedColors, selectedTextures, selectedProperties, termSlug);
			} else {
				ajaxClearFilter(termSlug);
			}

		});

		// обработка события клика по пагинации
		$('#tax-items-container').on('click', 'a.page-numbers', function(event) {
			event.preventDefault();

			var targetLink = $(this).attr('href');

			if ( ~targetLink.indexOf('action=get_tax') ) {
				if ( ~targetLink.indexOf('&page=') ) targetLink = targetLink.split('&page=')[0];
				
				var getQuery = '?' + targetLink.split('?')[1];
				var pageQuery = targetLink.split('?')[0].split('page')[1];

				if (pageQuery) {
					pageQuery = '&page=' + pageQuery.replace(/[^\d]/g, "");
				} else {
					pageQuery = '';
				}

				getQuery = getQuery + pageQuery;

				ajaxTaxUrl(getQuery);
			} else {
				var termSlug = $('.filters-block.container').attr('id');

				pageQuery = '?action=get_tax&termslug=' + termSlug +'&page=' + $(this).html();

				ajaxTaxUrl(pageQuery);
			}

		});

		// обработка события клика по кнопке сброса фильтра
		$('#tax-items-container').on('click', 'a.remove', function(event) {

			var termSlug = $('.filters-block.container').attr('id');

			ajaxClearFilter(termSlug);
		});

		// функция отправки ajax апроса
		function ajaxTax(taxColors, taxTextures, taxProperties, termSlug) {
			requestAnimation(false);
			// с версии 2.8 'ajaxurl' всегда определен в админке
			jQuery.get(
				myFilter.ajaxurl,
				{
					action: 'get_tax',
					colors: taxColors,
					textures: taxTextures,
					properties: taxProperties,
					termslug: termSlug
				},
				function(response) {
					mainContent.html(response);
					requestAnimation(true);
					updateUrl();
					history.pushState({page_title: document.title}, '', location.href);
				});
		}

		// функция отправки урлового ajax запроса
		function ajaxTaxUrl(url) {
			requestAnimation(false);
			jQuery.get(
				myFilter.ajaxurl + url,
				function(response) {
					mainContent.html(response);
					requestAnimation(true);
					updateUrl();
					history.pushState({page_title: document.title}, '', location.href);
			});
		}

		// функция очистки фильтра
		function ajaxClearFilter(termSlug) {
			requestAnimation(false);
			// с версии 2.8 'ajaxurl' всегда определен в админке
			jQuery.get(
				myFilter.ajaxurl,
				{
					action: 'get_tax',
					termslug: termSlug
				},
				function(response) {
					mainContent.html(response);
					requestAnimation(true);
					updateUrl();
					history.pushState({page_title: document.title}, '', location.href);
				});
		}

		// получение урла и его изменение в адресной строке после отправки ajax запроса
		function updateUrl(){

			var getUrl = $('.url').attr('data-url');

			if (getUrl) {
				getUrl = getUrl.split('?')[1];
				location.hash = '?' + getUrl;
			}
		}

		// функция анимации ajax запроса
		function requestAnimation(status) {
			if (status) 
				mainContent.css("opacity", 1);
			else
				mainContent.css("opacity", 0);
		}
});