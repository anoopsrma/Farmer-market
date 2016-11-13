@extends('layouts.master')
@section('title','Product Detail')
@section('content')

<div class="container">
<div id="content">
    <div class="col-sm-9" id="blog-post">
    <div class="box">
        <div id="comments" data-animate="fadeInUp">
            <div class="row comment">
            @foreach($reviews as $review)
                <div class="col-sm-3 col-md-2 text-center-xs">
                    <p>
                        <img src="/img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
                    </p>
                </div>
                <div class="col-sm-9 col-md-10">
                    <h5>{{$review->name}}</h5>
                    <p class="posted"><i class="fa fa-clock-o"></i> September 23, 2011 at 12:00 am</p>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                        Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <p class="reply"><a href="#"><i class="fa fa-reply"></i> Reply</a>
                    </p>
                </div>
            </div>
            @endforeach
                <!-- /.comment -->
        </div>
            <!-- /#comments -->
        </div>

       @if (!Auth::guest())
        <div id="comment-form" data-animate="fadeInUp">


            <h4>Leave comment</h4>

            <form action="/comment/" action="post">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" required >
                        </div>
                    </div>
                </div>

      
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="description">Comment <span class="required">*</span></label>
                            <textarea type="text" rows="5" class="form-control" name="description" required >
                            	
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary"><i class="fa fa-comment-o"></i> Post comment</button>
                    </div>
                </div>
            </form>

         </div>
     @endif
                        <!-- /#comment-form -->

   
                    <!-- /.box -->
    </div>
                <!-- /#blog-post -->
</div>
</div>
 

@endsection