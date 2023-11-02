@extends('admin.layout.app')

@section('title')
    {{'Add Category'}}
@endsection

@section('add-role')
    <a href="{{route('admin.category')}}"><button type="button" class="btn btn-gradient-primary btn-sm">Back</button></a>
@endsection
@section('content')
    

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       
        <form class="forms-sample" method="POST" action="">
            @csrf
          <div class="form-group">
            <label for="categoryname">Name</label>
            <input type="text" class="form-control" id="categoryname" placeholder="Enter Category Name">
          </div>
          <div class="form-group">
            <label for="categoryslug">Slug</label>
            <input type="text" class="form-control" id="categoryslug" placeholder="Enter Slug Name">
          </div>
          
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="selectStatus" name="selectStatus">
              <option>Active</option>
              <option>Inactive</option>
            </select>
          </div>
          {{-- <div class="form-group">
            <label>File upload</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div> --}}
         
          
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>

  @endsection