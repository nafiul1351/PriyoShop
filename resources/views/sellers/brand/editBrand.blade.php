@extends('layouts.seller.app')
@section('content')
<div class="card">
    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit Product Brands') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('brand.update',$brand->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-12">
                                <input type="text" name="brand_name" class="form-control"  value="{{$brand->name}}"/>
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
                                <input type="file" class="form-control" name="image" value="{{$brand->image}}">
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
                                    {{ __('Update Brand') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection