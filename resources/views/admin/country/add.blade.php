<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-country</title>
    <style>
        .alert{
            color: red;
        }
        form{
			margin: 10px;
			padding: 10px;
		}
        input{
            margin: 5px;
			padding: 5px;
        }
        span{
            margin: 5px;
			padding: 5px;
        }
    </style>
</head>
<body>
    @extends('admin.layouts.app')
    @section('content')
    @if (session('msg'))
    <div style="color: red;">{{session('msg')}}</div>
    @endif

    @if ($errors->any())
        <div style="color: red;">Dữ liệu nhập vào không hợp lệ. Vui lòng kiểm tra lại</div>
    @endif
        <h1>Create Country</h1>
        <form action="" method="POST">
            <div>
                <input type="text" name="name" placeholder="Name..." value="{{old('name')}}"> <br>
                @error('name') 
                    <span style="color: red;">{{$message}}</span>
                @enderror
                <br/>
                <br/>
                <input type="submit" name="submit" value="ADD">
                <a href="{{route('country.list')}}"><input type="button" value="QUAY LẠI"></a>
            </div>
            @csrf
        </form>
    @endsection
</body>
</html>