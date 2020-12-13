@extends('layouts.seller.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">
@endsection

@section('content')
<div class="card">
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Add Product Brands') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-12">
                                <input type="text" name="brand_name" class="form-control" />
                                @error('brand_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __(' Image') }}</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Store Brand') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="bg-white" min-height="100%" style="padding-top:20px; border: 1px solid #9d9d9d;">
                <div class="card-body">
                    <table class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{$brand->id}}</th>
                                <td>{{$brand->name}}</td>
                                <td><a href=""><img src="{{$brand->image}}" height=" 80px" weight="80px"/></a></td>
                                <td>
                                    <form action="{{route('brand.delete',$brand->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete Brand</button>
                                        <a  href="{{route('brand.edit',$brand->id)}}" class="btn btn-sm btn-info">Edit Brand</a>
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
        @endsection

@section('scripts')


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable( {
            "order": [[ 0, "dsc" ]]
        });
    });
</script>
@endsection