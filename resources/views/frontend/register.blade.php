<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
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
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control form-control-line" value="">
                                @error('name') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email"  class="form-control form-control-line" name="email" id="example-email" value="">
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
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name="phone" class="form-control form-control-line" value="">
                                @error('phone') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Address</label>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control form-control-line" value="">
                                @error('address') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Avatar</label>
                            <div class="col-md-12">
                                <input type="file" name="avatar" class="form-control form-control-line" value="">
                                @error('avatar') 
                                    <span style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select name="id_country" class="form-control form-control-line">
                                            @if (!empty($countryList))
                                                @foreach ($countryList as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success btn-default">Register</button>
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