// Capitulo 3
<p>
	<?php
		echo "Hoje é dia " . date('d/m/Y');
		echo " agora são " . date('H:i:S');
	?>
</p>
<p>
	<?php
		// 1. Na função date(), experimente mudar o Y para y. O que acontece?

		echo date('d:m:y')
	
		// R: Muda o ano, com o Y mostra o ano completo, o y mostra os dois ultimos digitos
	?>
</p>
<p>
	<?php 
		// 2. Voce consegue exibir a hora no formato de 12 horas, A.M. e P.M.?

		echo "A.M. " . date('H:i:s');
		echo " P.M. " . date('h:i:s');

		// R: Mudando o H para h muda de 24h para 12h, e o s minusculo para mostrar os segundos 
	?>
</p>
<p>
	<?php 
		// 3. E se você tivesse que exibir o dia da semana em formato numérico, como 1 para segunda, 2 para terça etc.? Como faria?

		echo "Hoje é dia " . date('N/m/Y');

		// R: Alterando o d que mostra o dia do mês para N que mostra o dia da semana começando por 1 para segunda ate 7 para domingo
	?>
</p>
<p>
	<?php
		// 4. Exiba quantos dias faltam para o proximo sabado.
		
		echo " Faltam " . 6 - date('w') . " dias para o sabado";
		
		// R: porem não funciona com o domingo.
	?>
</p>
<p>
	<?php
		// 5. Exiba o nome do mês atual

		echo "O mês atual é " . date('F');

		// R: Utilizando o F dentro de date('')
	?>
</p>