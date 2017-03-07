

/*
 * Calcula o Valor Presente Líquido para
 * um período constante sem inversão de sinal
 *
 * @taxa => taxa de desconto
 * @montantes => vetor com os valores com os recebimentos ou pagamentos
 * -100,30,30,10,10,10,10
 */
function vpl(taxa, montantes)
{
    var ret = montantes[0];
    
    for (var i=1; i<montantes.length; i++)
        ret += montantes[i] / Math.pow( (1.0 + taxa), i);
    return ret;
}

/*
 * Calcula a Taxa Interna de Retorno
 *
 * @montantes => vetor com os valores
 */
function tir(montantes)
{	
    var ret = -1000000000.0;
    var juros_inicial = -1.0;
    var juros_medio = 0.0;
    var juros_final = 1.0;
    var vpl_inicial = 0.0;
    var vpl_final = 0.0;
    var vf = 0.0;
    var erro = 1e-5;
    
		for (var i=0; i<100; i++) {
    	vpl_inicial = vpl(juros_inicial, montantes);
      vpl_final = vpl(juros_final, montantes);
      if (sinal(vpl_inicial) != sinal(vpl_final))
      	break;
      juros_inicial -= 1.0;
      juros_final += 1.0;
    }
    var count = 0;
    for (;;) {
      // Busca por Bisseção
      var juros_medio = (juros_inicial + juros_final) / 2.0;        
      var vpl_medio = vpl(juros_medio, montantes)
        
      if (Math.abs(vpl_medio) <= erro) {
          // Resultado foi encontrado
          return juros_medio*100.0;
      }
      if (sinal(vpl_inicial) == sinal(vpl_medio)) {
      		juros_inicial = juros_medio;
          vpl_inicial = vpl(juros_medio, montantes);          
      } else {
      		juros_final = juros_medio;
          vpl_final = vpl(juros_medio, montantes);          
      }
      if (++count > 10000)
      	throw "looping inválido";
    }
    return ret;
}

function sinal(x) {
	return x < 0.0 ? -1 : 1;
}



function calcula()
{
	cookie = new Cookie;
	if (cookie.get( 'montantes') ) 
    {
    	montantes_campo = cookie.get( 'montantes' )
	    var taxa_campo = document.getElementById('desc');
	    var result_vpl_campo = document.getElementById('result_vpl');
      var result_tir_campo = document.getElementById('result_tir');
	   // var result_payback_simples = document.getElementById('result_pay_s');
	    var taxa = 0.0;
	    var montantes = [];
	    var sinal_inicio = 0;

	    
	    taxa = parseFloat(taxa_campo.value);

	    if (montantes_campo.value == "") {
	        alert("Montantes não pode ser nulo.");
	        return;
	    }
	    montantes = montantes_campo.split('+').map(parseFloat);
	    if (montantes.length < 2) {
	        alert("Número insuficientes de montantes.");
	        return;    
	    }
	    if (true) {
        console.log(taxa);
        taxa = taxa/100;
        console.log(taxa);
        //result_payback_simples.value = ((montantes[0]/montantes[1])*-1).toFixed(2);
	    	result_vpl_campo.value = vpl(taxa, montantes).toFixed(2);
	    	result_tir_campo.value = tir(montantes).toFixed(2);
	    }
	    // Chama as funções para cálculos
	}
	else
	{
		console.log("buuuuuu");
	}
}


function Cookie() {
        var expire = new Date();
               
        /*! Create and modify cookies
        * @param: {string} Cookie name
        * @param: {string|number|boolean} Cookie value
        * @param: {number} Expiration date of cookie (In milliseconds).
        */
        this.set = function( name, value, expirationDate ) {
                if ( !( name && value ) ) return;
                expire.setTime( expire.getTime() + expirationDate );
                document.cookie = name + '=' + value + ( !expirationDate ? '' : ';expires=' + expire.toUTCString() );
        }
               
        /*! Gets cookie value
        * @param: {string} Cookie name
        * Returns false if the cookie doesn't exist.
        */
        this.get = function( name ) {
                for ( i in j = document.cookie.split( ';' ) )
                        if ( j[i].indexOf( name + '=' ) > -1 )
                                return j[i].substr( j[i].indexOf( '=' ) + 1, this.length );                                            
                return false;
        }
               
        /*! Deletes the cookie
        * @param: {string} Cookie name
        */
        this.exclude = function( name ) {
                this.set( name, this.get( name ), 1 );
        }
}

window.calcula = calcula;


