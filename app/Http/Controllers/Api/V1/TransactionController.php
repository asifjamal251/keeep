<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserAddress;
use App\Model\UserWallet;
use App\Model\Transaction;
use App\Model\TransactionCardDetail;
use App\Http\Resources\Api\Transaction\TransactionResource;
use App\Http\Resources\Api\Transaction\TransactionSingle;
use Session;
use Stripe;

class TransactionController extends Controller{

	public function addAmountStrip(Request $request)
	{
		$this->validate($request, [
    		'amount'=>'required',
    		'stripsource'=>'required',
    	]);

    	$transaction = new Transaction;
        $transaction->user_id = $request->user()->id;
        $transaction->transaction_type_id = 2;
        $transaction->amount = $request->amount;
        $transaction->status = 2;
        $transaction->activity_by = 'Balance added to wallet';

        if($transaction->save()){

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripResponse = Stripe\Charge::create ([
                    "amount" => $request->amount * 100,
                    "currency" => "usd",
                    "source" => $request->stripsource,
                    "description" => "Balance added to wallet by " . $request->user()->name 
            ]);

            $transaction = Transaction::find($transaction->id);
            if ($stripResponse->status == 'succeeded') {

            	$wallet = UserWallet::firstOrNew(['user_id'=>$request->user()->id]);
            	$wallet->amount += $request->amount;
            	$wallet->save();

                $transaction->response_status = $stripResponse->status;
                $transaction->status = 1;
                $transaction->transaction_id = $stripResponse->id;
                $transaction->save();


                $card = new TransactionCardDetail;
                $card->user_id = $request->user()->id;
                $card->transaction_id = $transaction->id;
                $card->card_brand = $stripResponse->source->card->brand;
                $card->card_last4_digit = $stripResponse->source->card->last4;
                $card->name_on_card = $stripResponse->source->card->name;
                $card->country = $stripResponse->source->card->country;
                $card->save();
                $userWallet = [
                	'amount'=>$wallet->amount,
                ];
                return response()->json(['error'=>false, 'message'=>'Added to your wallet successfully', 'data'=>$userWallet]);
                
                
            }
            else{
            	$transaction->response_status = $stripResponse->status;
            	$transaction->status = 4;
            	$transaction->response_failure_message = $stripResponse->failure_message;
            	$transaction->save();
            	return response()->json(['error'=>true, 'message'=>'Failed', 'data'=>'']);

            }

            return response()->json(['error'=>true, 'message'=>'Oops! Something went wrong!']);
            
        }


		
	}

    public function list(Request $request){

        $data = Transaction::orderBy('created_at','desc')->select(['id','user_id','transaction_type_id','amount','status','created_at'])->with('user')->with('transactionType')->where('user_id',$request->user()->id)->paginate(10);
        if ($data->count()) {            
            $data = TransactionResource::collection($data);
            return response()->json(['error'=>false,'message'=>'Transaction list',
                'data'=>$data,
                'paginate'=>[
                    'total' => $data->total(),
                    'count' => $data->count(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'total_pages' => $data->lastPage()
                ]
            ]);
        }
        return response()->json(['error'=>true,'message'=>'Record Not Found','data'=>[]]);
    }


    public function detail(Request $request) {
        $this->validate($request,[
            'transaction_id' => 'required|exists:transactions,id',
        ]);
        $data = Transaction::with('orderItems')->with('order')->with('keep')->with('user')->with('strip')->with('transactionType')->where(['user_id'=>$request->user()->id,'id'=>$request->transaction_id])->first();

        if ($data) {

            $data = new TransactionSingle($data);
            return response()->json(['error'=>false,'message'=>'Transaction Detail','data'=>$data]);
        }

        return response()->json(['error'=>true,'message'=>'Transaction Not Found','data'=>[]]);
    }

}