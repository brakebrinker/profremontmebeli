jQuery(document).ready(function($){
	
var send = '';	
	
// инициализация при первой загрузке
	$('#1').trigger('click');
	$.ajax({
	    type: 'POST',
		url: 'calc.php',
		data: 'render=yes&id=1',
		success: function(data){
			data = data.split('||');
			$('#step2 div').html(data[0]);
			$('#step3 div').html(data[1]);			
		  }
		});

	
// Переключение табов
	$('.step li a, .stepdesc li').click(function(){
		$('.step li a, .stepdesc li').removeClass('active');
		var tmp = $(this).data('step');		
			$('*[data-step="'+tmp+'"]').addClass('active');
		var step = $(this).data('step');
		$('#step1, #step2, #step3, #step4').fadeOut(150);
			setTimeout(function() {
				$('#step'+step).fadeIn(150);
			}, 150);	
		Summator();	
		return false;
	});	
	$('.step li a').click(function(){
$('.step li').removeClass('activeli');
		$( this ).parent().addClass('activeli');
});	
// Смена типа мебели
	$('.tips input').change(function(){
		var num = $(this).attr('id');
		$.ajax({
		  type: 'POST',
		  url: 'calc.php',
		  data: 'render=yes&id='+num,
		  success: function(data){
			data = data.split('||');
			$('#step2 div').html(data[0]);
			$('#step3 div').html(data[1]);			
		  }
		});
	});

// замена - гашение	галочек, если не требуется
	$('.zamen label').live('click', function() {	
		var tmp = $(this).attr('for');
		if (tmp == 'zam1') $('.zamena').css('opacity', '0.3');
			else $('.zamena').css('opacity', '1');
	});

	
// выбор материала из списка и показ/скрытие блоков со стилями
	$('.matsel').live('change', function() {
		var tmp = $(this).val();
		$('.blokstili').hide();
		$('#stili_'+tmp).show();
		$('#stili_'+tmp+' .active').trigger('click');
	});	
	

// Фокус на форме отправке
	$('#itog1, #itog2').click(function(){
		$(this).css('border', '1px solid #999');
	});	
	
//	Отправка заявки
	$('.sendform span').click(function(){
		Summator();
		var err = 0;
		var name = $('#itog1').val();
		var phone = $('#itog2').val();
			if (name == '') { $('#itog1').css('border', '1px solid red') ; err++; }
			if (phone == '') { $('#itog2').css('border', '1px solid red') ; err++; }
			if (err > 0) return false;
		// отправка данных		
		$.ajax({
		  type: 'POST',
		  url: 'calc.php',
		  data: 'sender=yes&data='+send,
		  success: function(data){
			$('.sendform').fadeOut(700);
			setTimeout(function() {
				$('.senders').html('<div class="sendok">Спасибо! Ваша заявка отправлена!</div>');
			}, 700);
		  }
		});	
		
	});	
	

// Функция расчета стоимости
// Обработчик

	$('#step2 input[type="radio"], #step2 input[type="checkbox"], #step3 input[type="radio"], #step3 input[type="checkbox"], #step3 select').live('change', function() {
		Summator();
	});	

// Сумматор
	
	function Summator(){
		// цстановим переменные, которые могут быть пустыми
			// замена наполнения
			var koef_change_name = '';
			var koef_change_price = 0;
			// усложнения
			var super_task_name = '';
			var super_task_total = 0;
			// материал
			var material_name = '';
			var material_price = 0;
			// пышность
			var koef_lush_name = 'Нет';
			
			////
			var price_def = 0;
			var size_def = 0;
			var price_size = 0;
			var size_additional = 0;
			var price_additional = 0;
			var koef_lush_cost = 0;
			////
			var tipname = '';
			var razmname = '';
			
		// получаем данные с форм
		$('.calc input').each(function(i,elem) {
			if (!$(elem).is(":checked")) return true;
			var name = $(elem).attr('name');			
			
			// тип мебели
			if (name == 'tip') { 
				tipname = $(elem).val();
				price_def = $(elem).data('price_def'); 
				size_def = $(elem).data('size_def'); 
			}
			
			// размеры
			if (name == 'razmer') {
				razmname = $(elem).val();
				price_size = $(elem).data('price_size');
			}
			
			// спальное место
			if (name == 'spalnoe') {
				size_additional = $(elem).data('size_additional');
				price_additional = $(elem).data('price_additional');
			}
			
			// пышность мебели
			if (name == 'pish') {
				koef_lush_name = $(elem).val();
				koef_lush_cost = $(elem).data('koef_lush_cost');				
			}
			
			// замена наполнителя
			if (name == 'zamena') {
				koef_change_price = koef_change_price + Number($(elem).data('koef_change_price'));
				if (koef_change_name == '') koef_change_name = $(elem).val();
					else koef_change_name = koef_change_name+','+$(elem).val();
				if ($('#zam1').is(":checked")) { koef_change_price = 0; koef_change_name = ''; }
			}
			
			// усложнения			
			if (name == 'uslozh') {
				if (super_task_name == '') super_task_name = $(elem).val();
					else super_task_name = super_task_name+','+$(elem).val();
				super_task_total = super_task_total + Number($(elem).data('super_task'));				
			}
			
			// ткань и стили
			if (name == 'stili') {
				material_name = $('.matsel option:selected').text()+' - '+$(elem).val();
				material_price = Number($(elem).data('material_price'));
			}			
			
		});
		
		// начинаем все считать и выводить в поля цены	на 4-ом шаге
			// стоимость работы
			var irab = Math.round((price_def + price_size+ price_additional)*koef_lush_cost+((price_def + price_size + price_additional))*koef_change_price + super_task_total);
			
			$('.irab').html(irab);
			
			// стоимость материала
			var imat = Math.round((size_def + size_additional)*material_price);			
			$('.imat').html(imat);
			
			// итоговая стоимость			
			var isum = Math.round((price_def + price_size + price_additional)*koef_lush_cost + (price_def + price_additional)*koef_change_price + super_task_total + (size_def + size_additional)*material_price);
			isum = irab+imat;
			$('.isum').html(isum);

		
		//	собираем список для отправки на почту		
		send = '';	
		send += '---------  Данные о заказчике --------<br><br>';
		send += 'Имя: '+$('#itog1').val()+'<br>';
		send += 'Телефон: '+$('#itog2').val()+'<br>';
		send += '<br>-----------  Выбранные опции ---------<br><br>';
		send += 'Тип мебели: '+tipname+'<br>';
		send += 'Размер мебели: '+razmname+'<br>';
		if (price_additional != 0) send += 'Доп. спальное место: Да<br>';
		send += 'Пышность мебели: '+koef_lush_name+'<br>';
		send += 'Замена наполнителя: '+koef_change_name+'<br>';
		send += 'Материал: '+material_name+'<br>';
		send += 'Усложняющие материалы: '+super_task_name+'<br><br>';
		send += '------------  Стоимость  --------------<br><br>';
		send += 'Работа: '+$('.irab').html()+' р. <br>';
		send += 'Материал: '+$('.imat').html()+' р. <br>';
		send += 'Итого: '+$('.isum').html()+' р. <br>';
				
		
		
	}	
	
	
	// Кнопки назад и далее
	$('.stepprev, .stepnext').click(function(){
		var tmp = $(this).attr('alt');
		$(".step").find("[data-step='" + tmp + "']").trigger('click');
	});		
	// Заново сделать расчет
	$('.stepclear').click(function(){
		$('label[for="3"]').trigger('click');
		setTimeout(function() {
			$('label[for="1"]').trigger('click');
		}, 100);		
		setTimeout(function() {
			$.ajax({
				type: 'POST',
				url: 'calc.php',
				data: 'render=yes&id=2',
				success: function(data){
				data = data.split('||');
				$('#step2 div').html(data[0]);
				$('#step3 div').html(data[1]);
					$(".step").find("[data-step='1']").trigger('click'); 
			  }
			});
		}, 150);			
	});	
	
	
	
});	