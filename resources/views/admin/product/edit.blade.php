@extends('admin.layout.app')

@section('title')
    {{'Edit Products'}}
@endsection

@section('add-role')
    <a href="{{route('product.view')}}"><button type="button" class="btn btn-gradient-primary btn-sm">Back</button></a>
@endsection

@section('content')
<section class="content">
    <!-- Default box -->
    <form action="" method="post" name="productForm" id="productForm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$product->title}}" placeholder="Title">	
                                <p class="error"></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{{$product->description}}</textarea>
                                    <p class="error"></p>

                                </div>
                            </div>                                            
                        </div>
                    </div>	                                                                      
                </div>
               
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Pricing</h2>								
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" placeholder="Price">	
                                    <p class="error"></p>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="compare_price">Compare at Price</label>
                                    <input type="text" name="compare_price" id="compare_price" value="{{$product->compare_price}}" class="form-control" placeholder="Compare Price">
                                    <p class="text-muted mt-3">
                                        To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
                                    </p>
                                   
                                </div>
                            </div>                                            
                        </div>
                    </div>	                                                                      
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Inventory</h2>								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sku">SKU (Stock Keeping Unit)</label>
                                    <input type="text" name="sku" id="sku" class="form-control" value="{{$product->sku}}" placeholder="sku">	
                                    <p class="error"></p>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" name="barcode" id="barcode" value="{{$product->barcode}}" class="form-control" placeholder="Barcode">	
                                </div>
                            </div>   
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="hidden" name="track_qty" value="No">
                                        <input class="custom-control-input" type="checkbox" id="track_qty" value="Yes" {{($product->track_qty == 'Yes') ? 'checked' : ''}} name="track_qty" checked>
                                        <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                    </div>
                                </div>
                                <div class="mb-3">

                                    <input type="number" min="0" name="qty" id="qty" value="{{$product->qty}}" class="form-control" placeholder="Qty">
                                    <p class="error"></p>
	
                                </div>
                            </div>                                         
                        </div>
                    </div>	                                                                      
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">	
                        <h2 class="h4 mb-3">Product status</h2>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option {{($product->status == 1) ? 'selected' : '' }} value="1">Active</option>
              <option {{($product->status == 0) ? 'selected' : '' }} value="0">Block</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body">	
                        <h2 class="h4  mb-3">Product category</h2>
                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>
                               
                                @if ($categories->isNotEmpty())
                                @foreach ($categories as $item)
                                    <option {{($product->category_id == $item->cid) ? 'selected' : ''}} value="{{$item->cid}}">{{$item->name}}</option>
                                @endforeach
                                    
                                @endif
                               
                                    
                             
                               
                            </select>
                            <p class="error"></p>

                        </div>
                        <div class="mb-3">
                            <label for="category">Sub category</label>
                            <select name="sub_category" id="sub_category" class="form-control">
                                @if ($subCat->isNotEmpty())
                                @foreach ($subCat as $item2)
                                    <option {{($product->sub_category_id == $item2->sub_id) ? 'selected' : ''}} value="{{$item2->sub_id}}">{{$item2->name}}</option>
                                @endforeach
                                    
                                @endif
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="card mb-3">
                    <div class="card-body">	
                        <h2 class="h4 mb-3">Product brand</h2>
                        <div class="mb-3">
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select a Brand</option>
                               
                                @if ($brands->isNotEmpty())
                                @foreach ($brands as $item3)
                                    <option {{($product->brand_id == $item3->bid) ? 'selected' : ''}} value="{{$item3->bid}}">{{$item3->name}}</option>
                                @endforeach
                                    
                                @endif
                            
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="card mb-3">
                    <div class="card-body">	
                        <h2 class="h4 mb-3">Featured product</h2>
                        <div class="mb-3">
                            <select name="is_featured" id="is_featured" class="form-control">
                                <option {{($product->is_featured == 'No') ? 'selected' : ''}} value="No">No</option>
                                <option {{($product->is_featured == 'Yes') ? 'selected' : ''}} value="Yes">Yes</option>                                                
                            </select>
                        </div>
                    </div>
                </div>                                 
            </div>
        </div>
        
        <div class="pb-5 pt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </form>
    <!-- /.card -->
</section>
@endsection

@section('customJs')
    <script>
        $("#productForm").submit(function(event){
            event.preventDefault();
          var formArray = $(this).serializeArray();
          $("button[type='submit']").prop('disables',true);
            $.ajax({
                url:'{{route ("product.update", $product->pid)}}',
                type:'put',
                data: formArray,
                dataType: 'json',
                success: function(response){
                    $("button[type='submit']").prop('disables',false);

                if(response['status'] == true){
                    window.location.href="{{route('product.view')}}"

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

                }else{
                    var errors = response['errors'];

                    // if(errors['title']){
                    //     $("#title").addClass('is-invalid')
                    //     .siblings('p')
                    //     .addClass('invalid-feedback')
                    //     .html(errors['title']);
                    // }else{
                    //     $("#title").addClass('is-invalid')
                    //     .siblings('p')
                    //     .addClass('invalid-feedback')
                    //     .html("");
                    // }

                    $('.error').removeClass('invalid-feedback').html('');
                    
                    $('input[type="text"], select','input[type="number"]').removeClass('is-invalid');

                    $.each(errors, function(key, value){
                        $(`#${key}`).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value);
                    })
                }
                },
                error: function(){
                    console.log("Something Went Wrong");
                }
            });
        });

        // $("#category").change(function(){
        //     var category_id = $(this).val();
        //     $.ajax({
        //         url:'{{ route("productsub.view") }}',
        //         type:'get',
        //         data: {category_id:category_id},
        //         dataType: 'json',
        //         success: function(response){
        //             //console.log(response);
        //             $("#sub_category").find("option").not(":first").remove();
        //             $.each(response['subCategories'], function(key, item){

        //                 $("#sub_category").append(`<option value='${item.sub_id}'>${item.name}</option`)
        //             });
        //         },
        //         error: function(){
        //             console.log("Something Went Wrong");
        //         }
        //     });
        // });
       
    </script>
@endsection