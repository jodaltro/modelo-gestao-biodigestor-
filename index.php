<?php include "cabecalho.php"; ?>
<body class="fundo">
    <div class="container-fluid " style="padding-left: 1em;">
        <div class="row">
            <div class="col-md-12 navbar-fixed-top fundo-header"  >
                <h1 style="text-align: center; padding: 1px;
                font-size: 32pt; "><b>Modelo de Gestão</b></h1>

            </div>
        </div>
        <div class="row" style="margin-top: 4.2em">
            <!--Second column-->
            <div class="col-md-4 offset-0 ">

                <!--Form-->
                <form action="dadosControle.php" method="post"   class="form-inline " >
                    <div class="card wow fadeInRight  " id="frame1" style="display: table-row;">
                        <div class="card-block  fundo-form">
                            <!--Body-->
                            <div class="md-form">
                                <input type='number'  step=0.01 min=0 name="inflacao" id="form6" required>
                                <label for="form6">Inflação (IPCA)%</label>
                            </div>

                            <div class="md-form">
                                <input type='number'   step=0.01 min=0 name="receita" id="form5" required>
                                <label for="form5">Receita com Energia Elétrica</label>
                            </div>

                            <div class="md-form">
                                <input type="number"  id="form1"  step="0.01" min="0" name="custo_fixo" required>
                                <label for="form1">Custos fixos com Biodigestor</label>
                            </div>
                            <div class="md-form">
                                <input type="number" id="form2"  step="0.01" min="0" name="custo_var" required>
                                <label for="form2">Custos Variáveis</label>
                            </div>
                            <div class="md-form">
                                <input type="number"  id="form3"  step="0.01" min="0" name="depreciacao" required>
                                <label for="form3">Depreciação</label>
                            </div>
                            <div class="md-form">
                                <input type="number"  id="form4"  step="0.01" min="0" name="recursos_proprios" required>
                                <label for="form4">Investimento com Recurso Próprio</label>
                            </div>

                            <span>Investimento com Recurso de Terceiros?</span>
                            <br>
                            <fieldset class="form-group">
                                <input name="group1" onclick="goToByScroll('anos',100)" type="radio" class="with-gap" value="sim"  id="radio11" required >
                                <label for="radio11">Sim</label>
                            </fieldset>
                            <fieldset class="form-group" >
                                <input name="group1" onclick="goToByScroll('frame1',100)"  value="nao" type="radio" class="with-gap" id="radio2">
                                <label for="radio2">Não</label>
                            </fieldset>
                            <div id="terceiros" class="sim_nao" style="display: none">
                                <div class="md-form" style="margin-top: 0.5em">
                                    <input type="number"  id="form7"  step="0.01" min="0" name="recursos_terceiros">
                                    <label for="form7">Valor</label>
                                </div>
                                <div class="md-form">
                                    <input type="number"  id="form8"  step="0.01" min="0" name="juros">
                                    <label for="form8">Juros Sobre Financiamento</label>
                                </div>
                                <div class="md-form">
                                    <input type="number"  id="form9" min="0" name="parcelas">
                                    <label for="form9">Número de Parcelas</label>
                                </div>
                            </div>

                            <hr>
                            <div class="md-form">
                                Quantidades de anos à simular:
                                <input type="number" style="width: 20%" value="" min="0" name="anos" id="anos" required>
                            </div>
                            <div class="text-xs-center">
                                <button type="submit" formtarget="meuiframe" id="simular" onclick="goToByScroll('fame',50); mostra_some('frame2','frame1'); mostra('fame'); mostra('row')" class="btn btn-default btn-lg">Simular</button>
                                <button type="reset" onclick="some('terceiros')" class="btn btn-outline-default  waves-effect  btn-sm">Limpar</button>
                            </div>
                        </div>
                    </div>
                    <!--/.Form-->

                    <!--Segundo Form-->
                    <div  class="card"  id="frame2" style="display: none;">
                        <div class="card wow fadeInRight">
                            <div class="card-block fundo-form">
                                <!--Header-->
                                <div class="text-xs-center">
                                    <h4><i class=""></i> Mais resultados:</h4>
                                    <hr>
                                </div>
                                <div style="text-align: center">
                                    <label for="desc">Para mais informações, informe uma taxa de desconto:</label>
                                    <input  type='number' value="" style="width: 30%; height: 10%; text-align: center; "  step=0.01 min=0 name="desc" placeholder="Ex:SELIC" id="desc" >

                                    <hr>
                                    <div id="maisinfo" style="display: none">
                                        <label for="result_vpl">VPL:</label>
                                        <input type="number"  id="result_vpl" style="width: 27%; height: 10%; margin-right: 10%; text-align: center; font-size: 90%" readonly="true">
                                        <label for="result_tir">TIR:</label>
                                        <input type="number" id="result_tir" style="width: 15%;height: 10%; text-align: center; font-size: 90%" readonly="true">%
                                    </div>
                                    <br>
                                    <iframe  name="meuiframe2" id="adicionais"  style="width: 100%; display: none; margin-bottom: -100px; background-color: transparent;" frameborder="0"> </iframe>
                                    <div class="text-xs-center">
                                        <button type="submit" formtarget="meuiframe2" id="payback" disabled="true"  onclick="mostra('adicionais');mostra('maisinfo');calcula();" class="btn btn-default btn-lg">Mais Informações</button>
                                    </div>
                                    <div class="text-xs-left">
                                        <button type="button" id="voltar" onclick="mostra_some('frame1','frame2'); some('fame'); some('row');some('maisinfo');some('adicionais')" class="btn btn-default btn-sm">Voltar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="row " id="row" style="display: none; ">
                    <div class="col-md-12" style="font-size: 80%; ">

                        <div class="card-group">
                            <div class="card" style="background-image: url('img/bg2.png')">
                                <div class="card-block">
                                    <h4 class="card-title">Fluxo de Caixa</h4>
                                    <p class="card-text">
                                        <dl class="dl-horizontal">
                                            <dd>
                                                Chamamos de fluxo de caixa as entradas e saídas de recursos financeiros ou dinheiro, em um determinado período de tempo.
                                            </dd>
                                            <dt style="text-align: center; font-size: 110%">Valor Presente Líquido(VPL):</dt>
                                            <dd>Se o VPL for positivo, logo o projeto é viável.</dd>
                                            <dt style="text-align: center; font-size: 110%">Taxa Interna de Retorno(TIR):</dt>
                                            <dd>É a taxa necessária para igualar o valor de um investimento (valor presente) com os seus respectivos retornos futuros ou saldos de caixa. Sendo usada em análise de investimentos significa a taxa de retorno de um projeto.</dd>
                                        </dl>
                                    </p>
                                </div>
                            </div>
                            <div class="card" style="background-image: url('img/bg2.png')">
                                <div class="card-block">
                                    <h4 class="card-title">Payback</h4>
                                    <p class="card-text">
                                        <dl class="dl-horizontal">
                                            <dt style="text-align: center; font-size: 120%">Payback Simples</dt>
                                            <dt>Vantagens: </dt>
                                            <dd>Simplicidade e rapidez;
                                                É uma medida de risco do investimento, pois quanto menor o período de payback, mais líquido é o investimento e, portanto menos arriscado.
                                            </dd>
                                            <dt>Desvantagens: </dt>
                                            <dd>
                                                Não considera o valor do dinheiro no tempo;
                                                Não considera os fluxos de caixa após o período de payback;
                                                Não leva em conta o custo de capital da empresa.
                                            </dd>
                                            <dt style="text-align: center; font-size: 120%">Payback Descontado</dt>
                                            <dd>
                                                Este método é semelhante ao payback simples, mas com o adicional de usar uma taxa de desconto antes de se proceder à soma dos fluxos de caixa. Em geral esta taxa de desconto será a TMA.
                                            </dd>
                                            <dt>Vantagens</dt>
                                            <dd>
                                                Continua simples e prático, como o payback simples;
                                                Resolve o problema de não considerar o valor do dinheiro no tempo.
                                            </dd>
                                            <dt>Desvantagens</dt>
                                            <dd>
                                                Apesar de considerar uma taxa de desconto, continua sem levar em conta os fluxos de caixa após o período de payback.
                                            </dd>
                                        </dl>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Second column-->
            <div class="col-md-8 nopadding " >

                <iframe  name="meuiframe" class="embed-responsive-item" onload="resizeIframe(this)" id="fame"  style=" vertical-align:bottom; display: none" allowtransparency="true"  frameborder="0"> </iframe>
            </div>


            <div class="col-md-8 nopadding" id="marg" style="margin-top: 2em; width: 66%">

                <!--Carousel Wrapper-->
                <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-2" data-slide-to="1"></li>
                        <li data-target="#carousel-example-2" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <!--Mask color-->
                            <div class="view hm-black-light">
                                <img id="img1" src="img/card1.jpg" class="img-fluid" alt="" style="">
                                <div class="full-bg-img">
                                </div>
                            </div>
                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h3 class="h3-responsive"><u>Sobre</u></h3>
                                    <p>O Modelo de Gestão traz a possibilidade de realizar simulações quanto ao uso de um biodigestor em uma propriedade rural.</p>
                                </div>
                            </div>
                            <!--Caption-->
                        </div>
                        <!--/First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">
                            <!--Mask color-->
                            <div class="view hm-black-light">
                                <img id="img2" src="img/card2.jpg" class="img-fluid" alt="">
                                <div class="full-bg-img">
                                </div>
                            </div>
                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h3 class="h3-responsive"><u>Biodigestor</u></h3>
                                    <p>Biodigestor é um equipamento que possibilita o reaproveitamento de dejetos para gerar biogás e biofertilizantes.</p>
                                </div>
                            </div>
                            <!--Caption-->
                        </div>
                        <!--/Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item">
                            <!--Mask color-->
                            <div class="view hm-black-slight">
                                <img id="img3" src=" img/card3.jpg" class="img-fluid" alt="">
                                <div class="full-bg-img">
                                </div>
                            </div>
                            <!--Caption-->
                            <div class="carousel-caption">
                                <div class="animated fadeInDown">
                                    <h3 class="h3-responsive"><u>Benefícios da Utilização do Modelo de Gestão</u></h3>
                                    <p>Possibilita ao investidor perceber o retorno financeiro e avaliar sé é enconomicamente viável.
                                        Incluindo assim itens como: economia, sustentabilidade e responbilidade social</p>
                                    </div>
                                </div>
                                <!--Caption-->
                            </div>
                            <!--/Third slide-->
                        </div>
                        <!--/.Slides-->

                        <!--Controls-->
                        <a class="left carousel-control" href="#carousel-example-2" role="button" data-slide="prev">
                            <span class="icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-2" role="button" data-slide="next">
                            <span class="icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Proxima</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->

                    <!--FIM DA DIV DAS INFOS-->
                </div>
            </div>
            <div class="row fundo-tabela" style="margin-top: 0.4em">
                <div class="col-md-1 ">
                    <div class="porco" style="height: 70px">
                    </div>
                </div>
                <div class="col-md-10 nopadding " style="text-align: center" >
                    <footer style="font-size: 70%; margin-top: 10px; background-color: transparent;">
                        <b>Idealizado por Patricia Bellé Diel
                            <br>
                            Orientador: Antônio Vanderlei dos Santos /
                            Co-orientadora: Vanusa Andrea Casarin</b>
                            <br>
                            <b>Desenvolvido por Jodaltro Ricco Cardoso</b>
                        </footer>
                    </div>

                    <div class="col-md-1">
                        <div class="porco" style="height: 70px">
                        </div>
                    </div>
                </div>


            </div>




            <!-- SCRIPTS -->
            <script type="text/javascript" src="js/jquery.mask.min.js"></script>
            <!-- JQuery -->
            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/tether.min.js"></script>

            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>

            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="js/mdb.min.js"></script>

            <script type="text/javascript" src="js/app.js"></script>

            <script type="text/javascript" src="resultados_adicionais.js"></script>
        </body>



        </html>