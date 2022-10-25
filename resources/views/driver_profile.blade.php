<html>
<head>
 <link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
</head>
<body dir="rtl" class="bg-dark" >
  <div class="container mt-5">
<h3 class="text-warning">صفحه کاربری راننده</h3>
  <div id="googleMap" class="rounded-3 mt-5" style="width:100%;height:400px;"></div>
  
<div class="row mt-5 mb-5 ">


    <div class="col-10 ms-5 mt-5 mb-5">
    <h2 class="text-warning">درخواست های مسافران</h2>
    <table class="table border text-light mt-3 " style="background-color: gray;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">نام مسافر</th>
      <th scope="col">مبدا</th>
      <th scope="col">مقصد</th>
      <th scope="col">قیمت</th>
      <th>رد درخواست</th>
      <th>قبول درخواست</th>
     
    </tr>
  </thead>
  <tbody>
      @php $i=1;  @endphp
    <tr>
        @foreach($trips as $trip)
      <th scope="row">{{$i++}}</th>
      
      <td>{{$trip->user->name}} {{$trip->user->family}}</td>
      <td>{{$trip->lat_start}},{{$trip->lng_start}} </td>
      <td>{{$trip->lat_end}},{{$trip->lng_end}}</td>
      <td>{{$trip->price}} </td>
      
      <td><a href="/trip/reject/{{$trip->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-x-circle-fill ms-4" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg><a></td>
      <td><a href="/trip/accept/{{$trip->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-check-circle-fill ms-4" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg><a></td>
    </tr>
   @endforeach
  </tbody>
</table>
    </div>
</div>
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

</script>
<script src="https://kit.fontawesome.com/2a5559cd61.js" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbMng7uNFZaBNuhiXClQbAA8fueE2USG4&callback=myMap"></script>
    <script src="js/notification.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/json.js"></script>
    </body>




</html>