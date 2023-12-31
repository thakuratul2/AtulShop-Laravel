@extends('admin.layout.app')

@section('title')
    {{'Brands List'}}
@endsection

@section('add-role')
<a href="{{route('brands.create')}}"><button type="button" class="btn btn-gradient-primary btn-rounded btn-icon">
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
            <button type="button" onclick="window.location.href='{{route('brands.view')}}'" class="btn btn-secondary btn-fw">Reset</button>
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
              <th width="60">Brand ID</th>
              <th>Brand Name</th>
              
              <th width="100">Status</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>
            
                
              @if ($brands->isNotEmpty())
              @foreach ($brands as $item)
                  <tr>
                    <td>{{$item->bid}}</td>
                    <td>{{$item->name}}</td>
                   
                  
             
              <td>
                 @if ($item->status == 1)
                <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                @else
                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                @endif
              </td>
              <td>
                <a href="{{route('brands.edit', $item->bid)}}">
                  <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </a>
                <a href="#" onclick="deleteBrandsCategory({{$item->bid}})" class="text-danger w-4 h-4 mr-1">
                  <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </a>
              </td>
            </tr>
            @endforeach
            @else
            <tr>
              <td colspan="5">Records Not Found</td>
            </tr>
                  
            @endif
         
            
          </tbody>
        </table>										
      </div>
      <div class="card-footer clearfix">
       {{-- {{$brands->links()}} --}}
      
      </div>
  
    </div>
  </div>
  <!-- /.card -->
</section>



  @endsection

  @section('customJs')
  <script>
    function deleteBrandsCategory(bid){

      var url = '{{ route("brands.delete", "bid") }}';
      var newUrl = url.replace("bid", bid);
      

      if(confirm("Are your sure you want to delete")){
        $.ajax({

url : newUrl,
type: 'delete',
data : {},
dataType: 'json',

headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
success : function(response){

$("button[type=submit]").prop('disabled', false);
window.location.href="{{route('brands.view')}}"



  }
});
      }
      
}
  </script>
  
@endsection