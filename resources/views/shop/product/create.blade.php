@extends('layouts.seller.app')

@section('style')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add Product</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            @if(!Auth::user()->shops->isEmpty())
            <div class="alert alert-info">
                <strong>Please add ',' for multiple color or size</strong>
            </div>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="shop" class="form-control-label">Shop Name</label>
                    <select name="shop_id" id="shop" class="form-control">
                        <option value="">Please select a shop</option>
                        @foreach(Auth::user()->shops as $shop)
                        @if($shop->approved)
                        <option value="{{$shop->id}}" {{($shop->id == old('shop_id'))?'selected':''}}>{{$shop->name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('shop_id')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand" class="form-control-label">Brand Name</label>
                    <select name="brand" id="brand" class="form-control">
                        <option value="">Please select a brand</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('brand')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="name" class="form-control" name="name" placeholder="Enter the product name"
                        value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Company Name</label>
                    <input type="text" class="form-control" name="company_name" placeholder="Enter the company name"
                        value="{{ old('company_name') }}">
                    @error('company_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category" class="form-control-label">Category</label>
                    <select name="category_id" id="category" class="form-control" value="{{old('category_id')}}">
                        <option value="">Please select a category</option>
                        @if(!$categories->isEmpty())
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{($category->id == old('category'))?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" placeholder="Enter the product price" value="{{old('price')}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Enter the product quantity" value="{{old('quantity')}}" step="0.1">
                    @error('quantity ')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Enter the product color"
                        value="{{ old('color') }}">
                    @error('color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" name="size" placeholder="Enter the product size"
                        value="{{ old('size') }}">
                    @error('size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="model">Product Model</label>
                    <input type="text" class="form-control" name="model" placeholder="Enter the product model" value="{{old('model')}}">
                    @error('model')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group control-group increment">
                    <input type="file" name="image[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="button"><i
                                class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone d-none">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="image[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>
                                Remove</button>
                        </div>
                    </div>
                </div>
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" name="description" col="3" row="80">{{old('description')}}</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
            @else
            <div class="alert alert-danger">
                Please add one shop first!
            </div>
            @endif
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $(".btn-success").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });

    });
</script>
@endsection
