@extends('user.layouts.app',['title' => 'blog'])
@section('head')
@endsection
@section('main-content')

   <!-- ============================================================== -->
	<!-- Start Techno Breatcome Area -->
	<!-- ============================================================== -->
	<div class="breatcome_area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breatcome_title">
						<div class="breatcome_title_inner pb-2">
							<h2>Blog Gird</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="index.html">Home</a> <i class="fa fa-angle-right"></i> <a href="#"> Pages</a> <i class="fa fa-angle-right"></i> <span>Blog Gird</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Techno Breatcome Area -->
	<!-- ============================================================== -->
	
	<!--==================================================-->
	<!----- Start Techno Blog Area ----->
	<!--==================================================-->
	<div class="blog_area pt-85 pb-65">
		<div class="container">
			<div class="row">
				@foreach($blogs as $blog)
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="single_blog mb-4">
							<div class="single_blog_thumb pb-4">
								<a href="{{ route('blog.show',$blog->slug) }}"><img src="{{Storage::url($blog->image)}}" alt="" /></a>
							</div>
							<div class="single_blog_content pl-4 pr-4">
								<div class="techno_blog_meta">
									<a href="#">Techno </a>
									<span class="meta-date pl-3">{{$blog->created_at}}</span>
								</div>
								<div class="blog_page_title pb-1">
									<h3><a href="{{ route('blog.show',$blog->slug) }}">{{$blog->title}}</a></h3>
								</div>
								<div class="blog_description">
									<p>{{$blog->resume}}</p>
								</div>
								<div class="blog_page_button pb-4">
									<a href="{{ route('blog.show',$blog->slug) }}">Voire le detail <i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!-- start pagination -->
			<div class="row">
				<div class="col-md-12">
					<div class="paginations">				
						<ul class="page-numbers">
							<li><span aria-current="page" class="page-numbers current">1</span></li>
							<li><a class="page-numbers" href="#">2</a></li>
							<li><a class="page-numbers" href="#">3</a></li>
							<li><a class="page-numbers" href="#">4</a></li>
							<li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--==================================================-->
	<!----- End Techno Blog Area ----->
	<!--==================================================-->

@endsection

@section('js')

@endsection