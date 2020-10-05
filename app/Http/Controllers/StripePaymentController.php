<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Model\Transaction;
use App\Model\TransactionCardDetail;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      // $charge = \Stripe\Charge::create([
      //     'amount' => 2500, // $15.00 this time
      //     'currency' => 'usd',
      //     'customer' => 'cus_GolLCPOUYlbqgH', // Previously stored, then retrieved
      // ]);
      // dd($charge);
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

      // $charge = \Stripe\Charge::create([
      //     'amount' => 1500, // $15.00 this time
      //     'currency' => 'usd',
      //     'customer' => 'cus_GolLCPOUYlbqgH', // Previously stored, then retrieved
      // ]);

      // dd($charge);

        $transaction = new Transaction;
        $transaction->user_id = 1;
        $transaction->transaction_type_id = 2;
        $transaction->status = 2;
        $transaction->activity_by = 'Balance added to wallet';

        if($transaction->save()){

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            

            // $charge = \Stripe\Charge::create([
            //     'amount' => 1000,
            //     'currency' => 'usd',
            //     'customer' => $customer->id,
            // ]);

            $customer = \Stripe\Customer::create([
              'email' => 'sandeep.sanix11@gmail.com',
              'source' => $request->stripeToken,
            ]);

            $charge = \Stripe\Charge::create([
                'amount' => 1000,
                'currency' => 'usd',
                'customer' => $customer->id,
            ]);

            //dd($charge);

            return $charge->status;


            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripResponse = Stripe\Charge::create ([
                    "amount" => 1000 * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    //'customer' => 'cus_GolHeGVVzOWXd8',
                    "description" => "Balance added to wallet by Sanix Technologies" 
            ]);

            dd($stripResponse);

            if ($stripResponse->status == 'succeeded') {
                $transaction = Transaction::find($transaction->id);
                $transaction->response_status = $stripResponse->status;
                $transaction->status = 1;
                $transaction->transaction_id = $stripResponse->id;
                $transaction->amount = 100;
                $transaction->save();


                $card = new TransactionCardDetail;
                $card->user_id = 1;
                $card->transaction_id = $transaction->id;
                $card->card_brand = $stripResponse->source->brand;
                $card->card_last4_digit = $stripResponse->source->last4;
                $card->name_on_card = $stripResponse->source->name;
                $card->country = $stripResponse->source->country;
                $card->save();
                
            }
            
        }
    }
}