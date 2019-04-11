<?php
	foreach($_FILES as $index => $file){
		$fileName     = $file['name'];
		$fileTempName = $file['tmp_name'];
		$file_basename = substr($fileName, 0, strripos($fileName, '.'));
		$file_ext = substr($fileName, strripos($fileName, '.'));
		
		if(!empty($file['error'][$index])){
			echo "An Error Occured...";
		}
		if(!empty($fileTempName) && is_uploaded_file($fileTempName)){
			move_uploaded_file($fileTempName, "uploads/" . $fileName);
			return true;
		}
	}
?>