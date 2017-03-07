<?php
/**
 * Created by PhpStorm.
 * User: jodal
 * Date: 06/11/2016
 * Time: 16:07
 */
require_once "dadosModelo.php";

$dado = new dadosModelo();
//$dados = new dadosModelo();
$dado->setCustoVar($_POST["custo_var"]);
$dado->setCustoFixo($_POST["custo_fixo"]);
$dado->setDepreciacao($_POST["depreciacao"]);
$dado->setInflacao($_POST["inflacao"]);
if($_POST["group1"]=="sim")
{
    $dado->setJuros($_POST["juros"]);
    $dado->setRecursosTerceiros($_POST["recursos_terceiros"]);
    $dado->setQntParcelasTerceiros($_POST["parcelas"]);
}
$dado->setReceitaEnergia($_POST["receita"]);
$dado->setRecursosProprios($_POST["recursos_proprios"]);
$dado->setCustoOperacional();
$dado->setLucroBruto();
$dado->setLucroLiquido();
$dado->setFluxoCaixa();
$dado->setRecursoAcumulado($dado->getFluxoCaixa());
$dado->setJuroSelic($_POST["desc"]);
$dado->setDespesaAnual();
$dado->setLucroNominal();
$dado->setVP();
$recursos_investido = $dado->getRecursosProprios()+$dado->getRecursosTerceiros();
$dado->setSalvoInvestimento($recursos_investido*-1);


$dados = array();
array_push($dados,$dado);
$qt_anos = $_POST["anos"];
$qt_anos -=1; 

for ($i = 1; $i <= $qt_anos; $i++)
{

    $dado = new dadosModelo();
    $aux = $i-1;
    $ano= $i+1;
    $dado->setAno($ano);
    $dado->setCustoVar($dados[$aux]->aplicaInflacao($dados[$aux]->getCustoVar()));
    $dado->setCustoFixo($dados[$aux]->aplicaInflacao($dados[$aux]->getCustoFixo()));
    $dado->setDepreciacao($_POST["depreciacao"]);
    $dado->setInflacao($_POST["inflacao"]);
    if($_POST["group1"]=="sim")
    {
        $dado->setRecursosTerceiros($_POST["recursos_terceiros"]);
        $dado->setQntParcelasTerceiros($_POST["parcelas"]);
        if($ano<=$dado->getQntParcelasTerceiros())
            $dado->setJuros($_POST["juros"]);
    }
    $dado->setReceitaEnergia($dados[$aux]->aplicaInflacao($dados[$aux]->getReceitaEnergia()));
    $dado->setRecursosProprios($_POST["recursos_proprios"]);
    $dado->setCustoOperacional();
    $dado->setLucroBruto();
    $dado->setLucroLiquido();
    $dado->setFluxoCaixa();
    $dado->setRecursoAcumulado($dados[$aux]->getRecursoAcumulado()+$dado->getFluxoCaixa());
    $dado->setJuroSelic($_POST["desc"]);
    $dado->setDespesaAnual();
    $dado->setLucroNominal();
    $dado->setVP();
    $dado->setSalvoInvestimento($dados[$aux]->getSaldoInvestimento());
    array_push($dados,$dado);
}

// begin the session
session_start();
$dados2=serialize($dados);
// put the array in a session variable
$_SESSION['animals']=$dados2;

$montantes = (string) ($dados[0]->getRecursosTerceiros()+$dados[0]->getRecursosProprios())*-1;
foreach ($dados as $dado_mostra){

    $montantes = $montantes.' '.$dado_mostra->getFluxoCaixa();
}
setcookie('montantes',$montantes);
$_SESSION['montantes']=$montantes;

// a little message to say we have done it
echo 'Putting array into a session variable';
/*

foreach ($dados3 as $dado_mostra) {
    echo "<br><br>Ano: ".$dado_mostra->getAno();
    echo "<br>Receita: ".$dado_mostra->getReceitaEnergia();
    echo "<br>C/Fixos: ".$dado_mostra->getCustoFixo();
    echo "<br>C/Variaveis: ".$dado_mostra->getCustoVar();
    echo "<br>Custo Operacional: ".$dado_mostra->getCustoOperacional();
    echo "<br>Fluxo de Caixa: ".$dado_mostra->getFluxoCaixa();
    echo "<br>Recursos totais: ".$dado_mostra->getRecursoAcumulado();
}
$dados3 = unserialize($_SESSION['animals']);


*/
if($_POST['desc']=='')
{
    header("Location: tabela.php");
}
else{
    if($_POST['desc']!='')
    {
        header("Location: resultados_adicionais.php");
    }
}




