@extends('layouts.index')

@section('content')
    <section class="ot-section-b wide-article">
        <div class="container">
            <div class="wide-article-container">
                <div class="article-heading">
                    <div class="main-heading">
                        <!-- <div class="post-cat2">
                            <span><a href="category.html">Computers</a></span>
                        </div> -->
                        <h2>{{$row->blog_title}}</h2>
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
                        <div class="ot-article-tags"><span><i class="fa fa-tags"></i></span><a href="index-grid.html">Street Art</a> <a href="index-grid.html">Fashion</a></div>

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