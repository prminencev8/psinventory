<?php

namespace app\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants=Merchant::orderBy('id','DESC')->get();
        return view('backend.merchant.index',compact('merchants'));
    }

    public function merchantStatus(Request $request){
        if($request->mode=='true'){
            DB::table('merchants')->where('id',$request->id)->update(['status'=>'active']);
        }
        else{
            DB::table('merchants')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    public function merchantVerified(Request $request){
        if($request->mode=='true'){
            DB::table('merchants')->where('id',$request->id)->update(['is_verified'=>1]);
        }
        else{
            DB::table('merchants')->where('id',$request->id)->update(['is_verified'=>0]);
        }
        return response()->json(['msg'=>'Successfully updated','status'=>true]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'email|required|unique:merchants,email',
            'password'=>'min:4|required',
            'phone'=>'string|nullable',
            'photo'=>'required',
            'address'=>'string|nullable',            
            'status'=>'required|in:active,inactive',
            
        ]);
        $data= $request->all();

        $data['password']=Hash::make($request->password);

//        return $data;
        $status=Merchant::create($data);
        if($status){
            return redirect()->route('merchant.index')->with('success','Merchant successfully created');
        }
        else{
            return back()->with('error','Something went wrong!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchants=Merchant::find($id);
        if($merchants){
            return view('backend.merchant.edit',compact(['merchants']));
        }
        else{
            return back()->with('error','Merchant not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $merchants=Merchant::find($id);
        if($merchants){
            $this->validate($request,[
                'full_name'=>'string|required',
                'username'=>'string|nullable',
                'email'=>'email|nullable',              
                'phone'=>'string|nullable',
                'photo'=>'required',
                'address'=>'string|nullable',               
                'status'=>'required|in:active,inactive',
            ]);

            $data=$request->all();

            $status=$merchants->fill($data)->save();
            if($status){
                return redirect()->route('merchant.index')->with('success','Merchant successfully updated');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Merchant not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchants=Merchant::find($id);
        if($merchants){
            $status=$merchants->delete();
            if($status){
                return redirect()->route('merchant.index')->with('success','Merchant successfully deleted');
            }
            else{
                return back()->with('error','Something went wrong!');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }
}
