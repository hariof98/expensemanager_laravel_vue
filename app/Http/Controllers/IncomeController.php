<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;

class IncomeController extends Controller
{
    public function income(Request $request)
    {
        $request->validate([
            'income' => ['required'],
            'source_of_income' => ['required'],
            'name_of_the_bank' => ['required'],
            'monthly_budget_allocation' => ['required'],
            'savings_amount' => ['required'],
          
        ]);

        $income = new Income;
        $income->user_id= $request->user()->id;
        $income->income = $request->income;
        $income->source_of_income = $request->source_of_income;
        $income->name_of_the_bank = $request->name_of_the_bank;
        $income->monthly_budget_allocation = $request->monthly_budget_allocation;
        $income->savings_amount = $request->savings_amount;
        
        $income->save();
      
    }

    public function incomerecord(Request $request)
    {
       $incomes = Income::where('user_id','=',$request->user()->id)->get()->toarray();
       return $incomes;
    }

    public function addincome(Request $request)
    {
        return Income::where('user_id','=',$request->user()->id)->sum('monthly_budget_allocation');
    }

    public function sumsavings(Request $request)
    {
        return Income::where('user_id', '=', $request->user()->id)->sum('savings_amount');
    }
}
