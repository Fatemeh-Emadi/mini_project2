<html>

<head>
    <link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body dir="rtl" class=" gradient-custom">
    <section >
        <div class="container py-5 ">
            <div class="row justify-content-center align-items-center">
            <div class="col-10 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <center><h4 class="mb-4 pb-2 pb-md-0 mb-md-5 text-secondary">فرم ورود راننده ها</h4></center>
            <form method="post" action="{{url('/login')}}" >
              <div class="form-outline form-white mb-4 text-start">
              <label class="form-label" for="typeEmailX" >شماره تلفن</label>
                <input type="text" id="typeEmailX" class="form-control form-control-lg" name="login" />
               
              </div>

              <div class="form-outline form-white mb-4 text-start">
              <label class="form-label " for="typePasswordX">گذرواژه</label>
                <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password"/>
              
              </div>

              <input type="hidden" name="_token" value="{{csrf_token()}}" >

            <center>  <button class="btn btn-secondary btn-lg px-5" type="submit">ورود</button></center>


            </div>
                  </form>
            </div>
            </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>
