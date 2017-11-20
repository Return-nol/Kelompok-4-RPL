<?php

	$server		= "ezprint.000webhostapp.com"; //sesuaikan dengan nama server
	$user		= "id3508824_user"; //sesuaikan username
	$password	= "mahasiswateknik"; //sesuaikan password
	$database	= "id3508824_login"; //sesuaikan target databese

	$connect = mysql_connect($server, $user, $password) or die ("Koneksi gagal!");
	mysql_select_db($database) or die ("Database belum siap!");
?>