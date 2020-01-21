<?php
	require_once '../class/user.php';
	require_once 'config.php';
	$user->indexHead();
	$user->indexTop();
	$user->activationForm();
	$user->indexFooter();
?>
