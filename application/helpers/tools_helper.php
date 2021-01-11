<?php

function get_category_name($OID){
	

    $CI = &get_instance();
    $categoryName = $CI->db
        ->where("OID",$OID)
        ->get("category")
        ->row()
        ->categoryName;

        return $categoryName;
}

?>