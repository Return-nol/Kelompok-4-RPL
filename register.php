<?php
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	 include_once "koneksi.php";

	 class usr{}

	 $username = $_POST["username"];
	 $password = $_POST["password"];
	 $confirm_password = $_POST["confirm_password"];
	 $phone = $_POST["phone"];
	 $line = $_POST["line"];

	 if ((empty($username))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom username tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($password))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom password tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($phone))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom phone number tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($line))) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Kolom line id tidak boleh kosong";
	 	die(json_encode($response));
	 } else if ((empty($confirm_password)) || $password != $confirm_password) {
	 	$response = new usr();
	 	$response->success = 0;
	 	$response->message = "Konfirmasi password tidak sama";
	 	die(json_encode($response));
	 } else {
	 if (!empty($username) && $password == $confirm_password){
		 	$num_rows = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM login WHERE username='".$username."'"));

		 	if ($num_rows == 0){
		 		$query = mysqli_query($connect, "INSERT INTO login (username, password, phone, line) VALUES('".$username."','".$password."', '".$phone."', '".$line."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->message = "Register berhasil, silahkan login.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->message = "Gagal memasukkan data";
		 			die(json_encode($response));
		 		}
		 	} else {
		 		$response = new usr();
		 		$response->success = 0;
		 		$response->message = "Username sudah ada";
		 		die(json_encode($response));
		 	}
		 }
	 }

	 mysqli_close($connect);

?>
