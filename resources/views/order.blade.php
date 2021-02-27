@extends('layouts.main')

@section('content')
<div class="container">

    <div class="row justify-content-center">  
        <div id="success" style="display: none" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">The purchase was completed successfully </div> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Shopping cart</div>

                <div class="card-body">
                    
                    @if($items->count())

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Gift card</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">total price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        @php($totalPrice = 0)
                        @foreach($items as $item)
                            @php($totalPrice += $item->price * $item->pivot->quantity)

                            <tbody>
                                <tr>
                                    <th scope="row">{{ $item->title }}</th>
                                    <td>{{ $item->price }} $</td>
                                    <td>{{ $item->pivot->quantity}}</td>
                                    <td>{{ $item->price * $item->pivot->quantity}} $</td>
                                    <td>
                                        <form style="float:left; margin: auto 5px" method="post" action="{{ route('order.remove_all', $item->id) }}">
                                            @csrf
                                            <button class="btn btn-danger btn-sm wd-10"  type="submit"> Remove All </button>
                                        </form>

                                        <form style="float:left; margin: auto 5px" method="post" action="{{ route('order.remove_one', $item->id) }}">
                                            @csrf
                                            <button class="btn btn-warning btn-sm mt-1 wd-10"  type="submit">Remove One</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>

                    <h4>The final total: ${{ $totalPrice }} </h4>
                    <div id="paypal-button"></div>
                    @else

                    <h6>There are no books in the cart</h6>
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
    paypal.Button.render({
        env: 'sandbox', // Or 'production'
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
        // 2. Make a request to your server
        return actions.request.post('/api/create-payment', {
          userId: "{{ auth()->user()->id }}"
        })
            .then(function(res) {
            // 3. Return res.id from the response
            return res.id;
            });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback   
        onAuthorize: function(data, actions) {
        // 2. Make a request to your server
        return actions.request.post('/api/execute-payment', {
            paymentID: data.paymentID,
            payerID:   data.payerID,
            userId: "{{ auth()->user()->id }}"
        })
        .then(function(res) {
            $('#success').slideDown(200);
            $('.card-body').slideUp(0);
        });
        }
    }, '#paypal-button');
    </script>
@endsection