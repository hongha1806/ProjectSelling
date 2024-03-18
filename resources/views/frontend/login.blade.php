<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    @extends('frontend.layouts.app')
    @section('content')
        <div class="col-lg-8 col-xlg-9 col-md-7 col-sm-4">
            <div class="card signup-form">
                <div class="card-body">
                    @if (session('msg'))
                        <div style="color: red;">{{session('msg')}}</div>
                    @endif

                    @if ($errors->any())
                        <div style="color: red;">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
                    @endif
                <hr/>
                <form class="form-horizontal form-material" enctype="multipart/form-data" action="" method="POST">
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" class="form-control form-control-line" name="email" id="example-email" value="">
                                @error('email') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control form-control-line" value="">
                                @error('password') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <span>
                                    <input type="checkbox" class="checkbox"> 
                                    Keep me signed in
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-default">Login</button>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>