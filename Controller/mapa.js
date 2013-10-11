var map = null;
function carregar(){
    var latlng = new google.maps.LatLng(-29.767954,-57.071657);
             
    var myOptions = {
            zoom: 12,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
         };
         
    //criando o mapa
   map = new google.maps.Map( document.getElementById("mapa") , myOptions );
}

initialize();