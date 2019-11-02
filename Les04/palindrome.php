<?php
// 2. Дано слово, состоящее только из строчных латинских букв. Проверить, является ли это слово палиндромом. 
// При решении этой задачи нельзя пользоваться циклами.

// Палиндро́м (от др.-греч. πάλιν — «назад, снова» и др.-греч. δρóμος — «бег, движение»), пе́ревертень[1] — число, буквосочетание, слово или текст, одинаково читающееся в обоих направлениях. Например, число 101; слова «топот» в русском языке и фин. saippuakivikauppias (продавец мыла; торговец щёлоком) — самое длинное слово-палиндром в мире; текст «а роза упала на лапу Азора» и пр.

// Другое название — палиндро́мон (от др.-греч. πᾰλίν-δρομος— движущийся обратно, возвращающийся[2][3]).

// Иногда палиндромом называют любой симметричный относительно своей середины набор символов[4][5]. 

	$check_palindrome ='';

	if (isset($_POST['check_palindrome'])) {
	$check_palindrome = (string) $_POST['check_palindrome'];
	}

	function checking_for_palindrome($check_palindrome)
	{
		if ($check_palindrome != null) {
			$l = strlen($check_palindrome);
			Check($check_palindrome, $l);
		}
	}

	function Check($check_palindrome, $l)
	{
		if ($l > 0 && $check_palindrome[$l-1] !== $check_palindrome[$l*(-1)]) 
		{
			return print "Не палиндром!";
		} 
		elseif ($l > 0) 
		{
			return Check($check_palindrome, $l-1);
		}
		return print "Палиндром!";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GB_Palindrome</title>
</head>
<body>
	
	<form action="#" method="post">
		<div align="center">
			<p>

				<label for="check_palindrome">Проверка на палиндром.</label>
				<br>
				<label for="check_palindrome">Введите число:</label>
				<br>
				<br>
				<input type="text" name="check_palindrome" id="check_palindrome" value="<?php echo $check_palindrome; ?>" tabindex="1" placeholder="<?php echo $check_palindrome; ?>" style="width: 15%;"/>
				<br>
				<br>
				<input type="submit" value="Выполнить" style="float: right; margin: 0 50%;"/>
			</p>
		</div>

	<br>

		<div style="width: 200px; margin: 0 auto;">
			<p>
				<?php echo checking_for_palindrome($check_palindrome); ?>
			</p>
		</div>
		
	</form>

</body>
</html>