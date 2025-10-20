<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Loan;
use App\Models\Traning;
use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index(Request $request)
    {
   
        $filters = $request->only(['name']);
        $sortOrder = $request->ordering ?? 'desc';
        $loans = Loan::filter($filters,'id', $sortOrder)
                ->paginate(self::WEB_PAGINATOR_NUMBER)->withQueryString();
        return $request->ajax()
                ? view('backend.pages.loan.filter', compact('loans'))
                : view('backend.pages.loan.index', compact('loans'));

    }

    public function create()
    {
        return view('backend.pages.loan.create');
    }

    public function store(LoanRequest $request)
    {
        try{
            DB::beginTransaction();
           $training =  Loan::create([
                'created_by' => Auth::id(),
                'loan_name' => $request->loan_name,
                'description' => $request->description,
                'basic_amount' => $request->basic_amount,
            ]);
            DB::commit();
            return redirect()->route('loan.index')->with('message','Loan Create SuccessFully');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('loan.index')->with('error',self::DEFAULT_ERROR_MESSAGE); 
        }
    }

    public function edit(Loan $loan)
    {

        return view('backend.pages.loan.edit',compact('loan'));
    }


    public function update(LoanRequest $request,Loan $loan)
    {

        try{
            DB::beginTransaction();
            $loan->update([
                'loan_name' => $request->loan_name,
                'description' => $request->description,
                'basic_amount' => $request->basic_amount,
                'updated_by' => Auth::id()

            ]);

            DB::commit();
            return redirect()->route('loan.index')->with('message','Loan Updated SuccessFully');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->route('loan.index')->with('error',self::DEFAULT_ERROR_MESSAGE); 
        }
    }


    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $data = $loan->delete();
        return response()->json([
            'data'=>$data,
            'success' => 'Loan deleted successfully!'
        ]);

    }
}
