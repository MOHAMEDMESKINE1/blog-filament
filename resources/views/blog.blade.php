@extends('layouts.app')

@section('content')
 <x-banner title="Recent Posts" description="Our Recent Blog Entries"></x-banner>
 <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                   @forelse ($posts as $post)
                    <div class="blog-thumb">
                      <img src={{asset("assets/images/trending-item-01.jpg")}} width="100"  style="object-fit: cover; height:150px;" alt="">
                    </div>
                    <div class="down-content">
                      <span>{!! $post->title!!}</span>
                      
                      <ul class="post-info">
                        <li><a href="#">{{auth()->user()->name ?? 'TEST'}}</a></li>
                        <li><a href="#">{{$post->created_at}}</a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                      <span>{!!$post->content!!}</span>
                      
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">{{$post->category->name}}</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                       
                   @empty
                       
                   @endforelse
                </div>
              </div>
             

              <div class="col-lg-12">
               <div class="page-numbers">
                {{$posts->links()}}
               </div>
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
                    <div class="d-flex justify-content-between">
                      <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
                      <a type="reset" class="btn btn-secondary " class="text-muted" value="Reset"  href="{{route('home')}}">Reset</a>    
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
                        <li><a href="#">
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