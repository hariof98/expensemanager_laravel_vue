<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    public function expense(Request $request)
    {
        $request->validate([
            'main_category' => ['required'],
            'sub_category' => ['required'],
            'expense_amount' => ['required'],
            'description' => ['required'],
            'mode_of_payment' => ['required'], 
            'status' => ['required'], 
            'date' => ['required'], 
            'time' => ['required'], 
        ]);

        $expense = new Expense;
        $expense->user_id = $request->user()->id;
        $expense->main_category = $request->main_category;
        $expense->sub_category = $request->sub_category;
        $expense->expense_amount = $request->expense_amount;
        $expense->description = $request->description;
        $expense->mode_of_payment = $request->mode_of_payment;
        $expense->status = $request->status;
        $expense->date= $request->date;
        $expense->time= $request->time;

         $expense->save();
    }

    public function daybook(Request $request)
    {
     //return $request->user()->tokens()->get();
       // $expenses = Expense::where('user_id', '=', $request->user())->get()->toArray();
      // $expenses = Expense::all()->toArray();
    //return view('expenses'=>$expenses);
        //return $expenses;
        //$user= $request->user();
       // return Expense::where($request-> $user->id)->get();
      // $expenses = Expense::where('id','user')->get();
       //return $expenses;
        //return $request->user();
         // 'current_user'=>$request->session()->get('current_user'),'expenses'=>$expenses
        $expenses = Expense::where('user_id', '=', $request->user()->id)->get()->toArray();
       return $expenses;
      
    }

    public function dashboard(Request $request)
    { 
        $expenses = Expense::where('user_id', '=', $request->user()->id)->get()->toArray();
        return $expenses;

    }
    public function delete(Request $request,$id)
    {
         $expenses= Expense::where('user_id', '=', $request->user()->id)->delete();
         return $expenses;
        
         //echo "Data deleted";
        // return redirect('/expense/daybook');
        return response()->json(['message'=>"Deleted Successfully"], 200);
 
    }

   public function addexpense(Request $request)
   {
       return Expense::where('user_id', '=', $request->user()->id)->sum('expense_amount');
   }

}
