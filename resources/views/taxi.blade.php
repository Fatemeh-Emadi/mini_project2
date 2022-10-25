<html>

<head>
<link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
</head>
<body dir="rtl">
<div class="container mt-5">
    
    <div class="alert alert-warning" role="alert" id="message">
      آدرس مبدا را انتخاب کن
    </div>
    <div id="googleMap" class="rounded-3" style="width:100%;height:400px;"></div>

      <div class="card shadow-2-strong card-registration mt-5 mb-5 bg-warning">
      <form class="row py-3 px-5 " method="post" action="/take-taxi">
  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">مبدا</label>
    <input type="text" class="form-control" id="lat_start" name="lat-start">
    <input type="text" class="form-control mt-2" id="lng_start" name="lng-start">
  </div>
  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">مقصد</label>
    <input type="text" class="form-control" id="lat_end" name="lat-end">
    <input type="text" class="form-control mt-2" id="lng_end" name="lng-end">
  </div>
  <div class="col-4">
    <label for="inputAddress" class="form-label">قیمت</label>
    <input type="text" class="form-control"  name="price" id="price">
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="col-12 mt-5">
    <button type="submit" class="btn btn-dark">درخواست تاکسی</button>
  </div>
</form>

      </div>

   <!-- <p id="lat"></p>
    <p id="lng"></p>
    <p id="lat2"></p>
    <p id="lng2"></p>
   -->
  </div>
    <script>
     var lat=32.4279;
     var lng=53.6880;
     var map;
     var distance;
     var flag=false;
     function getDistance(start,end){
       x1=start.lat();
       y1=start.lng();
       x2=end.lat();
       y2=end.lng();
       distance=Math.sqrt((x1-x2)**2+(y1-y2)**2);
       return distance;

     }

    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(lat,lng),
      zoom:10,
    };
    map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
        lat=position.coords.latitude;
        lng=position.coords.longitude;
        
        var myCenter=new google.maps.LatLng(lat,lng);
        map.setCenter(myCenter);

    var marker = new google.maps.Marker({   
        position: myCenter,
        draggable:true,
        icon:'images/icon1.png',
        animation:google.maps.Animation.BOUNCE
    });

    marker.setMap(map);

google.maps.event.addListener(marker, 'click',function(){
    
  var lat_start=document.getElementById("lat_start");
  var lng_start=document.getElementById("lng_start");
 
 
  var selected_location=marker.getPosition();

 lat_start.value=selected_location.lat();
 lng_start.value=selected_location.lng();
  if(flag==false){
    flag=true;
    document.getElementById("message").innerHTML="آدرس مقصد را انتخاب کن";
  var marker2 = new google.maps.Marker({   
        position: myCenter,
        draggable:true,
        icon:'images/icon2.png',
        animation:google.maps.Animation.BOUNCE
    });

    marker2.setMap(map);

    google.maps.event.addListener(marker2, 'click',function(){
      var lat_end=document.getElementById("lat_end");
      var lng_end=document.getElementById("lng_end");
      var price_tag=document.getElementById("price");
   // var tag_p_lat=document.getElementById("lat2");
   // var tag_p_lng=document.getElementById("lng2");
  
    var selected_location2=marker2.getPosition();
  
    lat_end.value=selected_location2.lat();
    lng_end.value=selected_location2.lng();

    distance=getDistance(selected_location,selected_location2);
    var price=Math.round(distance*2000);
    price_tag.value=price;
   var message=document.getElementById("message");
   message .innerHTML="درخواست سفر پذیرفته شد. هزینه سفر " +price +" تومان";
   message.classList.remove("alert-warning");
   message.classList.add("alert-success");
   showNotification();
   display();
  });
}
});
    
});
  } else {
    alert = "Geolocation is not supported by this browser.";
  }
 
   getDistance(selected_location,selected_location2);

    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbMng7uNFZaBNuhiXClQbAA8fueE2USG4&callback=myMap"></script>
    <script src="js/notification.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/json.js"></script>
</body>
</html>