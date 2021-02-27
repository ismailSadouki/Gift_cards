@extends('theme.default')

@section('heading')
Modify product data
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="card mb-4 col-md-8">
        <div class="card-header text-right">
            Edit product data
        </div>
        <div class="card-body">
            <form action="{{ route('products.show',$product )}}" method="POST" enctype="multipart/form-data">
               @method('patch')
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label text-md-right">Product Title</label>

                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$product->title}}" autocomplete="title">

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               

                <div class="form-group row">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-right">Product Photo</label>

                    <div class="col-md-6">
                        <input id="cover_image" accept="image/*" type="file" onchange="readCoverImage(this);" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image">

                        @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="{{asset('storage/'.$product->cover_image)}}">
                    </div>
                </div>

              

            

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">description</label>

                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control  summernote @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ $product->description }}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


            

                <div class="form-group row">
                    <label for="instruction" class="col-md-4 col-form-label text-md-right">Instruction</label>

                    <div class="col-md-6">
                        <textarea id="instruction" type="text" class="form-control  summernote @error('instruction') is-invalid @enderror" name="instruction" autocomplete="instruction">{{ $product->instruction }}</textarea>


                        @error('instruction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="notes" class="col-md-4 col-form-label text-md-right">Notes</label>

                    <div class="col-md-6">
                        <textarea id="notes" type="text" class="form-control summernote @error('notes') is-invalid @enderror" name="notes" autocomplete="description">{{ $product->notes }}</textarea>


                        @error('notes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                    <div class="col-md-6">
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" autocomplete="price">

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Edit</button>
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
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection