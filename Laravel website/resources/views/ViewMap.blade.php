<html>
<head>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDKfgcdQjs6zrHoLeaNxmjWOfaqqiu8XUo"></script>
<script type="text/javascript">
  var geocoder;
  var map;
  var address ="{{$Locatie}}";
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var opties = {
      zoom: 14,
      navigationControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), opties);
    if (geocoder) {
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            }); 
          } else {
            alert("Geen locatie gevonden");
          }
        } else {
          alert("Geocode was niet succesvol");
        }
      });
    }
  }
</script>
</head>
<body style="margin:0px; padding:0px;" onload="initialize()">
 <div id="map_canvas" style="width:100%; height:100%">
</body>
</html>