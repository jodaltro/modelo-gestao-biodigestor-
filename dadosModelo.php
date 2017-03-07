<?php
/**
 * Created by PhpStorm.
 * User: jodal
 * Date: 06/11/2016
 * Time: 16:01
 */
class dadosModelo
{
    public $ano = 1;
    public $inflacao = 0.0;
    public $receita_energia = 0.0;
    public $custo_fixo = 0.0;
    public $custo_var = 0.0;
    public $juros = 0.0;
    public $depreciacao = 0.0;
    public $recursos_proprios = 0.0;
    public $recursos_terceiros = 0.0;
    public $custo_operacional = 0.0;
    public $irpj_csll = 0.0;
    public $lucro_bruto = 0.0;
    public $lucro_liquido = 0.0;
    public $qnt_parcelas_terceiros = 0;
    public $fluxo_caixa = 0.0;
    public $recurso_acumulado =0.0;
    public $despesa_anual =0.0;
    public $lucro_nominal =0.0;
    public $valor_presente =0.0;
    public $juro_selic =0.0;
    public $saldo_investimento = 0.0;

    public function setSalvoInvestimento($saldo_anterior)
    {
        $this->saldo_investimento = $saldo_anterior + $this->valor_presente;
    }

    public function getSaldoInvestimento()
    {
        return $this->saldo_investimento;
    }

    public function setVP()
    {
        $this->valor_presente = $this->lucro_nominal / (pow(1 + ($this->juro_selic/100),$this->ano));
    }

    public function getVP()
    {
        return $this->valor_presente;
    }

    public function setLucroNominal()
    {
        $this->lucro_nominal = $this->receita_energia - $this->despesa_anual;
    }

    public function getLucroNominal()
    {
        return $this->lucro_nominal;
    }

    public function setDespesaAnual()
    {

        if($this->ano<=$this->qnt_parcelas_terceiros)
        {
            $this->despesa_anual = $this->custo_operacional + ($this->recursos_terceiros/$this->qnt_parcelas_terceiros);
        }
        else
        {
             $this->despesa_anual = $this->custo_operacional;
        }
    }

    public function getDespesaAnual()
    {
        return $this->despesa_anual;
    }

    public function setFluxoCaixa()
    {
        if($this->ano<=$this->qnt_parcelas_terceiros)
        {
            $this->fluxo_caixa = $this->lucro_liquido - ($this->recursos_terceiros/$this->qnt_parcelas_terceiros);
        }
        else
        {
            $this->fluxo_caixa = $this->lucro_liquido;
        }
    }

    public function aplicaInflacao($valor)
    {
        return $valor + ($valor * ($this->inflacao/100));
    }
    public function setLucroBruto()
    {
        $this->lucro_bruto = $this->receita_energia-$this->custo_operacional;
    }

    public function setLucroLiquido()
    {
        $this->lucro_liquido = $this->lucro_bruto-$this->irpj_csll;
    }

    public function setCustoOperacional()
    {
        $this->custo_operacional = $this->custo_fixo+$this->custo_var+$this->juros+$this->depreciacao;
    }

    /**
     * @return float
     */
    public function getRecursoAcumulado()
    {
        return $this->recurso_acumulado;
    }

    /**
     * @param float $recurso_acumulado
     */
    public function setRecursoAcumulado($recurso_acumulado)
    {
        $this->recurso_acumulado = $recurso_acumulado;
    }


    public function setJuroSelic($juro_selic)
    {
        $this->juro_selic = $juro_selic;
    }

    /**
     * @return float
     */
    public function getFluxoCaixa()
    {
        return $this->fluxo_caixa;
    }



    /**
     * @return int
     */
    public function getQntParcelasTerceiros()
    {
        return $this->qnt_parcelas_terceiros;
    }

    /**
     * @param int $qnt_parcelas_terceiros
     */
    public function setQntParcelasTerceiros($qnt_parcelas_terceiros)
    {
        $this->qnt_parcelas_terceiros = $qnt_parcelas_terceiros;
    }

    /**
     * @return float
     */
    public function getLucroBruto()
    {
        return $this->lucro_bruto;
    }

    /**
     * @return float
     */
    public function getLucroLiquido()
    {
        return $this->lucro_liquido;
    }



    /**
     * @return float
     */
    public function getCustoOperacional()
    {
        return $this->custo_operacional;
    }

    /**
     * @return float
     */
    public function getIrpjCsll()
    {
        return $this->irpj_csll;
    }

    /**
     * @param float $irpj_csll
     */
    public function setIrpjCsll($irpj_csll)
    {
        $this->irpj_csll = $irpj_csll;
    }



    /**
     * @return mixed
     */
    public function getInflacao()
    {
        return $this->inflacao;
    }

    /**
     * @return int
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param int $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }


    /**
     * @param mixed $inflacao
     */
    public function setInflacao($inflacao)
    {
        $this->inflacao = $inflacao;
    }

    /**
     * @return float
     */
    public function getReceitaEnergia()
    {
        return $this->receita_energia;
    }

    /**
     * @param float $receita_energia
     */
    public function setReceitaEnergia($receita_energia)
    {
        $this->receita_energia = $receita_energia;
    }

    /**
     * @return float
     */
    public function getCustoFixo()
    {
        return $this->custo_fixo;
    }

    /**
     * @param float $custo_fixo
     */
    public function setCustoFixo($custo_fixo)
    {
        $this->custo_fixo = $custo_fixo;
    }

    /**
     * @return float
     */
    public function getCustoVar()
    {
        return $this->custo_var;
    }

    /**
     * @param float $custo_var
     */
    public function setCustoVar($custo_var)
    {
        $this->custo_var = $custo_var;
    }

    /**
     * @return float
     */
    public function getJuros()
    {
        return $this->juros;
    }

    /**
     * @param float $juros
     */
    public function setJuros($juros)
    {
        $this->juros = $juros;
    }

    /**
     * @return float
     */
    public function getDepreciacao()
    {
        return $this->depreciacao;
    }

    /**
     * @param float $depreciacao
     */
    public function setDepreciacao($depreciacao)
    {
        $this->depreciacao = $depreciacao;
    }

    /**
     * @return float
     */
    public function getRecursosProprios()
    {
        return $this->recursos_proprios;
    }

    /**
     * @param float $recursos_proprios
     */
    public function setRecursosProprios($recursos_proprios)
    {
        $this->recursos_proprios = $recursos_proprios;
    }

    /**
     * @return float
     */
    public function getRecursosTerceiros()
    {
        return $this->recursos_terceiros;
    }

    /**
     * @param float $recursos_terceiros
     */
    public function setRecursosTerceiros($recursos_terceiros)
    {
        $this->recursos_terceiros = $recursos_terceiros;
    }


}