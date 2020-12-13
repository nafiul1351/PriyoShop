@extends('layouts.admin.app')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        <h3>Add Slider image</h3>
    </div>
    <!--slider area -->
    <div class="card-body  col-sm-4">
        <div class="container-fuild">
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group control-group increment mb-2">
                    <input type="file" name="image" class="form-control" >
                </div>
                <input type="submit" name="submit" value="Add Slider" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<div class="card" style="margin:auto">
                <div class="card-header">
                    <h3>Slider Images</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($sliders as $slider)
                        <div class="col-md-4 text-center">
                         <a href="{{$slider->image}}"><img src="{{$slider->image}}" style="height:150px;width:200px; margin:10px auto; border:1px solid #888888"/></a>
                            <div class="col-md-12 text-center">
                                <form action="{{route('slider.delete',$slider->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-primary btn-sm" value="Delete">
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
   </div>     

@endsection
