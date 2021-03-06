@extends('layouts.index')

@section('content')
    <section class="ot-section-b wide-article">
        <div class="container">
            <div class="wide-article-container">
                <div class="article-heading">
                    <div class="main-heading">
                        <div class="post-cat2">
                            <span>
                                @if($row->category != NULL)
                                    <a href="{{url('category',$row->category->category_id)}}">{{$row->category->category_name}}</a>
                                @endif
                            </span>
                        </div>
                        <h3>{{$row->blog_title}}</h3>
                        <h4>by Administrator</h4>
                    </div>
                    <div class="post-meta">
                        <?php
                            $y = substr($row->created_at, 0, 4);
                            $m = substr($row->created_at, 5, 2);
                            $d = substr($row->created_at, 8, 2);
                        ?>
                        <span>{{$d}}/{{$m}}/{{$y}}</span>
                    </div>
                </div>
                <div class="article-image">
                    @if($row->blog_picture == NULL)
                        <img src="{{asset('images/blog/none.jpg')}}" alt="your image" class="img-responsive" />
                    @else
                        <img src="{{asset('images/blog/'.$row->blog_picture)}}" alt="your image" class="img-responsive" />
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- article -->
    <section class="ot-section-a">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="theiaStickySidebar">
                        <div class="content ot-article">
                            <p>
                                <?php echo $row->blog_content?>
                            </p>
                        </div>
                        <h4 class="section-title"><span>Telkom Corporate University</span></h4>

                        <div class="ot-next-prev-cont">
                            @if($blog_prev != NULL)
                                <div class="ot-prev"><a href="{{url('blog',$blog_prev->blog_id)}}"><span><i class="fa fa-chevron-left"></i>Previous article</span><strong>{{$blog_prev->blog_title}}</strong></a></div>
                            @else
                                <div class="ot-prev"><span>No Previous article</span></div>
                            @endif
                            @if($blog_next == NULL)
                            @else
                                <div class="ot-next"><a href="{{url('blog',$blog_next->blog_id)}}"><span>Next article<i class="fa fa-chevron-right"></i></span><strong>{{$blog_next->blog_title}}</strong></a></div>
                            @endif
                        </div>
                    </div>
                    <!-- end theiaStickySidebar -->
                </div>
                @include('layouts.sidebar')
            </div>
            <!-- row -->
            <!-- end main content -->
        </div>
        <!-- container -->
    </section>

@stop