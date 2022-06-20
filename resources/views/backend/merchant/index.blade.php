@extends('backend.layouts.master')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Merchant List
                            <a class="btn btn-sm btn-outline-secondary" href="{{route('merchant.create')}}">Create Merchant</a></h2></h2>
                        <ul class="breadcrumb float-left">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Merchant Stores</li>
                        </ul>
                        <p class="float-right">Total Merchants :{{$merchants->count()}}</p>{{-- checked ep41 4513 --}}
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
                            <h2><strong>Merchant List</strong></h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Photo</th>
                                        <th>Full name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Is Verified</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($merchants as $item){{-- checked ep41 4754 --}}
                                        <tr>
                                            <td>{{$loop->iteration}}</td>{{-- checked ep41 4754 --}}
                                            <td><img src="{{$item->photo ==null ? Helper::userDefaultImage() : asset($item->photo)}}" alt="Profile" style="max-height: 90px; max-width: 120px"></td>{{-- checked ep41 4754 --}}
                                            <td>{{$item->full_name}}</td>{{-- checked ep41 4754 --}}
                                            <td>{{$item->username}}</td>{{-- checked ep41 4754 --}}
                                            <td>{{$item->email}}</td>{{-- checked ep41 4754 --}}
                                            <td>{{$item->address}}</td>{{-- checked ep41 4754 --}}
                                            <td>{{$item->phone}}</td>{{-- checked ep41 4754 --}}
                                            <td>
                                                <input type="checkbox" name="verified" value="{{$item->id}}" data-toggle="switchbutton" {{$item->is_verified ? 'checked' : ''}} data-onlabel="Yes" data-offlabel="No" data-size="sm" data-onstyle="success" data-offstyle="danger">{{-- checked ep41 5313 --}}
                                            </td>

                                            <td>
                                                <input type="checkbox" name="toogle" value="{{$item->id}}" data-toggle="switchbutton" {{$item->status=='active' ? 'checked' : ''}} data-onlabel="active" data-offlabel="inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                            </td>
                                            <td>
                                                <a href="{{route('merchant.edit',$item->id)}}" data-toggle="tooltip" title="edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="icon-pencil"></i> </a>
                                                <form class="float-left ml-1" action="{{route('merchant.destroy',$item->id)}}"  method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" data-toggle="tooltip" title="delete" data-id="{{$item->id}}" class="dltBtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="icon-trash"></i> </a>
                                                </form>
                                            </td>
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
                url:"{{route('merchant.status')}}",
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
        $('input[name=verified]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            // alert(id);
            $.ajax({
                url:"{{route('merchant.verified')}}",
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
