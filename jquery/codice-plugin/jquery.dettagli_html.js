/*----------Serve per creare per le variabili un ambiente protetto all'interno di funzioni anonime----------(function($){ ... })(jQuery);
per evitare che il simbolo $ vada in conflitto con altri plugin basta passarlo come parametro alla fuznione anonima creata----------*/

(function($){

    /*fn = function -----------METODO DETTAGLI----------*/
    $.fn.dettagli = function(){
        
        // return this.attr('id');
        //alert('ID di questo elemento è: ' + this.attr('id'));

        this.append('<p class="info">ID di questo elemento è: ' + $(this).attr("id") + '</p>');
        $('.info').slideUp(6000);
        return this;
    };
       

      
    /*-----------METODO ELEMENTO----------*/
    $.fn.elemento = function(){
            /* Prop metodo di controllo sui tag */
         alert('L\' elemento cliccato è un tag HTML di tipo: ' + this.prop('tagName').toLowerCase());
         return this;
    };


})(jQuery);



