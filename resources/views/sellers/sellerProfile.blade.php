@extends('layouts.seller.app')
    @section('style')
    <link href="{{asset('frontend/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    @endsection
    @section('content')
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">Your Profile</div>
          <div class="card-body">
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered" style="text-align:center;">
              <thead>
                <tr>
                  <th> Name</th>
                  <th>Your Email</th>
                  <th>Your Phone</th>
                  <th>Your Company</th>
                  <th>Your Bkash</th>
                  <th>Your Rocket</th>
                  
                </tr>
              </thead>
              <tbody>
                  <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->sellerDetials->company_name}}</td>
                  <td>{{$user->sellerDetials->bkash}}</td>
                  <td>{{$user->sellerDetials->rocket}}</td>
                  
                  </tr>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
  
    @endsection