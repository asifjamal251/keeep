<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\Transaction\TransactionCollection;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->expectsJson()) {

            $datas = Transaction::orderBy('created_at','desc')->select(['id','user_id','transaction_type_id','amount','status','created_at'])->with('user')->with('transactionType');
            
            $search = $request->search['value'];

            if ($search) {
                $datas->where('id', 'like', '%'.$search.'%');
                $datas->orWhere('amount', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new TransactionCollection($datas));
        }
        return view('admin.transaction.list');
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id){
        $transaction = Transaction::with('orderItems')->with('order')->with('keep')->with('user')->with('transactionType')->where('id',$id)->first();  
        return view('admin.transaction.view',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {

      
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,User $user)
    {
        $id = $user->id;
        if($user->delete()){

              $logMessage= array(
                'user_id'=>auth('admin')->user()->id,
                'table'=>'User',
                'table_id'=>$id
            );

            AdminLog::write('delete','User',$logMessage);
            return response()->json(['message'=>'User deleted successfully ...', 'class'=>'success']);

        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
