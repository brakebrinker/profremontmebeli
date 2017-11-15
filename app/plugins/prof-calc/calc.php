<?php
// include('Calc/index.php') ;
// Отрисовка типов мебели изи дата файла
function RenderStep1() {
	$fp = file(plugin_dir_path( __FILE__ ) . 'tip.txt');
	foreach ($fp as $val) {
		$tmp = explode('#', $val); $num = trim($tmp[0]); $tip = trim($tmp[1]);
		$tip = explode ('|', $tip);
		echo '<div class="tips">
			<input class="radio" name="tip" id="'.$num.'" type="radio" data-price_def="'.$tip[1].'" data-size_def="'.$tip[2].'" value="'.$tip[0].'"><label for="'.$num.'"><div class="tipname">'.$tip[0].'</div></label>
			</div>';
	}	
}



// Шаг 2 - параметры
function RenderStep2($id) {
	// строим список размеров мебели
	$fp = file('razmer.txt');
	$num = 0;
	$flag = 0;
	$cnt = 0;
	$razmer = '<h3 class="subtitle">Размеры мебели</h3>';
	foreach ($fp as $val) {
		$num++;
		if (strlen($val) < 5) continue;
		if (stripos($val, '#') !== false) {
			$flag = 0;
			$val = trim($val);
			$tmp = explode('#', $val); $tmp[0] = (int)$tmp[0]; $tmp[1] = trim($tmp[1]);			
			if ((int)$tmp[0] == $id) { $flag = 1; continue; }
		}
		// берем только размеры для выбранного типа мебели
		if ($flag == 1) {
			$cnt++;
			if ($cnt == 1) $sel = 'checked'; else $sel = '';
			$val = trim($val);
			$tmp = explode('|', $val);
			$razmer .= '<div class="razmelem"><input class="radio" name="razmer" id="razm_'.$num.'" value="'.$tmp[0].'" type="radio" '.$sel.' data-price_size="'.$tmp[2].'"><label for="razm_'.$num.'"><div class="tipname">'.$tmp[0].' <br><span>'.$tmp[1].'</span></div></label></div>';
		}	
	}
	// добавляем спальное место, если нужно
	if ($id == 1 OR $id == 2) $razmer .= '<div class="spal"><input id="spal" type="checkbox" name="spalnoe" value="1" data-size_additional="1" data-price_additional="1000"><label for="spal"><span></span>Дополнительное спальное место</label></div>';
	
	
	// Добавляем пышность мебели
	$pish = '<br><br><h3 class="subtitle" style="margin-top: 10px;">Пышность мебели</h3>
	<div class="razmelem pishn">
	<input class="radio" name="pish" id="pish1" type="radio" data-koef_lush_cost="1" value="Нет" checked><label for="pish1">
	<div class="tipname">Нет</div></label></div>
	<div class="razmelem pishn">
	<input class="radio" name="pish" id="pish2" type="radio" data-koef_lush_cost="1.1" value="Средняя"><label for="pish2">
	<div class="tipname">Средняя</div></label></div>
	<div class="razmelem pishn">
	<input class="radio" name="pish" id="pish3" type="radio" data-koef_lush_cost="1.2"><label for="pish3" value="Пышная">
	<div class="tipname">Пышная</div></label></div>
	';
	
	// строим список замены наполнителя
	$fp = file('zamena.txt');
	$num = 0;
	$flag = 0;
	$zamena = '<h3 class="subtitle" style="margin-top:10px;">Замена наполнителя</h3>';
	$zamena .= '
	<div class="razmelem pishn zamen">
	<input class="radio" name="zam" id="zam1" value="0" type="radio" checked><label for="zam1">
	<div class="tipname">Не требуется</div></label></div>
	<div class="razmelem pishn zamen">
	<input class="radio" name="zam" id="zam2" value="1" type="radio"><label for="zam2">
	<div class="tipname">Частичное восстановление</div></label></div>
	<div class="razmelem pishn zamen">
	<input class="radio" name="zam" id="zam3" value="2" type="radio"><label for="zam3">
	<div class="tipname">Полная замена всех слоев</div></label></div>
	<br><br>
	';
	foreach ($fp as $val) {
		$num++;
		if (strlen($val) < 5) continue;
		if (stripos($val, '#') !== false) {
			$flag = 0;
			$val = trim($val);
			$tmp = explode('#', $val); $tmp[0] = (int)$tmp[0]; $tmp[1] = trim($tmp[1]);
			if ((int)$tmp[0] == $id) { $flag = 1; continue; }
		}
		// берем только элементы для выбранного типа мебели
		if ($flag == 1) {
			$val = trim($val);
			$tmp = explode('|', $val);
			$zamena .= '<div class="zamena"><input id="zamen'.$num.'" type="checkbox" name="zamena" value="'.$tmp[0].'" data-koef_change_price="'.$tmp[1].'"><label for="zamen'.$num.'"><span></span>'.$tmp[0].'</label></div>';
		}	
	}	
	
	return $razmer.$pish.$zamena.'<br><br>';	
	
}	




