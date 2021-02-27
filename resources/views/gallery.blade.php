@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{$title}}</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form action="{{route('search')}}" method="GET" class="form-inline col-md-6 justify-content-center">
                                <input type="text" name="keyword" class="form-control mx-sm-3 mb-2">
                                <button type="submit" class="btn btn-secondary">search</button>
                            </form>
                        </div>
                        <hr>
                        <br>
                        
                        <div class="row">
                            @if ($products->count())
                                @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="d-block h-100 mb-2 border rounded">
                                            <a href="{{route('product.details',$product->id)}}" style="color:#555555">
                                                <img src="{{ asset('storage/'.$product->cover_image) }}" alt="" class="img:fluid img-thumbnail">
                                                <b><p style="height:25px">{{$product->title}}</p></b>
                                            </a>    

                                            <br>
                                            <b>price :  $ {{ $product->price }}</b>

                                            @auth
                                               <form action="{{route('order.add')}}" method="POST">
                                                @csrf
                                              
                                                 <input name="id" type="hidden" value="{{$product->id}}" >
                                                  @foreach ($codes as $code)
                                                        <p style="color:red">  in stock {{$number_of_codes = $code->where(['product_id'=> $product->id,'bought' => FALSE])->get()->count()}} gift cards</p>
                                                        @if ($number_of_codes > 0)
                                                          <input class="form-control mr-1 " name="quantity" type="number" value="0" min="1" max="{{$number_of_codes}}" style="width:40% , float:right" required >
                                                          <button type="submet" class="btn  btn-primary mt-2" style="margin-right: 10px">اضف <i class="fas fa-cart-plus"></i></button> 
                                                        @else    
                                                        <input class="form-control disabled" name="quantity" type="number" value="0" min="1" max="{{$number_of_codes}}" style="width:40% , float:right" required >
                                                          <div type="" class="btn disabled btn-primary mt-2" style="margin-right: 10px">اضف <i class="fas fa-cart-plus"></i></div> 
                                                            
                                                        @endif
                                                        
                                                        @break

                                                  @endforeach
                                               </form>
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                             <h6>لا نتائج</h6>   
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection