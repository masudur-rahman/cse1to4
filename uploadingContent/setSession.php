<?php
	session_start(); ob_start();
	$idx=$_POST['idx']; $value=$_POST['value'];
	if($value=="Nothing_to_Upload...") $_SESSION[$idx]="<script type='text/javascript'>$.notify('".$value."','warn')</script>";
	else $_SESSION[$idx]="<script type='text/javascript'>$.notify('".$value."','success')</script>";
?>