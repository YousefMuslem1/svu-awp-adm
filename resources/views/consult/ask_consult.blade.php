<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/trix.css')}}">
    <title>طلب استشارة</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-primary mb-5">
       <div class="container">
           <a class="navbar-brand" href="{{url('/')}}">صحتك</a>
       </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header text-white bg-warning" style="font-size: 1.7rem">
                        طلب استشارة
                    </div>
                    @if(Auth::check())
                        <div class="card-body">
                        <form action="{{route('save.consult')}}" method="post">
                            @csrf
                            <div class="form-group lead">
                                <label for="consult_add">عنوان الاستشارة</label>
                                <input type="text" class="form-control" name="consult_add" placeholder="مثال : ألم شديد في الرأس " value="{{old('consult_add')}}" required>
                            </div>
                            @error('consult_add') <div class="alert alert-danger">{{$message}}</div> @enderror

                            <div class="form-group lead">
                                <label for="age">العمر</label>
                                <input type="number" class="form-control" name="age" placeholder="مثال : 32 " value="{{old('age')}}" required>
                            </div>
                            @error('age') <div class="alert alert-danger">{{$message}}</div> @enderror
                            <div class="form-group lead">
                                <label for="gender">الجنس</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">...</option>
                                    <option value="mal">ذكر</option>
                                    <option value="female">أنثى</option>
                                    <option value="none">لا أرغب بتحديد الجنس</option>
                                </select>
                                @error('gender') <div class="alert alert-danger">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="dis_history" class="lead">التاريخ المرضي</label>
                                <input id="dis_history" type="hidden" name="dis_history" value="{{old('dis_history')}}">
                                <trix-editor input="dis_history" placeholder="مثال : لدي مرض سكري وأجريت عملية في العين من عام تقريباً" ></trix-editor>
                            </div>
                            @error('dis_history') <div class="alert alert-danger">{{$message}}</div> @enderror
                            <div class="form-group">
                                <label for="consult_body" class="lead">نص الاستشارة</label>
                                <input id="consult_body" type="hidden" name="consult_body" value="{{old('consult_body')}}">
                                <trix-editor input="consult_body" placeholder="مثال : اعاني في الوقت الحالي من الدوران في الرأس أثناء الاستلقاء" ></trix-editor>
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            </div>
                            @error('consult_body') <div class="alert alert-danger">{{$message}}</div> @enderror

                            <div class="form-group">
                                <label for="captcha" class="lead">لست بوت</label><br>
                                <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default">
                                <span id="captcha-fresh" style="cursor: pointer"><i class="fas fa-sync"></i></span>
                                <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" name="captcha" placeholder="قم بإدخال ماتراه في الصورة أعلاه" required  autocomplete="off">
                                @error('captcha')
                                <span class="invalid-feedback">
                                    خطأ يرجى إعادة المحاولة
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success " style="width: 9rem">إرسال</button>
                        </form>
                    </div>
                    @else
                        <div class="alert alert-info lead mt-4">
                            يجب <a href="{{route('login')}}">تسجيل الدخول</a>
                            أو إذا لم تكن مسجل قم بإنشاء حساب من <a href="{{route('register')}}">هنا</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="{{asset('js/trix.min.js')}}"> </script>
    <script>

        $(document).ready(function (e) {
            $('#captcha-fresh').on('click', function () {
                var captcha = $('img.captcha-img');
                var config = captcha.data('refresh-config');
                $.ajax({
                    method: 'GET',
                    url: '/get_captcha/' + config,
                }).done(function (response) {
                    captcha.prop('src', response);
                });
            });
        })

    </script>
</body>
</html>
