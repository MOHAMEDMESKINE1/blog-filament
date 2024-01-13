@extends('layouts.app')

@section('content')
<x-banner title="Post Details" description="Single blog post"></x-banner>

<section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src={{"assets/images/trending-item-03.jpg"}} alt="">
                  </div>
                  <div class="down-content">
                    <span>{!! $post->title !!}</span><br/>
                    <a href="post-details.html">
                       @if ($post->published)
                       <small class='badge bg-primary'>Published</small> 
                       @else
                       <small class='badge bg-secondary'>Unpublished</small>

                       @endif
                      </a>
                    <ul class="post-info">
                      <li><a href="#">{{auth()->user()->name ?? 'TEST'}}</a></li>
                      <li><a href="#">{{$post->created_at}}</a></li>
                      <li><a href="#">12 Comments</a></li>
                    </ul>
                    <p>{!! $post->body!!}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">{{$post->category->name}}</a></li>
                           
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
              </div>
             
               <div class="col-lg-5">
                <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                    <h2>{{$comments->count()}} comments</h2>
                  </div>
                  <div class="">
                   
                      @forelse ($comments as $comment)
                      <ul>
                        <li>
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-01.jpg" alt="">
                          </div>
                          <div class="right-content">
                            <h4>{{$comment->user->name }}<span>{{$comment->created_at->format('F j, Y')}}</span></h4>
                            <p>{{$comment->body}}</p>
                            @if ($comment->parent_id)
                                <p>Replied to: {{ $comment->parent->body }}</p>
                            @endif
                          </div>
                        </li>
                      </ul>

                          <!-- Reply Comment -->
                          
                          {{-- <form action="{{ route('comments.reply', ['id' => $post->id, 'parent_id' => $comment->id]) }}" method="post">
                              @csrf
                              <textarea name="body" rows="2" placeholder="Reply to this comment"></textarea>
                              <button type="submit">Reply</button>
                          </form> --}}
                          <!-- Display Replies -->
                          
                         {{-- @forelse($comment->replies as $reply)
                              <ul>
                                <li class="replied">
                                  <div class="author-thumb">
                                    <img src="assets/images/comment-author-02.jpg" alt="">
                                  </div>
                                  <div class="right-content">
                                    <h4>{{ $reply->user->name }} on <span>{{ $reply->created_at->format('F j, Y \a\t h:i A') }}</span></h4>
                                    <p>{{ $reply->body }}</p>
                                  </div>
                                </li>
                              </ul>
                            @empty
                                <p>No replies yet.</p>
                            @endforelse --}}
                           
                          @empty
                            <p>No Comments</p>
                          @endforelse
                       
                   
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                  <div class="sidebar-heading">
                    <h2>Leave a comment</h2>
                  </div>
                  <div class="content">
                    @if(session('success'))
                      <div class="alert alert-success my-2">
                          {{ session('success') }}
                      </div>
                    @endif
                    <form action="{{ route('comments.store', $post->id) }}" method="post">
                      @csrf
                      <div class="row">
                       
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="body" rows="6" id="body" placeholder="Type your comment" ></textarea>
                            @error('body')
                               <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
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
                    @csrf
                    <div class="d-flex justify-content-between">
                      <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
                      <a type="reset" class="btn  btn-sm btn-secondary "  href="{{route('home')}}">Reset</a>
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
                      <li><a href="{{route('posts_tag',$tag->name)}}">{{ $tag->name}}</a></li>
                          
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