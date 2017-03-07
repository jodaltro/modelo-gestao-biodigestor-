
<?php include "cabecalho.php"; 

function fazLinha($funcao, $dados3)
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
            $cor = 'transparent';
        }
            # code...

        if ($funcao == 'getAno') { ?>
        <td style="background-color :  <?= $cor?> !important;"><b>Ano <?=$dado_mostra->$funcao()?></b></td>
        <?php
    }
    else
        { ?>
    <td allowtransparency="true"  style="background-color :  <?= $cor?> !important;"><?=number_format($dado_mostra->$funcao(), 2, ',', '.')?></td>
    <?php 
}


?>
<?php endforeach;?>
<?php 
} ?> 
<!DOCTYPE html>
<html>
<script type="text/javascript">
</script>
<body class="fundo-tabela">
    <table  class=" table table-bordered table-responsive nopadding"  id="atabela" 
    allowtransparency="true" style=" overflow: auto;  font-size: 70%; " >
    <?php
    //echo (53971.44845 / (pow((1 + 0.1405),5)));
    if(isset($_SESSION['animals'])) {
        $dados3 = unserialize($_SESSION['animals']);
        /*
        $montantes = (string) ($dados3[0]->getRecursosTerceiros()+$dados3[0]->getRecursosProprios())*-1;
        echo $montantes;
        foreach ($dados3 as $dado_mostra){

            $montantes = $montantes.','.$dado_mostra->getFluxoCaixa();
        }
        echo '<br>'.$montantes; */

        ?> <tr>
        <th >DRE</th>
        <?php fazLinha('getAno',$dados3); ?>
    </tr >
    <tr >
        <th>Receita com energia elétrica</th>
        <?php fazLinha('getReceitaEnergia',$dados3); ?>
    </tr>
    <tr>
        <th>Custos Fixo Com Biodigestor</th>
        <?php fazLinha('getCustoFixo',$dados3); ?>
    </tr>
    <tr>
        <th>Custos Variáveis</th>
        <?php fazLinha('getCustoVar',$dados3); ?>
    </tr>
    <?php 
    if ($dados3[0]->getRecursosTerceiros() != 0) : ?>
    <tr>
        <th>Juros sobre Financiamento</th>
        <?php fazLinha('getJuros',$dados3); ?>
    </tr>
<?php endif ?>
<tr>
    <th>Depreciação</th>
    <?php fazLinha('getDepreciacao',$dados3); ?>
</tr>
<tr>
    <th>Custo Operacional</th>
    <?php fazLinha('getCustoOperacional',$dados3); ?>
</tr>
<tr>
    <th>Lucro</th>
    <?php fazLinha('getLucroLiquido',$dados3); ?>
</tr>
<tr>
    <th >Fluxo de Caixa do Empreendimento</th>
    <?php fazLinha('getFluxoCaixa',$dados3); ?>
</tr>
<tr>
    <th>Recursos Acumulados</th>
    <?php fazLinha('getRecursoAcumulado',$dados3); ?>
</tr>
<?php }?>
</table>
</body>
</html>