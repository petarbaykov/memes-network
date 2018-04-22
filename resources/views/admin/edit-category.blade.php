@extends('admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('msg'))
                    <div class="callout callout-success">
                        <h4>{{Session::get('msg')['title']}}</h4>

                        <p>{{Session::get('msg')['body']}}</p>
                    </div>
                @endif
              <form action="{{asset('admin/category/update/'.$category->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <div class="form-group">
                  <label>Category name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter ..." value="{{$category->name}}">
                </div>
                 <div class="form-group">
                  <label>Category slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Enter ..." value="{{$category->slug}}">
                </div>
                 <div class="form-group">
                  <label>Category image</label>
                  <input type="input" class="form-control" name="image" placeholder="Enter ..." value="{{$category->image}}">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." style="resize:none;" name="description">{{$category->description}}</textarea>
                </div>
               
                 <button type="submit" class="btn btn-primary btn-block btn-flat">Edit</button>
        
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
@endsection