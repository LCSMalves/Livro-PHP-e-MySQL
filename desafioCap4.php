<?php
	// 1 Faça uma pagina exiba uma saudação de acordo com o horario
	// R: Crio uma function na qual cria uma fariavel de string que recebe oq escrever no return de acordo com o horario, que é verificado com if determinando se o horario for menor ou igual a 11 retorna Bom dia, menor ou igual a 18 retorna Boa tarde e caso nenhuma das outras retorna Boa noite, sendo que no if é verificado atraves da variavel horario que recebe date("G") que seria as horas em 24h

	// 2 Faça o calendario mostrar em negrido o dia atual usando date()
	// R: Criei dendo da function calendario, a variavel hoje que recebe date("j"), que seria o dia atual, e criei um if tambem no calendario no qual, caso dia == hoje, recebe <b>"$hoje"</b>; que seria o modo de exibir qual dia é em negrito no HTML
?>

<?php 
	function linha($semana)
	{
		$linha = '<tr>';
		for ($i = 0; $i <= 6; $i++) { 
			if (array_key_exists($i, $semana)){
				$linha .= "<td>{$semana[$i]}</td>";
			} else {
				$linha .= "<td></td>";
			}
		}
		$linha .= '<tr>';

		return $linha;
	}

	function calendario()
	{
		$calendario = '';
		$dia = 1;
		$semana = [];
		$hoje = date("j");

		while ($dia <= 31) {

			if ($dia == $hoje) {
				$dia = "<b>{$hoje}</b>";
			}

			array_push($semana, $dia);

			if (count($semana) == 7) {
				$calendario .= linha($semana);
				$semana = [];
			}

			$dia++;
		}
		$calendario .= linha($semana);

		return $calendario;
	}


	function saudacao()
	{
		$saudacao = '';
		$horario = date("G");

		if ($horario <= 11){
			$saudacao = "Bom dia";
		} elseif ($horario <= 18) {
			$saudacao = "Boa tarde";
		} else {
			$saudacao = "Boa noite";
		}

		return $saudacao;
	}

?>


<p> <?php echo saudacao(); ?></p>

<table	border="1">
	<tr>
		<th>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th>Sáb</th>
	</tr>
	<?php echo calendario(); ?>
	
</table>

