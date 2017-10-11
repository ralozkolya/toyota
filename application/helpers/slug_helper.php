<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function slug($title, $table, $slug_label = 'slug') {

	$ci =& get_instance();
	
	$or_slug = url_title($title, 'dash', TRUE);

	if(empty($or_slug)) {
		$or_slug = 'id';
	}

	$slug = $or_slug;

	$num_rows;
	$i = 1;
	do {
		$ci->db->where($slug_label, $slug);
		$num_rows = $ci->db->get($table)->num_rows();
		$slug = $num_rows ? $or_slug. '-' . $i++ : $slug;
	} while($num_rows);

	return $slug;
}