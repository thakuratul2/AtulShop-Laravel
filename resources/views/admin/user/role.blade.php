@extends('admin.layout.app')

@section('title')
    {{'Roles'}}
@endsection
@section('add-role')
<a href="{{route('role.create')}}"><button type="button" class="btn btn-gradient-primary btn-rounded btn-icon" href="{{route('role.create')}}">
  <i class="mdi mdi-plus"></i>
</button></a>
@endsection
@section('content')
    
<div class="card">
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          
          <th> Role </th>
          <th> Permission </th>
          <th> Assign By </th>
          <th> Action </th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>



  @endsection