<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Slider\SliderCollection;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $datas = Slider::orderBy('created_at','desc')->select(['id','title','sub_title','button_text','button_link','status','image','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('job_no', 'like', '%'.$search.'%');
                $datas->orWhere('po_date', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new SliderCollection($datas));
           
        }

        return view('admin.slider.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.slider.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Employee $employee )
    {   
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {

            $this->validate($request,[
                'title'=>'required',
                'sub_title'=>'required',
                'button_text'=>'required',
                'button_link'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',    
            ]);

            $slider = new Slider;
          
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status?1:0;

            if($request->hasFile('image')){
                $image = $request->file('image')->store('slider/');
                $slider->image =bucketUrl($image);
            }   

            if($slider->save()){ 
                return redirect()->route('admin.slider.index')->with(['class'=>'success','message'=>'Slider Created successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Employee $employee)
    {
        $roles = Role::select('id','name')->get()->pluck('name','id')->toArray();

        $kycPan = KycPan::firstOrNew(['employee_id'=>$employee->id]);
        $kycAadhar = KycAadhar::firstOrNew(['employee_id'=>$employee->id]);
        $bank = EmployeeBankDetail::firstOrNew(['employee_id'=>$employee->id]);
        $details = EmployeeDetail::firstOrNew(['employee_id'=>$employee->id]);
        return view('employee.employee.edit', compact('employee','roles','kycPan','kycAadhar','details','bank')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
                'name'=>'required',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                'role'=>'required',
                'email'=>'required|email' ,
                'mobile'=>'required' ,
                'password'=>'required|min:6',
                'aadhar_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                'aadhar' => 'required|min:12|numeric',
                'pan_image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                'pan' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',  
                'bank_name' => 'nullable|regex:/^[a-zA-Z ]+$/u',
                'account_holder_name' => 'nullable|regex:/^[a-zA-Z ]+$/u',
                'account_number' => 'nullable',
                'ifsc_code' => 'nullable|regex:/^[A-Za-z]{4}0[a-zA-Z0-9]{6}+$/u',
                'branch_name' => 'nullable',       
            ]);

            $employeeOld = implode(',', $employee->only('id','name','role_id','email'));
                if($request->password){
                $employee->password = bcrypt($request->password);
            }


            $employee->role_id = $request->role;
            $employee->name = $request->name;
            $employee->mobile = $request->mobile;
            $employee->email = $request->email;
            if($request->hasFile('avatar')) {
                $employee->avatar = $request->file('avatar')->store('employee/profile'); 
            }
            if($employee->save()){ 

                $details = EmployeeDetail::firstOrNew(['employee_id'=>$employee->id]);
                $details->address = $request->address;
                $details->gender = $request->gender;
                $details->dob = $request->dob;
                $details->save();

                $aadhar = KycAadhar::firstOrNew(['employee_id'=>$employee->id]);
                if($request->hasFile('aadhar_image')) {
                    $image = $request->file('aadhar_image')->store('employee/kyc');
                    $aadhar->image =$image;

                }
                $aadhar->number =$request->aadhar;
                $aadhar->save();

                $pan = KycPan::firstOrNew(['employee_id'=>$employee->id]);
                if($request->hasFile('pan_image')) {
                    $image = $request->file('pan_image')->store('employee/kyc');
                    $pan->image =$image;

                }
                $pan->number =$request->pan;
                $pan->save();

                $bank = EmployeeBankDetail::firstOrNew(['employee_id'=>$employee->id]);
                $bank->bank_name = $request->bank_name;
                $bank->ifsc_code = $request->ifsc_code;
                $bank->account_number = $request->account_number;
                $bank->account_holder_name = $request->account_holder_name;
                $bank->branch_name = $request->branch_name;
                $bank->save();


                return redirect()->route('employee.employee.index')->with(['class'=>'success','message'=>'Admin Created successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Employee $employee)
    {
        $employeeOld = implode(',', $employee->only('id','name','role_id','email'));
        if($employee->delete()){
            
            return response()->json(['message'=>'Admin deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
