<?php 
	require_once "Classes/simple_html_dom.php";
	function getContent($foodName){
		$foodName = str_replace(' ', '-', $foodName);
		$foodName = urlencode($foodName);
		$html = file_get_html('https://www.cooky.vn/cach-lam/'.$foodName);
		$link = $html->find('.item-photo>.photo')[2]->href;
		$recipe = file_get_html('https://www.cooky.vn'.$link);
		$image = $recipe->find('#recipe-header-photo-container');
		dd($image[0]);
	}
?>