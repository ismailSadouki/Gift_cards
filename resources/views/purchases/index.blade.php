@extends('layouts.main')

@section('content')
<div class="container">

    <div class="row justify-content-center">  
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Purchases</div>

                <div class="card-body">
                    
                    @if($items->count())

                    <table class="table ">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="overflow: auto; white-space: nowrap;">Gift card</th>
                                <th scope="col" style="overflow: auto; white-space: nowrap;">Price</th>
                                <th scope="col" style="overflow: auto; white-space: nowrap;">The date of purchase</th>
                                <th scope="col" style="overflow: auto; white-space: nowrap;">quantity</th>
                                <th scope="col" style="overflow: auto; white-space: nowrap;">total price</th>
                                <th style="overflow: auto; white-space: nowrap;">show codes</th>
                            </tr>
                        </thead>
                        @php($totalPrice = 0)
                        @foreach($items as $item)
                            @php($totalPrice += $item->price * $item->pivot->quantity)

                            <tbody>
                                <tr>
                                    <th scope="row" >{{ $item->title }}</th>
                                    <td>{{ $item->price }} $</td>
                                    <td>{{ $item->pivot->purchased_at}}</td>
                                    <td>{{ $item->pivot->quantity}}</td>
                                    <td>{{ $item->price * $item->pivot->quantity}} $</td>
                                    <td>
                                        <a href="{{route('purchases.show',$item->pivot->id)}}"edit class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i>show</a>
                                    </td>
                                   
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                    <h4>The Price total: ${{ $totalPrice }} </h4>
                    <div id="paypal-button"></div>
                    @else

                    <h6>You have not purchased any product</h6>
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
   
@endsection