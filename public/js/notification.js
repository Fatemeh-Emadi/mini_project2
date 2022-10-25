function notify(){
  var notify=new Notification("سفر جدید" ,{
      body:"مسافر منتظر شماست.",
      icon:'images/car.png'
      

  } );

  setTimeout(function(){notify.close()},10000);

}


function showNotification(){
    if("Notification" in window){
        if(Notification.permission==="granted"){
          notify();
        }
        else if(Notification.permission!=="denied"){
            Notification.requestPermission(function(permission){
              if(permission==="granted"){
                notify();
              }
            });
        }

    }
    else{
        alert("Notification does not supported");
    }
  }
