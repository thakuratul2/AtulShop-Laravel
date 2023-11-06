@extends('admin.layout.app')

@section('title')
    {{'Edit Category'}}
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
            <input type="text" class="form-control" name="name" id="name" value="{{$cat->name}}" placeholder="Enter Category Name">
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
              <option {{($cat->status == 1) ? 'selected' : '' }} value="1">Active</option>
              <option {{($cat->status == 0) ? 'selected' : '' }} value="0">Draft</option>
            </select>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <input type="hidden" id="image_id" name="image_id" value="">
              <label class="image">Update Image</label>
              <div id="image" class="dropzone dz-clickable">
                <div class="dz-message needsclick">    
                    <br>Drop files here or click to upload.<br><br>                                            
                </div>
            </div>
            </div>

            @if (!empty($cat->category_image))
             <div>
                <img width="250" src="{{asset('upload/category/'. $cat->category_image)}}" alt="">
            </div>   
            @endif
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
         
          
          <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
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

 Dropzone.autoDiscover = false;    
const dropzone = $("#image").dropzone({ 
    init: function() {
        this.on('addedfile', function(file) {
            if (this.files.length > 1) {
                this.removeFile(this.files[0]);
            }
        });
    },
    url:  "{{ route('temp-images.create') }}",
    maxFiles: 1,
    paramName: 'image',
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg,image/png,image/gif",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }, success: function(file, response){
        $("#image_id").val(response.image_id);
        //console.log(response)
    }
});

     

  </script>
     
  @endsection