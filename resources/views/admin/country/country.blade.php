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
                        <h4 class="card-title">Country Table</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="20%">Create at</th>
                                        <th scope="col" width="20%">Update at</th>
                                        <th scope="col" width="10%">EDIT</th>
                                        <th scope="col" width="10%">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($countryList))
                                        @foreach ($countryList as $key => $item)
                                        <tr>
                                            <td scope="row">{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td ><a href="{{route('country.edit', ['id'=>$item->id])}}">Edit</a></td>
                                            <td><a onclick="return confirm('Bạn có chắc chắn muốn xóa country?')" 
                                            href="{{route('country.delete', ['id'=>$item->id])}}">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">There is no country</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <hr/>
                        <a href="{{route('country.add')}}"><button class="them">ADD COUNTRY</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>