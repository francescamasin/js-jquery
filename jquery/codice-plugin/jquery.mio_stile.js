
/*----------Serve per creare per le variabili un ambiente protetto all'interno di funzioni anonime----------(function($){ ... })(jQuery);
per evitare che il simbolo $ vada in conflitto con altri plugin basta passarlo come parametro alla fuznione anonima creata----------*/

(function($){

    $.fn.stileColore = function(opzioni){

        /*$(this).css({
            color: opzioni.color,
            backgroundColor: opzioni.background
        });*/

        /* Metodo extend, andiamo ad estendere lo stile rispetto a quello che è già stato impostato */
        var parametri = $.extend({
            color: '#6f84ff',
            background: null //Si può mettere il colore che si vuole, con null prendere il valore di default che è bianco
        }, opzioni);
        
        $(this).css({
            color: parametri.color,
            backgroundColor: parametri.background
        });
    };
    

})(jQuery);

    





