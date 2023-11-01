@extends('admin.layout.app')

@section('title')
    {{'Create Role'}}
@endsection

@section('content')
    
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
      
        <form class="forms-sample">
          <div class="form-group">
            <label for="rolename">Name</label>
            <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter Name Role">
          </div>
          
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>



  @endsection