// Шаг 3 - Материалы
function RenderStep3($id) {
	// строим список материалов
	$fp = file('material.txt');
	$num = 0;	
	$mat = '<span class="matlabel">Материалы </span> <div class="styled-select"><select class="matsel">';	
	$curr = 0;
	$stil = array();
	foreach ($fp as $val) {
		$num++;
		if (strlen($val) < 5) continue;
		if (stripos($val, '#') !== false) {			
			$val = trim($val);
			$tmp = explode('#', $val); $tmp[0] = (int)$tmp[0]; $tmp[1] = trim($tmp[1]);			
			$curr = $tmp[0];
			$mat .= '<option value="'.$tmp[0].'">'.$tmp[1].'</option>';
			continue;
		}
		// блоки со стилями материала		
			$val = trim($val);			
			$stil[$curr][$num] = $val;		
	}	
	
	// собираем стили в блоки для каждого материала
	$stil2 = '<br><br><br><h3 class="subtitle">Класс:</h3>';
	$cnt = 0;
	foreach ($stil as $ids=>$key) {
		if ($cnt == 0) $sel = ' visib'; else $sel = '';
		$stil2 .= '<div class="blokstili'.$sel.'" id="stili_'.$ids.'">'; 
		$first = 'active';
		foreach ($key as $val) {
			if ($cnt == 0) $sel = ' checked'; else $sel = '';
			$cnt++;
			$val = trim($val); $tmp = explode('|', $val);
			$stil2 .= '<div class="razmelem"><input class="radio '.$first.'" name="stili" id="stl_'.$cnt.'" value="'.$tmp[0].'" type="radio" '.$sel.' data-material_price="'.$tmp[2].'"><label for="stl_'.$cnt.'"><div class="tipname">'.$tmp[0].' <br><span>'.$tmp[1].'</span></div></label></div>';
		$first = '';	
		}
		$stil2 .= '</div>';
	}	
	
	// строим список усложняющих элементов
	$uslozh = '<br><br><h3 class="subtitle">Усложняющие элементы</h3>';
	$fp = file('uslozhnenie.txt');
	$cnt = 1;
	foreach ($fp as $val) {
		$num++;
		if (strlen($val) < 5) continue;
		if (stripos($val, '#') !== false) {
			$flag = 0;
			$val = trim($val);
			$tmp = explode('#', $val); $tmp[0] = (int)$tmp[0]; $tmp[1] = trim($tmp[1]);			
			if ((int)$tmp[0] == $id) { $flag = 1; continue; }
		}
		// берем только размеры для выбранного типа мебели
		if ($flag == 1) {			
			$val = trim($val);
			$tmp = explode('|', $val);
			$uslozh .= '<div class="uselem"><input id="usl_'.$cnt.'" type="checkbox" name="uslozh" value="'.$tmp[0].'" data-super_task="'.$tmp[1].'"><label for="usl_'.$cnt.'"><span></span>'.$tmp[0].'</label></div>';
		}	
		$cnt++;
	}	
	$uslozh	.= '<br><br>';
	
	
	$mat .= '</select></div>';
	return $mat.$stil2.$uslozh;
	
}	





// Ajax

// смена типа мебели
if (isset($_POST['render'])) {
	$id = (int)$_POST['id'];
	$out = RenderStep2($id).'||'.RenderStep3($id);
	echo $out;
}	


// отправка заявки на почту

// получатель

$to = 'premontmebeli@yandex.ru';

// тема письма
$subject = 'Новая заявка PRM';


if (isset($_POST['sender']) AND $_POST['data'] != '') {
	$message = $_POST['data'];
	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	
	// Для отправки HTML-письма должен быть установлен заголовок Content-type
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: PRM-SITE <noreply@profremontmebeli.ru>' . "\r\n";

	// Отправляем
	mail($to, $subject, $message, $headers);
	
}	



?>