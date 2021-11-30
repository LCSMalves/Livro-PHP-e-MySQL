<!-- 
	1 Faça uma pagina exiba uma saudação de acordo com o horario
	R: Crio uma function na qual cria uma fariavel de string que recebe oq escrever no return de acordo com o horario, que é verificado com if determinando se o horario for menor ou igual a 11 retorna Bom dia, menor ou igual a 18 retorna Boa tarde e caso nenhuma das outras retorna Boa noite, sendo que no if é verificado atraves da variavel horario que recebe date("G") que seria as horas em 24h

	2 Faça o calendario mostrar em negrido o dia atual usando date()
	R: Criei dendo da function calendario, a variavel hoje que recebe date("j"), que seria o dia atual, e criei um if tambem no calendario no qual, caso dia == hoje, recebe <b>"$hoje"</b>; que seria o modo de exibir qual dia é em negrito no HTML

	3 Adicione uma linha no topo da tabela para os dias da semana
	R: Adicionados atraves do <tr> inicial 

	4 Exiba os domingos de vermelho e os sabados em negrito
	R: Usado CSS para motificar, sendo algumas alterações npo <style> do arquivo

	5 Faça um calendario que começe em outro dia 
	R: Dia que começa o Calendario criado com base no numero do mes na function criacalendario

	6 Criar calendario do ano todo
	R: 
-->

<!DOCTYPE html>
<html>

<style>

	@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap');

	caption {
		 font-family: 'Raleway', sans-serif;
		 font-weight: bold;
	}

	th {
		font-weight: normal;
		border: 1px solid black;
	}

	td {
		border: 1px solid black;
	}


	table {
		border: 1px solid black;
		width: 400px;
		height: 70px;
	}

	.fundocinza {
		background-color:#B3AFAF;
	}

	.marcardia {
		background-color:#DFF714;
	}

	#div1 {
    display: flex;
}
</style>

<?php 

	$diaSemana = 10;

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

	function calendario($diaSemana, $mesatual)
	{ 
		
		$calendario = '';
		$dia = 1;
		$semana = [];
		$hoje = date("j");
		$contador = ($diaSemana + 6);


		if ($contador > 12) {
			$contador - 6;
		} else {
			$contador;
		}

		while ($contador >= 7) {

			$pular = " ";

			array_push($semana, $pular);

			$contador--;
		}

		while ($dia <= 31) {

			if ($mesatual == date("n")) {
				if ($dia == $hoje) {
				$dia = "<b class=marcardia>{$hoje}</b>";
			} else {
				$dia;
			}

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

	function mesatual(){
		$mes = date("M");
		return $mes;
	}

	function nomedomes($numeroDoMes) {

		if ($numeroDoMes < 2) {
			return "Jan";
		} elseif ($numeroDoMes < 3) {
			return "Fev";
		} elseif ($numeroDoMes < 4) {
			return "Mar";
		} elseif ($numeroDoMes < 5) {
			return "Abr";
		} elseif ($numeroDoMes < 6) {
			return "Mai";
		} elseif ($numeroDoMes < 7) {
			return "Jun";
		} elseif ($numeroDoMes < 8) {
			return "Jul";
		} elseif ($numeroDoMes < 9) {
			return "Ago";
		} elseif ($numeroDoMes < 10) {
			return "Set";
		} elseif ($numeroDoMes < 11) {
			return "Out";
		} elseif ($numeroDoMes < 12) {
			return "Nov";
		} elseif ($numeroDoMes < 13) {
			return "Dez";
		}
	}

	function criacalendario($qualMes) {

		$contadorParaInicioDia = $qualMes;
		$numeroMes = $qualMes;


		if ($contadorParaInicioDia <= 7) {
			$contadorParaInicioDia = $qualMes - 1;
		} elseif (date("n") > 6) {
			$contadorParaInicioDia = $qualMes - 8;
		} 

		return calendario($contadorParaInicioDia, $numeroMes);
	}


	function criaCalendarioMesAtual() {
		$qualMesEstamos = date("n");
		$criandoCalendarioMesAtual = criacalendario($qualMesEstamos);
		$qualMesEstamos = mesatual();
		return "<table>
	<caption>{$qualMesEstamos}</caption>
	<tr class=fundocinza>
		<th style=color:red;>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th><b>Sáb</b></th>
	</tr>
	{$criandoCalendarioMesAtual}
</table>";
	}

	function criaCalendarioMesEscolhido($mes) {
		
		$criandoCalendarioMesAtual = criacalendario($mes);
		$qualMes = nomedomes($mes);
		
		return "<table>
	<caption>{$qualMes}</caption>
	<tr class=fundocinza>
		<th style=color:red;>Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th><b>Sáb</b></th>
	</tr>
	{$criandoCalendarioMesAtual}
</table>";
	}

	function calendarioAnual() {
		$mes = 1;

		while ($mes <= 12) {
			criaCalendarioMesEscolhido($mes);
			$mes++;
		}
// cria um modo de como quatro messes um do lado do outro e apos continuar ate dezembro 
	}

?>


<?php 
	echo criaCalendarioMesAtual();
?>

<?php 
	echo calendarioAnual();
?>


<!--
<p> <?php echo saudacao(); ?></p>

<table	border="1">
	<caption><?php echo mesatual() ?></caption>
	<tr class="fundocinza">
		<th style="color:red;">Dom</th>
		<th>Seg</th>
		<th>Ter</th>
		<th>Qua</th>
		<th>Qui</th>
		<th>Sex</th>
		<th><b>Sáb</b></th>
	</tr>
	<?php echo criacalendario(); ?>
</table>

</html>
-->