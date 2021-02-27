@extends('theme.default')

@section('heading')
    View product details
@endsection

@section('head')
    <style>
        table{
            table-layout: fixed;
        }

        table tr th{
            width: 30%;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product details</div>

                <div class="card-body">
                    <table class="table table-stribed">
                        <tr>
                            <th>Title</th>
                            <td class="lead"><b>{{$product->title}}</b></td>
                        </tr>

                        <tr>
                            <th></th>
                            <td><img src="{{asset('storage/'.$product->cover_image)}}" class="img-fluid img-thumbnail" alt=""></td>
                        </tr>



                        @if ($product->description)
                            <tr>
                                <th>Description</th>
                                <td>{!! $product->description !!}</td>
                            </tr>
                        @endif

                        @if ($product->instruction)
                            <tr>
                                <th>instruction</th>
                                <td>{!!$product->instruction!!}</td>
                            </tr>
                        @endif    
  
                        @if ($product->notes)
                        <tr>
                            <th>Notes</th>
                            <td>{!!$product->notes!!}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Price</th>
                            <td>{{$product->price}}</td>
                        </tr>

                        

                    </table>
                    <a href="{{route('products.edit',$product)}}" class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{route('products.destroy',$product)}}" method="POST" class="d-inline-block" >
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm mb-2" style="margin-left: 0px;border-left-width: 7px;" type="submit" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i>Delete</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
