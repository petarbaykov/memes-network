@extends('admin.app')

@section('content')
<div class="row">
    <div class="col-md-12">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(Session::has('msg'))
                    <div class="callout callout-success">
                        <h4>{{Session::get('msg')['title']}}</h4>

                        <p>{{Session::get('msg')['body']}}</p>
                    </div>
                @endif
              <form action="{{asset('admin/category/create')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                <div class="form-group">
                  <label>Category name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter name">
                </div>
                 <div class="form-group">
                  <label>Category slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Enter slug" >
                </div>
                 <div class="form-group">
                  <label>Category image</label>
                  <input type="file" class="form-control" name="image" >
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter description" style="resize:none;" name="description"></textarea>
                </div>
               
                 <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
        
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
@endsection