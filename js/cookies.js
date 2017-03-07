/*!
@author: 0x51L3N7
@date: 19/12/2011
@note: Doesn't work on local pages with Google Chrome and Maxthon due the limitations of the same.
*/
 
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