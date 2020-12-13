@extends('layouts.admin.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">
@endsection

@section('content')
<div class="container">
    <div class="bg-white" min-height="100%" style="padding-top:20px; border: 1px solid #9d9d9d;">
        <div class="card-body">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeShop as $shop)
                    <tr>
                        <th scope="row">{{$shop->id}}</th>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->address}}</td>
                        <td>
                            <form action="{{route('shop.delete',$shop->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" type="submit">Delete Shop</button>
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
