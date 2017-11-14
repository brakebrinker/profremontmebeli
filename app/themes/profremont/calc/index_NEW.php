<?php include 'calc.php' ?>

<div class="calc">
	<ul class="step">
		<li><a class="active" href="#" data-step="1"></a></li>
		<li><a href="#" data-step="2"></a></li>
		<li><a href="#" data-step="3"></a></li>
		<li><a href="#" data-step="4"></a></li>	
	</ul>
	<ul class="stepdesc">
		<li class="active" data-step="1">Тип</li>		
		<li data-step="2">Параметры</li>		
		<li data-step="3">Материал</li>
		<li data-step="4">Стоимость</li>
	</ul>

<!-- Шаги -->	
<form id="render">	

<div id="step1">		
	<h2 class="ctitle">Выберите тип мебели</h2>	
		<span class="stepnext" alt="2">Далее</span>
	<br>	
	<div style="width: 80%; margin: 10px auto;">
		<?php RenderStep1(); ?>
	</div>	
</div>

<div id="step2">		
	<h2 class="ctitle">Параметры мебели</h2>			
		<span class="stepnext" alt="3">Далее</span>
		<span class="stepprev" alt="1">Назад</span>
	<br>	
	<div style="width: 80%; margin: 10px auto;">
		
	</div>	
</div>


<div id="step3">		
	<h2 class="ctitle">Параметры мебели</h2>	
		<span class="stepnext" alt="4">Далее</span>
		<span class="stepprev" alt="2">Назад</span>
	<br>	
	<div style="width: 80%; margin: 10px auto;">
		<?php RenderStep3(); ?>
	</div>	
</div>


<div id="step4">		
	<h2 class="ctitle">Расчет стоимости</h2>				
		<span class="stepclear">Повторный расчет</span>
		<span class="stepprev" alt="3">Назад</span>
	<br>	
	<div style="height: 410px;width: 100%; margin: 10px auto;">
		<ul class="itogo">
			<li><div>Работа</div><p><span class="irab">0</span> р.</p></li>
			<li><div>Материалы</div><p><span class="imat">0</span> р.</p></li>
			<li><div>Итого</div><p class="isum"><span>0</span> р.</p></li>
		</ul>
		<div style="clear:both"></div>
		<br><h3 class="subtitle" style="display: inline-block;width: 80%;margin-left: 10%">Форма заказа</h3>
		<br>
		<div class="senders">	
			<div class="sendform">
				<label for="itog1">Ваше имя:</label><input id="itog1" class="fname" type="text" name="name">
				<label for="itog2">Ваш телефон:</label><input id="itog2" class="fname" type="text" name="phone" maxlength="10">
				<span>Отправить заявку</span>
			</div>
		</div>
	</div>	
</div>


	

</form>
<!-- /Шаги -->

</div>