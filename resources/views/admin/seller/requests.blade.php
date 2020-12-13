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
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inactiveSellers as $seller)
                    <tr>
                        <th scope="row">{{$seller->id}}</th>
                        <td>{{$seller->name}}</td>
                        <td>{{$seller->email}}</td>
                        <td>{{$seller->phone}}</td>
                        <td>{{ucfirst($seller->type)}}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="{{route('seller.approve',$seller->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-success" type="submit">Approve</button>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form action="{{route('seller.delete',$seller->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">Delete Seller</button>
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
