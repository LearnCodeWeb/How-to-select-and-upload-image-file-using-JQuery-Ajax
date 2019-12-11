<?php
include_once('config.php');

array_map('unlink', array_filter((array) glob("../uploads/*")));

$file			=	$_FILES['file']['name'];
$file_image		=	'';
if($_FILES['file']['name']!=""){
    extract($_REQUEST);
	$db->delete('images',array('img_order'=>555));
    $infoExt        =   getimagesize($_FILES['file']['tmp_name']);
    
	if(strtolower($infoExt['mime']) == 'image/gif' || strtolower($infoExt['mime']) == 'image/jpeg' || strtolower($infoExt['mime']) == 'image/jpg' || strtolower($infoExt['mime']) == 'image/png'){
		
		$file	=	preg_replace('/\\s+/', '-', time().$file);
		
		$path   =   '../uploads/'.$file;
		
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$data   =   array(
			'img_name'=>$file,
			'img_order'=>555
		);
		$insert     =   $db->insert('images',$data);
		if($insert){ echo 1; } else { echo 0; }
	}else{
		echo 2;
	}

}
?>