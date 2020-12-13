@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Account is Being Reviewed') }}</div>

                <div class="card-body">
                    Your account is waiting for our administrator approval.
                    <br />
                    Please check back later or contact Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
