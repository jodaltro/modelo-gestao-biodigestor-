<?php include "cabecalho.php"; 

if(isset($_SESSION['animals'])) {
	$dados3 = unserialize($_SESSION['animals']);
	$saldo= 0.0;
	$vp_certo = 0.0;
	$ano = 0.0;
	$flag = 0;
	foreach ($dados3 as $dado_mostra){
		if($dado_mostra->getSaldoInvestimento()<0)
		{
			$saldo = $dado_mostra->getSaldoInvestimento();
			$ano = $dado_mostra->getAno();
		}
		else
		{
			if($flag == 0)
			{
				$vp_certo = $dado_mostra->getVP();
				$flag = 1;
			}
		}
	}
	$payback_descontado = $saldo * (1/ $vp_certo);
	$payback_descontado =($payback_descontado*-1) + $ano; 
	$investimentoTotal = ($dados3[0]->getRecursosTerceiros() + $dados3[0]->getRecursosProprios())*-1;
	$payback_simples = $investimentoTotal/$dados3[0]->getFluxoCaixa();
	$payback_simples *= -1; 
	$payback_simples = bcdiv($payback_simples, 1,2);
	$payback_descontado = bcdiv($payback_descontado, 1,2);
	?>
	<body style="background-color: transparent;">
	<label for="result_pay_s">Payback Simples:</label>
	<input type="number"  id="result_pay_s" value="<?=$payback_simples?>" style="width: 13%; height: 10%;; text-align: center; font-size: 100%" readonly="true">
	<br>
	<label for="result_pay_d">Payback Descontado:</label>
	<input type="number"  id="result_pay_d" value="<?=$payback_descontado?>" style="width: 27%; height: 10%; text-align: center; font-size: 100%" readonly="true">
	</body>
	<?php } ?>