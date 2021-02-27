<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;
use App\Models\User;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use PayPal\Api\PaymentExecution;

class PurchaseController extends Controller
{
    public function createPayment(Request $request) 
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdQUFPr9lEQEdrj6zA-9j2ahk134Cy7-ySvYlQyvc6ameVYGlGWhCpffQ4_ZW_frzG9V9OHKLMC30nYX', 
                'EEfh-5soPtXznj3c9vkIbw2zydB0M72AKR3F87JCxfCdCe4IvavQB4SW9PgXG7MdrbVJ_ZSveDCGeKfJ')
        );

        $shipping = 0;
        $tax = 0;
    
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
    
        $products = User::find($request->userId)->ordersInCart;
        $itemsArray = array();
        $total = 0;
        foreach($products as $product) {
            $total += $product->price * $product->pivot->quantity;
            
            $item = new Item();
            $item->setName($product->title)
            ->setCurrency('USD')
            ->setQuantity($product->pivot->quantity)
            ->setSku($product->id) // Similar to `item_number` in Classic API
            ->setPrice($product->price);
            
            array_push($itemsArray, $item);
        }

        $itemList = new ItemList();
        $itemList->setItems($itemsArray);
    
        $details = new Details();
        $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal($total);
    
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($total + $tax + $shipping)
            ->setDetails($details);
    
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
    
        $baseUrl = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/cart")
            ->setCancelUrl("$baseUrl/cart");
    
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
    
        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
        $approvalUrl = $payment->getApprovalLink();
        return $payment; 
    }

    public function executePayment(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdQUFPr9lEQEdrj6zA-9j2ahk134Cy7-ySvYlQyvc6ameVYGlGWhCpffQ4_ZW_frzG9V9OHKLMC30nYX', 
                'EEfh-5soPtXznj3c9vkIbw2zydB0M72AKR3F87JCxfCdCe4IvavQB4SW9PgXG7MdrbVJ_ZSveDCGeKfJ')
        );
    
        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);
    
        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);
        
        try {
            $result = $payment->execute($execution, $apiContext);  
            $user = User::find($request->userId);
            $products = $user->ordersInCart;
            foreach($products as $product) {
                $user->ordersInCart()->updateExistingPivot($product->id, ['status' => TRUE]);
                $product->save();
               
                
                $codes = Code::where('bought', FALSE)->get();
                $quantity = $product->pivot->quantity;
                foreach($codes as $code){
                    $codes_bought = $code->where(['product_id'=> $product->id,'bought' => FALSE])->take($quantity)->get();
                    break;
                }
                $id = $product->pivot->id;
                
                foreach($codes_bought as $code_bought){
                    $code_bought->bought = TRUE;
                    $code_bought->product_user_id = $id;
                    $code_bought->save();
                }
          
            }          
        } catch (Exception $ex) {
            echo $ex;
        }
    
        return $result;
    }
}
