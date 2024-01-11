@extends('layouts.app')

@section('content')
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
     
          @forelse ($posts as $post)
          <div class="item">
          <img src={{asset("assets/images/banner-bg.jpg")}} alt="">
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>{{$post->category->name}}</span>
              </div>
              <a href="post-details.html"><h4>{!! $post->title !!}</h4></a>
              <ul class="post-info">
                <li><a href="#">{{auth()->user()->name ?? "TESTING"}}</a></li>
                <li><a href="#">{{$post->created_at}}</a></li>
                <li><a href="#">12 Comments</a></li>
              </ul>
            </div>
          </div>
        </div>
          @empty
              
          @endforelse
      
    
    </div>
  </div>
</div>
<!-- Banner Ends Here -->



<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            <div class="col-lg-12">
               @forelse ($posts as $post)
                <div class="blog-post">
                  <div class="blog-thumb">
                      <img src={{asset("assets/images/banner-bg.jpg")}} alt="">
                      {{-- <img src="{{asset('storage') }}" alt="Post image"> --}}

                  </div>
                  <div class="down-content">
                    <a href="{{route('posts',$post->slug)}}"><h4>{!!$post->title!!}</h4></a>
                    <ul class="post-info">
                      <li><a href="#">{{auth()->user()->name ?? 'TEST'}}</a></li>
                      <li><a href="#">{{$post->created_at}}</a></li>
                      <li><a href="#">12 Comments</a></li>
                    </ul>
                    <span>{!!$post->content!!}</span>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">{{$post->category->name}}</a></li>
                            {{-- <li><a href="#">Nature</a></li> --}}
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               @empty
                   <p>No posts</p>
               @endforelse
            </div>
        
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="sidebar">
          <div class="row">
            <div class="col-lg-12">
              <div class="sidebar-item search">
                <form id="search_form" name="gs" method="GET" action="#">
                  @csrf
                  <div class="d-flex justify-content-between">
                    <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
                    <a type="reset" class="btn  btn-sm btn-secondary " value="Reset"  href="{{route('home')}}">
                    <span class="mt-5">
                      Reset
                    </span>
                    </a>    
  
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                  <h2>Recent Posts</h2>
                </div>
                <div class="content">
                  <ul> 
                     @forelse ($latest_posts as $post)
                      <li><a href="{{route('posts',$post->slug)}}">
                        <h5>{{$post->title}}</h5>
                        <span>{{$post->created_at->format('F j, Y')}}</span>
                      </a></li>
                      
                     @empty
                         <p>No recent posts</p>
                     @endforelse
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item categories">
                <div class="sidebar-heading">
                  <h2>Categories</h2>
                </div>
                <div class="content">
                  <ul>
                    @forelse ($categories as $category)
                    <li><a href="#">- {{$category->name}}</a></li>
                    @empty
                        <p>No Category</p>
                    @endforelse
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item tags">
                <div class="sidebar-heading">
                  <h2>Tag Clouds</h2>
                </div>
                <div class="content">
                  <ul>
                    @forelse ($tags as $tag)
                    <li><a href="#">{{ $tag->name}}</a></li>
                        
                    @empty
                        <p>No Tags</p>
                    @endforelse
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

