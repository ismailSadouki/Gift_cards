@extends('theme.default')

@section('heading')
Add new codes
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-right">
            Add new codes
        </div>
        <div class="card-body">
            <form action="{{ route('codes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="product" class="col-md-4 col-form-label text-md-right">product</label>

                    <div class="col-md-6">
                        <select id="product" class="form-control" name="product">
                            <option disabled selected>Choose the product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                            @endforeach
                        </select>

                        @error('product')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="code" class="col-md-4 col-form-label text-md-right">code</label>

                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" placeholder="This field is required">

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="code2" class="col-md-4 col-form-label text-md-right">code</label>

                    <div class="col-md-6">
                        <input id="code2" type="text" class="form-control @error('code2') is-invalid @enderror" name="code2" value="{{ old('code2') }}" autocomplete="code2" placeholder="This field can be empty">

                        @error('code2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code3" class="col-md-4 col-form-label text-md-right">code</label>

                    <div class="col-md-6">
                        <input id="code3" type="text" class="form-control @error('code3') is-invalid @enderror" name="code3" value="{{ old('code3') }}" autocomplete="code3" placeholder="This field can be empty">

                        @error('code3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="code4" class="col-md-4 col-form-label text-md-right">code</label>

                    <div class="col-md-6">
                        <input id="code4" type="text" class="form-control @error('code4') is-invalid @enderror" name="code4" value="{{ old('code4') }}" autocomplete="code4" placeholder="This field can be empty">

                        @error('code4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="code5" class="col-md-4 col-form-label text-md-right">code</label>

                    <div class="col-md-6">
                        <input id="code5" type="text" class="form-control @error('code5') is-invalid @enderror" name="code5" value="{{ old('code5') }}" autocomplete="code5" placeholder="This field can be empty">

                        @error('code5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function readCoverImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
            $('#cover-image-thumb')
                .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection