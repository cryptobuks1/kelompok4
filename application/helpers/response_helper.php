<?php



function response($code, $prop = []){
	$output =& get_instance();
	$properties_class = $output->output->set_status_header($code);
	if(isset($prop["content_type"])){
		$properties_class->set_content_type($prop["content_type"]["type"], $prop["content_type"]["encoding"]);
	}
	if(isset($prop["output"])){
		$properties_class->set_output($prop["output"]);
	}

	return $properties_class;
}