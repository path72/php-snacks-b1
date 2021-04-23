<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		:root {
			--realwhite	: #fafafa;
			--white		: #eaeaea;
			--black		: #3c3c3c;
			--purple	: #b91450;
			--yellow	: #ffff80;
		}
		body {
			display: flex;
			font-family: 'Roboto', sans-serif;
			background-color: var(--white);
			color: var(--black);
		}
		.card {
			margin: 15px 15px 30px;
			padding: 30px 50px;
			border-radius: 15px;
			background-color: var(--realwhite);
			box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
		}
		td {
			padding: 3px 10px;
		}
		td:last-child {
			text-align: right;
			border-left: 1px solid grey;
		}
		.high {
			color: var(--purple);
		}
	</style>
	<title>php-snacks-b1</title>
</head>
<body>

	<?php
		// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		/*
			Snack 1
			Creiamo un array contenente le partite di basket di un’ipotetica tappa del calendario. 
			Ogni array avrà 
				una squadra di casa e 
				una squadra ospite, 
				punti fatti dalla squadra di casa e 
				punti fatti dalla squadra ospite. 
			Stampiamo a schermo tutte le partite con questo schema.
				Olimpia Milano - Cantù | 55-60
		*/

		$basket_matches = [
			[
				'home'        => 'VL Pesaro',
				'home_score'  => 101,
				'guest'       => 'Olimpia Milano',
				'guest_score' => 111,
			],
			[
				'home'        => 'Dinamo Sassari',
				'home_score'  => 102,
				'guest'       => 'Trento',
				'guest_score' => 112,
			],
			[
				'home'        => 'Virtus Bologna',
				'home_score'  => 97,
				'guest'       => 'Universo Treviso',
				'guest_score' => 68,
			],
			[
				'home'        => 'Varese',
				'home_score'  => 104,
				'guest'       => 'Trieste',
				'guest_score' => 114,
			],
			[
				'home'        => 'Cremona',
				'home_score'  => 105,
				'guest'       => 'Brescia',
				'guest_score' => 115,
			],
		];
		// var_dump($basket_matches);

		echo '<table class="card">';
		for ($i=0; $i<count($basket_matches); $i++) {
			
			$opponents = $basket_matches[$i]['home'].' - '.$basket_matches[$i]['guest'];
			$score     = $basket_matches[$i]['home_score'].'-'.$basket_matches[$i]['guest_score'].'<br>';
			
			echo '<tr><td>'.$opponents.'</td><td>'.$score.'</td></tr>';

		}
		echo '</table>';

	?>

	<?php
		// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		/*		
			Snack 2
			Passare come parametri GET 
				name, mail e age 
			e verificare (cercando i metodi che non conosciamo nella documentazione) 
				che name sia più lungo di 3 caratteri, 
				che mail contenga un punto e una chiocciola e 
				che age sia un numero. 
			Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”.
		*/

		$data = [
			'name' => $_GET['name'],
			'mail' => $_GET['mail'],
			'age'  => $_GET['age']
		];
		// var_dump($data);

		echo '<div class="card">';

		echo 'name='.$data['name'].'<br>';
		echo 'mail='.$data['mail'].'<br>';
		echo 'age='.$data['age'].'<br><br>';

		if (!$data['name'] && !$data['mail'] && !$data['age']) {

			echo 'Non hai inserito nessuno dei parametri in GET<br><br>';

		} else {

			if ($data['name']) {
				$name = getHighHtml($data['name']);
				if (strlen($data['name']) > 3) {
					echo $name.' è più lungo di 3 caratteri<br><br>';
					$flag_name = true;
				} else {
					echo $name.' non è più lungo di 3 caratteri<br><br>';
				}
			}else {
				echo 'manca il parametro name<br><br>';
			}
			
			if ($data['mail']) {
				$mail = getHighHtml($data['mail']);
				if (strpos($data['mail'],'.') && strpos($data['mail'],'@')) {
					echo $mail.' contiene . e @<br><br>';
					$flag_mail = true;
				} else {
					echo $mail.' non contiene . e @<br><br>';
				}		
			} else {
				echo 'manca il parametro mail<br><br>';
			}

			if ($data['age']) {
				$age = getHighHtml($data['age']);
				if (is_numeric($data['age'])) {
					echo $age.' è un numero<br><br>';
					$flag_age = true;
				} else {
					echo $age.' non è un numero<br><br>';
				}
			}else {
				echo 'manca il parametro age<br><br>';
			}
		}
	
		if ($flag_name && $flag_mail && $flag_age) {
			echo 'Accesso consentito';
		} else {
			echo 'Accesso non consentito';
		}

		echo '</div>';
		
		function getHighHtml($string) {
			return '<em class="high">'.$string.'</em>';
		}
	?>

</body>
</html>