@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Products
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('product.create')}}"></i> Create Product</a></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Product Management</li>
                        </ul>
                        <p class="float-right">Total Products :{{\App\Models\Product::count()}}</p>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('backend.layouts.notification')
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Product</strong> List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Price</th>                                
                                        <th>Size</th>                                        
                                        <th>Status</th>  
                                        <th>Actions</th>                                      
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($products as $item)
                                        @php
                                            $photo=explode(',',$item->photo);
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->title}}</td>
                                            <td><img src="{{asset($photo[0])}}" alt="product image" style="max-height: 90px; max-width: 120px"></td>
                                            <td>RM{{number_format($item->price,2)}}</td>
                                            
                                            <td>{{$item->size}}</td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{route('product.show',$item->id)}}" data-toggle="tooltip" title="add attribute" class="float-left btn btn-sm btn-outline-secondary mr-1 mb-1" data-placement="bottom"><i class="icon-plus"></i> </a>{{-- checked ep32 1140 --}}                                                                                           
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#productID{{$item->id}}" data-toggle="tooltip" title="view" class="mr-1 float-left btn btn-sm btn-outline-info" data-placement="bottom"><i class="icon-eye"></i> </a>
                                                <a href="{{route('product.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="icon-pencil"></i> </a>
                                                <form class="float-left ml-1" action="{{route('product.destroy',$item->id)}}"  method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="icon-trash"></i> </a>
                                                </form>

                                            </td>


                                            <!-- Modal -->
                                            <div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                        @php
                                                            $product=\App\Models\Product::where('id',$item->id)->first();
                                                        @endphp
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">{{\Illuminate\Support\Str::upper($product->title)}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Summary:</strong>
                                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                                            <strong>Description:</strong>
                                                            <p>{!! html_entity_decode($product->description) !!}</p>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Price:</strong>
                                                                    <p>RM{{number_format($product->price,2)}}</p>
                                                                </div>                                                                
                                                                <div class="col-md-4">
                                                                    <strong>Stock:</strong>
                                                                    <p>{{$product->stock}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Category:</strong>
                                                                    <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Child Category:</strong>
                                                                    <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Brand:</strong>
                                                                    <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Size:</strong>
                                                                    <p class="badge badge-success">{{$product->size}}</p>
                                                                </div>
                                                                {{-- <div class="col-md-4">
                                                                    <strong>Vendor:</strong>
                                                                    <p >{{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</p>
                                                                </div> --}}
                                                            </div>

                                                            <div class="row">                                                        
                                                                <div class="col-md-6">
                                                                    <strong>Status:</strong>
                                                                    <p class="badge badge-warning">{{$product->status}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form=$(this).closest('form');
            var dataID=$(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

        });
    </script>
    <script>
        $('input[name=toogle]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url:"{{route('product.status')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    mode:mode,
                    id:id,
                },
                success:function (response) {
                    if(response.status){
                        alert(response.msg);
                    }
                    else{
                        alert('Please try again!');
                    }
                }
            })
        });
    </script>
@endsection
