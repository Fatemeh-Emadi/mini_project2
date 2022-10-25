<html>

<head>
    <link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet">
</head>

<body dir="rtl">
    <section class=" gradient-custom">
        <div class="container py-5 ">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <center>
                                <h4 class="mb-4 pb-2 pb-md-0 mb-md-5 text-secondary">فرم ثبت نام راننده ها</h4>
                            </center>
                            <form action="{{url('/register')}}" method="post">

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="firstName">نام</label>
                                            <input type="text" id="firstName" class="form-control form-control-lg" name="name" />

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="lastName">نام خانوادگی</label>
                                            <input type="text" id="lastName" class="form-control form-control-lg" name="family" />

                                        </div>

                                    </div>
                                </div>

                               
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label class="form-label" for="phoneNumber">شماره تلفن</label>
                                            <input type="text" id="phoneNumber" class="form-control form-control-lg" name="number" />

                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-14 col-sm-12 ">
                                        <label for="inputState" class="form-label">شهر محل سکونت</label>
                                        <select id="inputState" class="form-select" name="city">
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                               

                                <div class="row">
                                    <div class="col-lg-12 col-md-6 col-sm-12 pb-2">
                                        <label for="inputAddress" class="form-label">آدرس</label>
                                        <textarea class="form-control" id="inputAddress" placeholder="خیابان آزادی ..." name="address"></textarea>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label" for="emailAddress">گذرواژه</label>
                                            <input type="password" id="emailAddress" class="form-control form-control-lg" name="password" />

                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <label class="form-label">تکرار گذرواژه</label>
                                            <input type="password" class="form-control form-control-lg" name="password2" />

                                        </div>

                                    </div>

                                </div>
                         
                            <hr class="mt-2">
                            <h5 class="mt-1 text-secondary mb-3">مشخصات ماشین</h5>
                                <div class="row">
                                    <div class="col-md-4 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label"> اسم ماشین</label>
                                            <input type="text" class="form-control form-control-lg" id="birthdayDate" name="car" />

                                        </div>

                                    </div>
                                    <div class="col-md-4 mb-4 d-flex align-items-center">

                                        <div class="form-outline datepicker w-100">
                                            <label for="birthdayDate" class="form-label"> پلاک ماشین</label>
                                            <input type="text" class="form-control form-control-lg" id="birthdayDate" name="pelak" />

                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 ">
                                        <label for="inputState" class="form-label">رنگ ماشین</label>
                                        <select id="inputState" class="form-select" name="color">
                                            @foreach($colors as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="mt-4 pt-2">
                                    <center> <button type="submit" class="btn btn-outline-secondary btn-lg ">ثبت نام</button></center>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>