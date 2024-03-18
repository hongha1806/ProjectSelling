<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog-detail</title>
	<style>
		.red{
			color: red;
		}
		.ratings_hover{
			color: orange;
		}
		.bl{
			background-color: orange;
			width: 100%;
		}
		.cmt{
			height: 100px;
		}

	</style>
</head>
<body>
    @extends('frontend.layouts.app')
    @section('content')
                    <div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
                            @if (!empty($blogList))
                                @foreach ($blogList as $item)
                                    <h3>{{$item->title}}</h3>
                                    <div class="post-meta">
                                        <ul>
                                            <li><i class="fa fa-user"></i> Mac Doe</li>
                                            <li><i class="fa fa-clock-o"></i>{{$item->created_at}}</li>
                                            <li><i class="fa fa-calendar"></i>{{$item->updated_at}}<</li>
                                        </ul>
                                        <!-- <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span> -->
                                    </div>
                                    <a href="">
                                        <img src="{{ asset('upload/user/avatar/'.$item->image)}}" alt="">
                                    </a>
                                    <p>{{$item->description}}</p> <br>
                                @endforeach
                            @else
                                <h3>There is no blog</h3>
                            @endif
							<div class="pager-area">
								<ul class="pager pull-right">
                                    @if (!empty($previousPost))
                                        <li><a href="{{ route('blog-detail', ['id' => $previousPost->id]) }}">Pre</a></li>
                                    @endif
                                    @if (!empty($nextPost))
                                        <li><a href="{{ route('blog-detail', ['id' => $nextPost->id]) }}">Next</a></li>
                                    @endif
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->


					<div class="rating-area">
						@auth
							<!-- Hiển thị nội dung khi người dùng đã đăng nhập -->
							<form action="" enctype="multipart/form-data" method="POST" id="rating-form">
								<ul class="ratings">
									<li class="rate-this">Rate this item:</li>
									<input type="hidden" name="user_id" value="{{ Auth::id() }}">
									@if (!empty($blogList))
										@foreach ($blogList as $key => $item)
											<input type="hidden" name="blog_id" value="{{$item->id}}">
										@endforeach
									@endif
									<i class="fa fa-star ratings_stars"><input name="rate" value="1" type="hidden"></i>
									<i class="fa fa-star ratings_stars"><input name="rate" value="2" type="hidden"></i>
									<i class="fa fa-star ratings_stars"><input name="rate" value="3" type="hidden"></i>
									<i class="fa fa-star ratings_stars"><input name="rate" value="4" type="hidden"></i>
									<i class="fa fa-star ratings_stars"><input name="rate" value="5" type="hidden"></i>
								</ul>
								@csrf
							</form>
						@else
							<!-- Hiển thị thông báo yêu cầu đăng nhập -->
							<ul class="ratings">
								<li><p class="red">Vui lòng đăng nhập để đánh giá bài viết.</p></li>
							</ul>
						@endauth
						<ul class="rating">
    						<li class="color avg">(Chưa có đánh giá nào.) <span id="average-rate"></span></li>
						</ul>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<h3>RESPONSES</h3>
						<hr>
						<ul cLass="media-list">
							@foreach ($cmt as $item)
								@if ($item->level == 0)
									<li class="media media-{{$item->id}}">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{asset('upload/user/avatar/'.$item->avatar)}}" alt="" style="width: 30px">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>{{$item->name}}</li>
												<li><i class="fa fa-calendar"></i>{{$item->created_at}}</li>
												<li><i class="fa fa-calendar"></i>{{$item->updated_at}}</li>
											</ul>
											<p>{{$item->cmt}}</p>
											<button class="btn btn-primary reply" href="" data-cmtid="{{$item->id}}"><i class="fa fa-reply"></i>Reply</button>
										</div>
										<form action="" enctype="multipart/form-data" style="display:none" class="form-rep reply-{{$item->id}}">
											<div class="form-group">
												<textarea name="reply" id="cmt-rep-{{$item->id}}" cols="30" rows="10"></textarea>
											</div>
											@if (!empty($blogList))
												@foreach ($blogList as $blog)
												<button type="button" href="" class="btn btn-primary post-reply" data-blogid="{{$blog->id}}" data-cmtid="{{$item->id}}">Post Reply</button>
												@endforeach
											@endif
											@csrf
										</form>
									</li>
								@endif
								@foreach ($cmt as $con)
									@if ($item->id == $con->level)
										<li class="media second-media">
											<a href="#" class="pull-left">
												<img class="media-object" src="{{asset('upload/user/avatar/'.$item->avatar)}}" alt="" style="width: 30px">
											</a>
											<div class="media-body">
												<ul class="sinlge-post-meta">
													<li><i class="fa fa-user"></i>{{$con->name}}</li>
													<li><i class="fa fa-calendar"></i>{{$con->created_at}}</li>
													<li><i class="fa fa-calendar"></i>{{$con->updated_at}}</li>
												</ul>
												<p>{{$con->cmt}}</p>
												{{--<button class="btn btn-primary reply" href="" data-cmtid="{{$con->id}}"><i class="fa fa-reply"></i>Reply</button>--}}
											</div>
										</li>
									@endif
								@endforeach
							@endforeach
						</ul>
					</div> 
					<!--Comments -->

					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								@auth
									<form action=""  enctype="multipart/form-data" method="POST" id="cmt-form">
										<div class="text-area">
											@if (!empty($blogList))
												@foreach ($blogList as $key => $item)
													<input type="hidden" name="blog_id" value="{{$item->id}}">
												@endforeach
											@endif
											<input type="hidden" name="user_id" value="{{ Auth::id() }}">
											<div class="blank-arrow">
												<label>{{ Auth::user()->name }}</label>
											</div>
											<textarea name="cmt" rows="11"></textarea>
											<button class="btn btn-primary postcmt" href="" type="button">Post comment</button>
										</div>
										@csrf
									</form>
								@else
									<ul class="ratings">
										<li><textarea rows="11"></textarea></li>
										<li><p class="red">Vui lòng đăng nhập để đánh giá bài viết.</p></li>
									</ul>
								@endauth
							</div>
						</div>
					</div>
					 <!--- Repaly Box -->



    @endsection

	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			var objCha = {};
	
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			//hover rate
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			// lưu avg rate để hiển thị
			//
			var id = 0;
			// Lấy URL hiện tại
			var currentURL = window.location.pathname;
			// Sử dụng biểu thức chính quy để tìm kiếm giá trị id trong URL
			var regex = /\/blog-detail\/(\d+)/;
			var match = currentURL.match(regex);

			if (match) {
				id = match[1];
				//console.log(id);
			} else {
				console.log("Không tìm thấy giá trị id trong URL");
			}
			var chuyen = localStorage.getItem("avg");
			if(chuyen){
				objCha = JSON.parse(chuyen);
			}
			Object.keys(objCha).map(function(key, index){
				if(id == key){
					$('.avg').text('(' + objCha[id]['avg'] + ' sao)');
				}
			})

			// đánh giá rate
			$('.ratings_stars').click(function() {
				var rate = $(this).find("input").val();
				var blogId = $('input[name="blog_id"]').val();
				if ($(this).hasClass('ratings_over')) {
					$('.ratings_stars').removeClass('ratings_over');
					$(this).prevAll().andSelf().addClass('ratings_over');
				} else {
					$(this).prevAll().andSelf().addClass('ratings_over');
				}
				alert("Bạn đã đánh giá " + rate + " sao cho blog này.");

				$.ajax({
					method: "POST",
					url:'/blog-rate',
					data: {
						rate: rate,
						blog_id: blogId,
					},
					success: function(data) {
						console.log(data);
						var averageRate = data.averageRate;
   						$('.avg').text('(' + averageRate + ' sao)');
						var objCon = {
							'blog_id': blogId,
							'avg': averageRate
						}
						objCha[blogId] = objCon;
						var chuyen = JSON.stringify(objCha);
						localStorage.setItem("avg", chuyen);
					}
				});
			});

			$('.postcmt').click(function() {
				var cmt = $(this).closest('.text-area').find('textarea').val();
				var blog_id = $('input[name="blog_id"]').val();
				var level = 0;
				$.ajax({
					method: "POST",
					url: '/blog-cmt',
					data: {
						cmt: cmt,
						blog_id: blog_id,
						level: level,
					},
					success: function(res) {
						var temp = res.data[res.data.length -1]
						var xx = "{{asset('upload/user/avatar/')}}"+'/'+temp.avatar;
						var html = '<li class="media media-{{$item->id}}">'+
										'<a class="pull-left" href="#">'+
											'<img class="media-object" src="'+xx+'" alt="" style="width: 30px">'+
										'</a>'+
										'<div class="media-body">'+
											'<ul class="sinlge-post-meta">'+
												'<li><i class="fa fa-user"></i>'+temp.name+'</li>'+
												'<li><i class="fa fa-calendar"></i>'+temp.created_at+'</li>'+
												'<li><i class="fa fa-calendar"></i>'+temp.updated_at+'</li>'+
											'</ul>'+
											'<p>'+temp.cmt+'</p>'+
											
										'</div>'+
									'</li>'
						
						$('.media-list').append(html);
						$('textarea').val("");
					}
				});
			});

		});

		$(document).on('click','.reply', function(e){
			var id = $(this).data('cmtid');
			$('.form-rep').slideUp();
			$(".reply-"+id).slideDown();
		});

		$(document).on('click','.post-reply', function(e) {
			e.preventDefault();
			var checklogin = "{{Auth::Check()}}";
			if(checklogin){
				var id = $(this).data('cmtid');
				var cmt = $('#cmt-rep-'+id).val();
				var blog_id = $(this).data('blogid');
				var level = id;
				$.ajax({
					method: "POST",
					url: '/blog-cmt-reply',
					data: {
						cmt: cmt,
						blog_id: blog_id,
						level: level,
					},
					success: function(res) {
						var temp = res.data[res.data.length -1]
						var xx = "{{asset('upload/user/avatar/')}}"+'/'+temp.avatar;
						var html = '<li class="media media-{{$item->id}}">'+
										'<a class="pull-left" href="#">'+
											'<img class="media-object" src="'+xx+'" alt="" style="width: 30px">'+
										'</a>'+
										'<div class="media-body">'+
											'<ul class="sinlge-post-meta">'+
												'<li><i class="fa fa-user"></i>'+temp.name+'</li>'+
												'<li><i class="fa fa-calendar"></i>'+temp.created_at+'</li>'+
												'<li><i class="fa fa-calendar"></i>'+temp.updated_at+'</li>'+
											'</ul>'+
											'<p>'+temp.cmt+'</p>'+
											
										'</div>'+
									'</li>'
						
						$('.media-list').append(html);
						$('#cmt-rep-'+id).val("");
					}
				});
			}else{
				alert("Bạn phải đăng nhập");
			}
		});

	</script>
</body>
</html>