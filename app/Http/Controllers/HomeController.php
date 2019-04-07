<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use App\Department;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function add(Request $request)  {
        
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required'

        ]);

        employee::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            
            


        ]);
        return back()->withStatus(' Successfully added Employee');
        

        
    }



    public function employee_list(){
        $data = employee::all();
        $department=department::all();
        return $data;
        return $department;



    }
    public function employee_edit($id){

        $data=employee::find($id);

        
        return view('/edit',compact('data'));
    }

    public function update(Request $request , $id){

        employee::find($id)->update($request->all());

        return back();


      
    }

    public function delete( $id){
        
        employee::find($id)->delete();

        return back();

    }public function d_index(){

        return view('/department/view');
        
       

    }
   public function department_add(Request $request)  {
        
        //$this->validate($request,[
        //    'name'=>'required'

       // ]);

        Department::create([
            'name' => $request->name,
          
           

        ]);
        return back()->withStatus(' Successfully added Department');
        

        
    }

    public function department_show(){
        $data = department::all();
        return $data;



    }




}
