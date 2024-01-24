<?php 
session_start();
//$name=$_SESSION['user_name'];
$name=$_COOKIE['username'];
$data1=$name;
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_decrypted='1234512345123456';
$decrypt=openssl_decrypt($data1,$cipher,$key,$option,$iv_decrypted);
$uppername=ucfirst($decrypt);
//$uppername=strtoupper($name);

if(!isset($_COOKIE['id'])){
	header('location:index.php');
	die();
}
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fulton-sheen-School-resulties</title>
	<style type="text/css">
		@media(max-width:768px){
			body{
				background-color: maroon;
				padding: auto;
				margin: auto;
				width: auto;
			}

			#contener{
				background-color: silver;
				padding: 10%;
				margin-top:45px;
				width: auto;
				display: list-item;

			}

			.result1,.result2,.result3,.result4,.result5,.result6,.result7{
				background-color: yellow;
				margin: auto;
				padding: 7px;
				margin-bottom: 20px;
				width: 200px;
				border: 3px solid green;
				border-radius: 12px;
			}

			.link{
				text-decoration:none;
				background-color: blue;
				color:white;
				padding: 5px;
				border-radius: 10px;
			}

			#title{
				text-align: center;
				/*text-decoration:underline;*/
				font-family: tahoma;
			}

			button{
				float:right;
				background-color: purple;
				color:hotpink;
				font-size: 19px;
				border:none;
				box-shadow: 1px 1px 1px 1px white;
			}

			.link2{
				color:hotpink;
				text-decoration:none;
			}
		}

		@media(min-width:769px) and (max-width:1500px){
			body{
				background-color: maroon;
				padding: auto;
				margin: auto;
				width: auto;
			}
			#contener{
				background-color: silver;
				padding: 10%;
				margin-top:45px;
				width: auto;
				display: list-item;

			}

			.result1,.result2,.result3,.result4,.result5,.result6,.result7{
				background-color: yellow;
				margin: auto;
				padding: 7px;
				margin-bottom: 20px;
				width: 300px;
				border: 3px solid green;
				border-radius: 12px;
			}

			.link{
				text-decoration:none;
				background-color: blue;
				color:white;
				padding: 5px;
				border-radius: 10px;
			}

			#title{
				text-align: center;
				/*text-decoration:underline;*/
				font-family: tahoma;
			}

			button{
				float:right;
				background-color: purple;
				color:hotpink;
				font-size: 19px;
				border:none;
				box-shadow: 1px 1px 1px 1px white;
			}

			.link2{
				color:hotpink;
				text-decoration:none;
			}
		}
	</style>
</head>
<body>
	<div id="contener">

		<div id="title">
			<h4>KARIBU SANA NDUGU <br><br><?php echo '<p style="background-color:black;color:white;width:fit-content;margin:auto;padding:5px;">'.$uppername.'</p>'; ?><br> KATIKA SHULE YETU YA FULTON-SHEEN PRIMARY SCHOOL.</h4>

			<button type="submit">&laquo;<a class="link2" href="dash.php">Back</a></button>
		</div>
		<div class="result1">
			<p>Tazama matokeo ya wanafunzi wa daraza la kwanza hapa</p>
			<b><a class="link" href="result1.php">Fungua</a> darasa la kwanza (I)</b>
		</div>

		<div class="result2">
			<p>Tazama matokeo ya wanafunzi wa daraza la pili hapa</p>
			<b><a class="link" href="result2.php">Fungua</a> darasa la pili (II)</b>
		</div>

		<div class="result3">
			<p>Tazama matokeo ya wanafunzi wa daraza la tatu hapa</p>
			<b><a class="link" href="result3.php">Fungua</a> darasa la tatu (III)</b>
		</div>

		<div class="result4">
			<p>Tazama matokeo ya wanafunzi wa daraza la nne hapa</p>
			<b><a class="link" href="result4.php">Fungua</a> darasa la nne (IV)</b>
		</div>

		<div class="result5">
			<p>Tazama matokeo ya wanafunzi wa daraza la tano hapa</p>
			<b><a class="link" href="result5.php">Fungua</a> darasa la tano (V)</b>
		</div>

		<div class="result6">
			<p>Tazama matokeo ya wanafunzi wa daraza la sita hapa</p>
			<b><a class="link" href="result6.php">Fungua</a> darasa la sita (VI)</b>
		</div>

		<div class="result7">
			<p>Tazama matokeo ya wanafunzi wa daraza la saba hapa</p>
			<b><a class="link" href="result7.php">Fungua</a> darasa la saba (VII)</b>
		</div>
	</div>
</body>
</html>