@extends('layouts.seller.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edit Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-0 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parent_category_id"
                                class="col-md-0 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-12">

                                <select id="parent_category_id" name="parent_category_id" class="form-control">
                                    <option value="">Chosse Parent Category</option>
                                    @if(isset($categories) && !empty($categories))
                                    @foreach($categories as $cat)
                                    @if(isset($category->parentCategory) &&  $category->parentCategory != null)
                                    <option value="{{$cat->id}}" {{($cat->id == $category->parentCategory->id)?'selected':''}}>{{$cat->name}}</option>
                                    @else
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                    @endforeach
                                    @endif
                                </select>

                                @error('parent_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Category') }}
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
