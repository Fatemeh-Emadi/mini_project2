<html>
<head>
 <link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
</head>
<body dir="rtl" >
<div class="row mt-5 mb-5 ">
    

    <div class="col-8 ms-5 mt-5 mb-5">
    <h2 class="text-danger">درخواست های مسافران</h2>
    <table class="table border text-secondary" style="background-color: white;">
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
      <td>{{$trip->price}}</td>
      
      <td><a href="/trip/reject/{{$trip->id}}"><i class="bi bi-x-circle text-danger"></i><a></td>
      <td><a href="/trip/accept/{{$trip->id}}"><i class="bi bi-check-circle text-success"></i><a></td>
    </tr>
   @endforeach
  </tbody>
</table>


</script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbMng7uNFZaBNuhiXClQbAA8fueE2USG4&callback=myMap"></script>
    <script src="js/notification.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/json.js"></script>
    </body>




</html>