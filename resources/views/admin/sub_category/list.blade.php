@extends('admin.layout.app')

@section('title')
    {{'Sub-Category List'}}
@endsection

@section('add-role')
<a href="{{route('subcat.create')}}"><button type="button" class="btn btn-gradient-primary btn-rounded btn-icon">
    <i class="mdi mdi-plus"></i>
  </button></a>
@endsection
@section('content')
<section class="content2">
  <!-- Default box -->
  <div class="container-fluid">
    @include('admin.message')
    <div class="card">
      <form action="" method="get">
     
        <div class="card-header">
          <div class="card-title">
            <button type="button" onclick="window.location.href='{{route('admin.category')}}'" class="btn btn-secondary btn-fw">Reset</button>
          </div>
       
        <div class="card-tools">
          <div class="input-group input-group" style="width: 250px;">
            <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
  
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
              </button>
            </div>
            </div>
         
        </div>
      
      </div>
    </form>
      <div class="card-body table-responsive p-0">								
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th width="60">ID</th>
              <th>Name</th>
              
              <th width="100">Status</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            
                
              </td>
              <td>
                {{-- <a href="">
                  <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </a>
                <a href="#" class="text-danger w-4 h-4 mr-1">
                  <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </a> --}}
              </td>
            </tr>
            
         
            
          </tbody>
        </table>										
      </div>
      <div class="card-footer clearfix">
       
        {{-- <ul class="pagination pagination m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul> --}}
      </div>
  
    </div>
  </div>
  <!-- /.card -->
</section>



  @endsection

  @section('customJs')
  
@endsection