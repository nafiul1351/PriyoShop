@extends('layouts.admin.app')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">
@endsection

@section('content')
<div class="container">
    <div class="bg-white" min-height="100%" style="padding-top:20px; border: 1px solid #9d9d9d;">
        <div class="card-body">
            <table class="table table-bordered datatable mb-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inactiveShop as $shop)
                    <tr>
                        <th scope="row">{{$shop->id}}</th>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->address}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="{{route('shop.approve',$shop->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-success" type="submit">Approve</button>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{route('shop.delete',$shop->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete Shop</button>
                                    </form>
                                </div>
                            </div>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
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
