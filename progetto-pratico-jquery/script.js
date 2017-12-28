$(document).ready(function() {

  //richiamare il file JSON
  $.ajax('https://francescamasin.github.io/HTML5-CSS3/gallerygatti.json', {
     dataType: 'json',

  })

  .done(function(response){
    console.log(response);

    var html;
    $.each(response, function(index, element){

  //creiamo con jQuery la struttura html
html+= '<div>'
      html = '<div class="item-box" data-id="'+element.id+'">'
      html += '<img src="immagini/'+element.foto+'" />';
      html += 'Nome: ' + '<span class="item-title">'+element.nome+'</span>' + '<br>';
      html += 'Razza: ' + '<span class="item-razza">'+element.razza+'</span>' + '<br>';
      html += 'Note: ' +  '<div class="item-info">'+element.descrizione+'</div>';
      html += '<div class="toggle"><a href="#" class="info-link">Dettagli</a></div>';
      html += '<div class="more-info"><p>'+element.moreInfo+'</p></div>';
html += '</div>';

      $('.container').append(html);
    });
  });

  //bottone toggle
  $('body').on('click', '.info-link', function() {
  
      $(this).closest('.item-box').find('.more-info').slideToggle();
  });
});
