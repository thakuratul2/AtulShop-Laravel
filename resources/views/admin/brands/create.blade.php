@extends('admin.layout.app')

@section('title')
    {{'Add Brands'}}
@endsection

@section('add-role')
    <a href="{{route('brands.view')}}"><button type="button" class="btn btn-gradient-primary btn-sm">Back</button></a>
@endsection
@section('content')
<section class="content">
  <!-- Default box -->
  <div class="container-fluid">
    <form action="" name="subCategory" id="subCategory">
    <div class="card">
      <div class="card-body">								
        <div class="row">
                            
          <div class="col-md-6">
            <div class="mb-3">
              <label for="name">Brand Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
            <p></p>
            </div>
          </div>
          {{-- <div class="col-md-6">
            <div class="mb-3">
              <label for="email">Slug</label>
              <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
            </div>
          </div>									 --}}
          <div class="col-md-6">
            <div class="mb-3">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="1">Active</option>
                <option value="0">Draft</option>
              </select>
            </div>
            
          </div>
        </div>
      </div>							
    </div>
    <div class="pb-5 pt-3">
      <button class="btn btn-primary">Create</button>
    </div>
    </form>
  </div>
  <!-- /.card -->
</section>
@endsection


  
  @section('customJs')
  <script>
    $("#subCategory").submit(function(event){
  event.preventDefault();
  var element = $(this);
  $("button[type=submit]").prop('disabled', true);

  $.ajax({

    url : '{{route("brands.show")}}',
    type: 'post',
    data : element.serializeArray(),
    dataType: 'json',
    success : function(response){

      $("button[type=submit]").prop('disabled', false);
      if(response["status"] == true){
        window.location.href="{{route('brands.view')}}"

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
      if(errors['category']){
        $("#category").addClass('is-invalid')
        .siblings('p')
        .addClass('invalid-feedback')
        .html(errors['category']);
      }else{
        
        $("#category").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback')
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