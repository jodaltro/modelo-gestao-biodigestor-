
<?php include "cabecalho.php"; 

public function fazLinha($funcao)
{
    $flag = 0;
        foreach ($dados3 as $dado_mostra):  
        if((($dado_mostra->getRecursosProprios()+$dado_mostra->getRecursosTerceiros())<$dado_mostra->getRecursoAcumulado())
            && $flag == 0)
        {
            $flag = 1;
            $cor = '#f7ffaf ';
        }
        else
        {
            $cor = 'white';
        }

        ?>
        <td style="background: <?= $cor?> !important;"><b>Ano <?=$dado_mostra->$funcao()?></b></td>
}

?> 
<table  class=" table table-bordered table-responsive " style=" overflow: auto;  font-size: 70%;" >

<?php
if(isset($_SESSION['animals'])) {
    $dados3 = unserialize($_SESSION['animals']);
    ?> <tr>
    <th >DRE</th>
    <?php

        foreach ($dados3 as $dado_mostra):  
        if((($dado_mostra->getRecursosProprios()+$dado_mostra->getRecursosTerceiros())<$dado_mostra->getRecursoAcumulado())
            && $flag == 0)
        {
            $flag = 1;
            $cor = '#f7ffaf ';
        }
        else
        {
            $cor = 'white';
        }
        ?>
      <td style="background: <?= $cor?> !important;"><b>Ano <?=$dado_mostra->getAno()?></b></td>
  <?php endforeach;?>
  </tr >
  <tr >
    <th>Receita com energia elétrica</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td style="background: <?= $cor?> !important;"><?= $dado_mostra->getReceitaEnergia()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Custos Fixo Com Biodigestor</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getCustoFixo()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Custos Variáveis</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getCustoVar()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Juros sobre Financiamento</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getJuros()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Depreciação</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getDepreciacao()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Custo Operacional</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getCustoOperacional()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Lucro</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getLucroLiquido()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th "table-sm">Fluxo de Caixa do Empreendimento</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getFluxoCaixa()?></td>
    <?php endforeach;?>
</tr>
<tr>
    <th>Recursos Acumulados</th>
    <?php foreach ($dados3 as $dado_mostra):  ?>
        <td><?= $dado_mostra->getRecursoAcumulado()?></td>
    <?php endforeach;?>
</tr>

<?php }?>

</table>
