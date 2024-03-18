<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>country</title>
    <style>
        .them{
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
    @extends('admin.layouts.app')
    @section('content')
        @if (session('msg'))
            <div style="color: red;">{{session('msg')}}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="5%">ID</th>
                                        <th scope="col">Tite</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" width="10%">Create at</th>
                                        <th scope="col" width="10%">Update at</th>
                                        <th scope="col" width="5%">EDIT</th>
                                        <th scope="col" width="5%">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($blogList))
                                        @foreach ($blogList as $key => $item)
                                        <tr>
                                            <td scope="row">{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->image}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td ><a href="{{route('blog.edit', ['id'=>$item->id])}}">Edit</a></td>
                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa blog?')" 
                                            href="{{route('blog.delete', ['id'=>$item->id])}}">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">There is no blog</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                        <a href="{{route('blog.add')}}"><button class="them">ADD BLOG</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>