<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title></title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style>
    table {
border-collapse:collapse; 
mso-table-lspace:0pt;
mso-table-rspace:0pt;
}

    table tr th,
    table tr td{
padding: 5px 10px;
border: 1px solid #ccc;
}
div{padding-bottom: 10px;}
  </style>
</head>
<body>
<div class="container"></div>

    <script>
    $(document).ready(function() {

    $.getJSON( "pami.json", function( data ) {
        var items = '';
        var referente = '';
        var ruolo = '';
        var mail_personale = '';
        items = "<h3>AZIENDA</h3><table><tr><th>NOME</th><th>SETTORE</th><th>REFERENTE</th><th>RUOLO</th><th>EMAIL</th><th>NOTE EMAIL</th>"+
            "<th>TEL PERSONALE</th><th>LINKEDIN</th><th>LINKEDIN GIULIA</th><th>LINKEDIN EVY</th><th>SITO</th><th>SEDE</th><th>DETTAGLI AZIENDA</th><th>NOTE</th></tr>";

        $.each( data, function() {
            $.each( data._embedded.azienda, function() {
                $.each( this._embedded.comunicatori, function() {
                    referente += "<div>" + this.cognome + " " + this.nome + "</div>";
                    ruolo += "<div>" + this.ruolo_desc + "</div>";
                    mail_personale += "<div>" + this.email + "</div>";
                });
                items += "<tr><td>" + this.azienda + " </td><td>" + this.area_commerciale_id + " </td><td id='referente'>" + referente + "</td>" +
                         "<td id='ruolo'>" + ruolo + "</td><td id='mail_personale'>" + mail_personale + "</td>" +
                         "<td class='note-email'></td><td>" + this.telefono + "</td>" +
                         "</td><td id='linkedin'></td><td id='linkedin-giulia'></td><td id='linkedin-evy'></td><td>" + this.www + " </td><td>" + this.citta + " </td>" +
                "<td>" + this.indirizzo + " " + this.cap + " " + this.citta + " " + this.provincia + "</td></tr>";

                referente = '';
                ruolo = '';
                mail_personale = '';
            });
           
        });
        items += "</table>";
        $('.container').append(items);
    });
});
</script>


<?php
header ("Content-Type: application/vnd.ms-excel"); 
header ("Content-Disposition: inline; filename=$nomefile"); 
echo "<table border=1>"; 
echo "<tr>"; 
for ($i=0;$i<count($ind_title);++$i) { 
    echo "<TD>".$ind_name[$ind_title[$i]]; 
    echo "</TD>"; 
} 
echo "</tr>"; 
$query="SELECT soci.tessera ecc"; 
$query = Query($query); 
while ($row=pg_fetch_array($query)) { 
    echo "<tr>"; 
    for ($i=0;$i<count($ind_title);++$i) 
    echo "<td>".$row[$ind_title[$i]]."</td>"; 
} 
echo "</tr>"; 
echo "</table>"; 
?> 


</body>
</html>