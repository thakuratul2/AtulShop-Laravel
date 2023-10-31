@extends('admin.layout.app')

@section('title')
    {{'Roles'}}
@endsection
@section('add-role')
<button type="button" class="btn btn-gradient-primary btn-rounded btn-icon">
  <i class="mdi mdi-plus"></i>
</button>
@endsection
@section('content')
    
<div class="card">
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          
          <th> Role </th>
          <th> Permission </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>



  @endsection