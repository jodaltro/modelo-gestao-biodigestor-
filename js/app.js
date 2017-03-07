$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

function resizeIframe(iframe) {

    cookie = new Cookie;
    montantes_campo = cookie.get( 'montantes' );
    var montantes = [];
    montantes = montantes_campo.split('+').map(parseFloat);
    //iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    if(montantes.length>=10)
    {
        iframe.style = 'display: block';
        iframe.width = "100%"; 
        iframe.height = (iframe.contentWindow.document.body.scrollHeight-15) + "px"; 
    }
    else{
        iframe.width = (montantes.length)+"5%"; 
        iframe.height = (iframe.contentWindow.document.body.scrollHeight-(montantes.length*2)) + "px";  
    }
  }

$(document).ready(function() {
    $("input[name$='group1']").click(function() {
        var test = $(this).val();
        if (test=="sim") 
        {
        	$("#terceiros").slideDown();
        }
        else
        {
        	$("#terceiros").slideUp();
        }
    });

});

$(document).keyup(function() {
  if (document.getElementById("desc").value == '') 
    {

        document.getElementById("payback").disabled = true;
    }
    else
    {
        document.getElementById("payback").disabled = false;
    }
});

$("#voltar").click(function() {
  document.getElementById("marg").style = 'margin-top: 2em;width: 66%';
  document.getElementById("desc").value = '';
  document.getElementById("img1").style = 'height: auto;width: auto; max-height: auto;';
  document.getElementById("img2").style = 'height: auto;width: auto; max-height: auto;';
  document.getElementById("img3").style = 'height: auto;width: auto; max-height: auto;';
});

$("#simular").click(function() {
  document.getElementById("marg").style = 'margin-top: 0em; ';
  document.getElementById("img1").style = 'height: auto;width: 100%; max-height: 250px;';
  document.getElementById("img2").style = 'height: auto;width: 100%; max-height: 250px;';
  document.getElementById("img3").style = 'height: auto;width: 100%; max-height: 250px;';
});


function mostra(mostra)
{
    $('#'+mostra).show('slow');
}

function some(some)
{
    $('#'+some).hide('slow');
}

function mostra_some(mostra,some)
{
    $('#'+some).hide('slow');
    $('#'+mostra).show('fast');
}

function goToByScroll(id,extra){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: ($("#"+id).offset().top)-extra},
        'slow');
}

function mskDigitos(v){
    v=v.replace(/\D/g,"")  
    v=v.replace(/(\d)(\d{1,3}$)/,"$1.$2")  
    return v
}



function atualiza(){
 $.get('dadosControle.php', function(resultado){
    $('#conteudo').html(resultado);
})
 setTimeout('atualiza()', 3000);
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