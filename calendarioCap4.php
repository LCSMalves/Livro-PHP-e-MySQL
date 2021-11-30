<?php 
	
	//criando função, quando desejo que a função receba de outro maneira que não seja declarando dentro da função, uma variavel, nesse caso um array, declaro ele no () da função, fazendo assim, quando chamo o linha() no calendario(), eu ja envio o $semana que foi gerado no processo do calendario()

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
		while ($dia <= 31) {
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
?>



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