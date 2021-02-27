@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show product details</div>

                <div class="card-body">
                    <table class="table table-stribed">
                        <tr>
                            <th>Product :</th>
                            <td class="lead"><b>{{$product->title}}</b></td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <img src="{{asset('storage/'.$product->cover_image)}}" class="img-fluid img-thumbnail" alt="">
                                <p>
                                    {{-- يحسب عدد الاكواد الموجودة في المخزان الخاصة بهذا المنتج --}}
                                    <p style="color: red"> in stock :
                                        @foreach ($codes as $code)
                                            {{$code->where('product_id','=', $product->id)->get()->count()}}
                                        @break

                                        @endforeach
                                        gift cards
              
                                    </p>
                                </p>
                            </td>
                        </tr>


                        @if ($product->description)
                            <tr>
                                <th>description :</th>
                                <td>{!!$product->description!!}</td>
                            </tr>
                        @endif

                        @if ($product->instruction)
                            <tr>
                                <th>instruction : </th>
                                <td>{!!$product->instruction!!}</td>
                            </tr>
                        @endif    
                        <tr>
                            <th>Notes :</th>
                            <td>{!!$product->notes!!}</td>
                        </tr>

                        <tr>
                            <th>Price :</th>
                            <td>{{$product->price}} $</td>
                        </tr>

                        

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection