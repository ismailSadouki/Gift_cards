@extends('layouts.main')

@section('content')
<div class="container">

    <div class="row justify-content-center">  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach ($products_title as $product_title) 
                       {{$product_title->title}} 
                    @endforeach
                </div>

                <div class="card-body">
                    

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Code</th>
                            </tr>
                        </thead>
                        @foreach($codes as $code)

                            <tbody>
                                <tr>
                                   
                                    <td>{{$code->code}}</td>
                            
                                   
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
   
@endsection