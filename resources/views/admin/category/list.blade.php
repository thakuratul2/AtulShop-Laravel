@extends('admin.layout.app')

@section('title')
    {{'Category List'}}
@endsection

@section('add-role')
<a href="{{route('categories.create')}}"><button type="button" class="btn btn-gradient-primary btn-rounded btn-icon">
    <i class="mdi mdi-plus"></i>
  </button></a>
@endsection
@section('content')
    



  @endsection