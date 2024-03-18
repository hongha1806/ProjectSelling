<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog list</title>
</head>
<body>
    @extends('frontend.layouts.app')
    @section('content')
        <div class="col-sm-9">
            <div class="blog-post-area">
                <h2 class="title text-center">Latest From our Blog</h2>
                    @if (!empty($blogList))
                        @foreach ($blogList as $key => $item)
                            <div class="single-blog-post">
                                <h3>{{$item->title}}</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i></li>
                                        <li><i class="fa fa-clock-o"></i>{{$item->created_at}}</li>
                                        <li><i class="fa fa-calendar"></i>{{$item->updated_at}}</li>
                                    </ul>
                                    <span class="{{$item->id}}">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                                <a href="{{ route('blog-detail', ['id' => $item->id]) }}">
                                    <img src="{{ asset('upload/user/avatar/'.$item->image)}}" alt="">
                                </a>
                                <p>{{$item->description}}</p>
                                <a  class="btn btn-primary" href="{{ route('blog-detail', ['id' => $item->id]) }}">Read More</a>
                            </div>
                            <script>
                                        var objCha = {};
                                        var id = "{{$item->id}}";
                                        var chuyen = localStorage.getItem("avg");
                                        if (chuyen) {
                                            objCha = JSON.parse(chuyen);
                                        }
                                        Object.keys(objCha).map(function(key, index) {
                                            if (id == key) {
                                                var avg = objCha[key]['avg'];
                                                var starHTML = '';

                                                // Tạo HTML cho số lượng sao
                                                for (var i = 0; i < Math.floor(avg); i++) {
                                                    starHTML += '<i class="fa fa-star"></i>';
                                                }
                                                if (avg % 1 !== 0) {
                                                    starHTML += '<i class="fa fa-star-half-o"></i>';
                                                }

                                                // Thay đổi nội dung của phần tử <span>
                                                $('.'+id).html(starHTML);
                                            }
                                        });
                                    </script>
                        @endforeach
                    @else
                        <h3>There is no blog</h3>
                    @endif
                    <div class="pagination-area">
                        {{ $blogList->links() }}
                    </div>
            </div>
        </div>
    @endsection
  
</body>
</html>