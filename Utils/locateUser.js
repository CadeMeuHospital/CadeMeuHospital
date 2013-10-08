 var x=document.getElementById("demo");

        function getLocation() {
            
           navigator.geolocation.getCurrentPosition(showPosition,showError);
             
           var latlon=position.coords.latitude+","+position.coords.longitude;
          
          alert(latlon);
            
        }

        function showPosition(position)
          {
          var latlon=position.coords.latitude+","+position.coords.longitude;
          
          alert(latlon);

        function showError(error)
          {
          switch(error.code) 
            {
            case error.PERMISSION_DENIED:
              x.innerHTML="User denied the request for Geolocation.";
              break;
            case error.POSITION_UNAVAILABLE:
              x.innerHTML="Location information is unavailable.";
              break;
            case error.TIMEOUT:
              x.innerHTML="The request to get user location timed out.";
              break;
            case error.UNKNOWN_ERROR:
              x.innerHTML="An unknown error occurred.";
              break;
            }
          }   
       }
          