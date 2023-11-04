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
       
        <form class="forms-sample" method="post" action="" name="categoryForm" id="categoryForm">
            @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name">
          <p></p>
          </div>
          {{-- <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" readonly id="slug" name="slug" placeholder="Enter Slug Name">
          <p></p>
          </div> --}}
          
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
              <option value="1">Active</option>
              <option value="0">Draft</option>
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
         
          
          <button type="submit" class="btn btn-gradient-primary me-2">Create</button>
        </form>
      </div>
    </div>
  </div>

  @endsection
  
  @section('customJs')
  <script>
 $("#categoryForm").submit(function(event){
  event.preventDefault();
  var element = $(this);
  $("button[type=submit]").prop('disabled', true);

  $.ajax({

    url : '{{route("admin.show")}}',
    type: 'post',
    data : element.serializeArray(),
    dataType: 'json',
    success : function(response){

      $("button[type=submit]").prop('disabled', false);
      if(response["status"] == true){
        window.location.href="{{route('admin.category')}}"

        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback')
        .html("");

       
      }else{
        var errors = response['errors'];
      if(errors['name']){
        $("#name").addClass('is-invalid')
        .siblings('p')
        .addClass('invalid-feedback')
        .html(errors['name']);
      }else{
        
        $("#name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback')
        .html("");
    
      }

     
      }
      
    },
    error: function(jqXHR, exception){
      console.log("Error");
    }
  })
 });

     

  </script>
     
  @endsection