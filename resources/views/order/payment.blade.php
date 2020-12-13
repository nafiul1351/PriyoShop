@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="row ">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Add Payment') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('order.payment',$order->id)}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __(' Payment options') }}</label>

                            <div class="col-md-12">
                                <label for="cod">
                                <input type="radio" name="payment" id="cod" value="cod" class="form-control"  /> Cash on Delivery
                                </label>
                                <label for="ssl" style="padding-left: 10px">
                                    <input type="radio" name="payment" id="ssl" value="ssl" class="form-control"  /> Online Payment
                                </label>
                                @error('brand_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Payment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection