<div id="comment" class="response-area">
    <h2>RESPONSES</h2>
    @if(!empty($cmt))
        @foreach ($cmt as $item)
            <div class="media commnets">
                <a class="pull-left" >
                    <img class="rounded-circle" src="{{ asset('upload/user/avatar/'.$item->avatar) }}" width="30"  alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$item->cus->name}}</h4>
                    <p>{{$item->cmt}}</p>
                    <div class="blog-socials">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <a class="btn btn-primary" ><i class="fa fa-reply"></i>Replay</a>
                    </div>
                    <form action="" enctype="multipart/form-data" style="display:none" method="POST"  id="cmt-form">
                        <div class="text-area">
                            <textarea class="content" name="content" rows="11" required="required"></textarea>
                            @error('cmt') 
                                <span style="color: red;">{{$message}}</span>
                            @enderror
                            @auth
                            <button type="button" class="btn btn-primary" id="">Post comment</button>
                            @else
                                <!-- Hiển thị thông báo yêu cầu đăng nhập -->
                                <ul class="ratings">
                                    <li><p class="red">Vui lòng đăng nhập để đánh giá bài viết.</p></li>
                                </ul>
                            @endauth
                        </div>
                        @csrf
                    </form>

                    <!-- bình luận con -->
                    
                    @foreach ($cmt->replies as $item)
                    <div class="media commnets">
                        <a class="pull-left" >
                            <img class="rounded-circle" src="{{ asset('upload/user/avatar/'.$item->avatar) }}" width="30"  alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$item->cus->name}}</h4>
                            <p>{{$item->cmt}}</p>
                            <div class="blog-socials">
                                <ul>
                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                                <a class="btn btn-primary" ><i class="fa fa-reply"></i>Replay</a>
                            </div>
                            <form action="" enctype="multipart/form-data" style="display:none" method="POST"  id="cmt-form">
                                <div class="text-area">
                                    <textarea class="content" name="content" rows="11" required="required"></textarea>
                                    @error('cmt') 
                                        <span style="color: red;">{{$message}}</span>
                                    @enderror
                                    @auth
                                    <button type="button" class="btn btn-primary" id="">Post comment</button>
                                    @else
                                        <!-- Hiển thị thông báo yêu cầu đăng nhập -->
                                        <ul class="ratings">
                                            <li><p class="red">Vui lòng đăng nhập để đánh giá bài viết.</p></li>
                                        </ul>
                                    @endauth
                                </div>
                                @csrf
                            </form>
                        </div>
                </div>
            </div> <!--Comments--->	
        @endforeach
    @endif					
</div>