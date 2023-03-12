<?php 
	require_once "Classes/PHPExcel.php";
	function readExcel($path){
		$exel = PHPExcel_IOFactory::createReaderForFile(public_path($path));
		$exelObj = $exel->load($path);
		$ws = $exelObj->getActiveSheet();
		return $ws;
	}
?>