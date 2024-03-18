<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <style>
        .one{
           display: flex;
           
        }


    </style>
</head>
<body>
    @extends('frontend.layouts.app')
    @section('content')
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Items</h2>
            
            @if (session('msg'))
                <div style="color: red;">{{session('msg')}}</div>
            @endif
            <div>
                <div class="col-sm-12">
                    <div class="search_box pull-right">
                        <form action="{{url('/advanced')}}" method="POST">
                            <div class="form-group one">
                                <input type="text" class="form-control form-control-line" name="name" placeholder="Search" value=""/>
                                <select name="price" id="price" class="form-control form-control-line">
                                    <option value="2">Choose price</option>
                                    <option value="0-100000"> <100000</option>
                                    <option value="100000-200000">100000-200000</option>
                                    <option value="200000-300000">200000-300000</option>
                                    <option value="300000-400000">300000-400000</option>
                                    <option value="400000-500000">400000-500000</option>
                                    <option value="500000-600000">500000-600000</option>
                                    <option value="600000-700000">600000-700000</option>
                                    <option value="700000-800000">700000-800000</option>
                                    <option value="800000-900000">800000-900000</option>
                                    <option value="900000-1000000">900000-1000000</option>
                                    
                                </select>
                                <select name="category_id" class="form-control form-control-line">
                                    <option value="2">Category</option>
                                    @if (!empty($category))
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select name="brand_id" class="form-control form-control-line">
                                    <option value="2">Brand</option>
                                    @if (!empty($brand))
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <select name="status" id="status" class="form-control form-control-line">
                                    <option value="2">Status</option>
                                    <option value="1">New</option>
                                    <option value="0">Sale</option>
                                    
                                </select>
                            </div>
                            <br>
                            <button class="btn btn-default">Search</button>
                            @csrf
                        </form>
                    </div>
                </div>
               
                
            </div>
            
        </div>
    @endsection
</body>
</html>