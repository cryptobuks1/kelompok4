<?php

function strip_error_html($data){
	$dataStr = [];
	foreach(explode(" ", $data) as $str){
		array_push($dataStr, $str);
	}
	return $dataStr;
}