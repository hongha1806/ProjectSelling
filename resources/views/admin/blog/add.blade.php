<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add-blog</title>
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
        <div>
            <h1>Create Blog</h1>
            <form class="form-horizontal form-material" enctype="multipart/form-data" action="" method="POST">
                <div class="form-group">
                    <label class="col-md-12">Title</label>
                    <div class="col-md-12">
                        <input type="text" name="title" class="form-control form-control-line" value="">
                        @error('title') 
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Image</label>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control form-control-line" value="">
                        @error('image') 
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Description</label>
                    <div class="col-md-12">
                        <textarea name="description" id="editor1" class="form-control form-control-line" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <br/>
                <input type="submit" name="submit" value="ADD">
                <a href="{{route('blog.list')}}"><input type="button" value="QUAY LẠI"></a>
                @csrf
            </form>
        </div>
    @endsection
</body>
</html>