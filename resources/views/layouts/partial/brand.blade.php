<?php
$brands =\App\Brand::all();
?>
<div class="partner-logo" id="brand">
        <div class="container">
            <div class="logo-carousel owl-carousel">
            @foreach($brands as $brand)
                <div class="logo-item">
                    <div class="tablecell-inner">
                    <a href="{{route('brand.product',$brand->id)}}"><img src="{{$brand->image}}" alt=""  height="90px" weight="200px"></a>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>