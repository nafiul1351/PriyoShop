@extends('layouts.seller.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">
@endsection

@section('content')
<div class="container-fluid">
    <div class="bg-white" min-height="100%" style="padding-top:20px; >
        <div class="card-body">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col"> Brand</th>
                        <th scope="col">Company</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Available Quantity</th>
                        <th scope="col">Colors</th>
                        <th scope="col">Product Model</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($products as $product)
                    <?php
                        $p = App\Product::find($product->id);
                    ?>
                    <tr>
                        <td>{{ $p->id}}</td>
                        <td>{{ $p->name}}</td>
                        <td>{{ $p->brand->name}}</td>
                        <td>{{ $p->company_name}}</td>
                        <td>{{ $p->category->name}}</td>
                        <td>{{ $p->price}}</td>
                        <td>{{ $p->quantity}}</td>
                        <td>{{ $p->productDetail->color}}</td>
                        <td>{{ $p->productDetail->model}}</td>
                        <td>
                            <img src="{{ asset($p->productImages[0]->image)}}" alt="{{ $p->name}}" width="100px" height="100px">
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('product.edit',$product->id)}}">Edit</a>
                            <form action="{{route('product.delete',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger mt-2" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            "order": [[ 0, "asc" ]]
        });
    });
</script>
@endsection
