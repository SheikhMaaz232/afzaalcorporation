<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDispatchRequest;
use App\Models\Contract;
use App\Models\DispatchEntry;
use App\Services\DispatchService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispatchController extends Controller
{
    protected $dispatchService;

    public function __construct(DispatchService $dispatchService)
    {
        $this->dispatchService = $dispatchService;
    }

    public function index(Request $request)
    {
        $contracts = $this->dispatchService->search($request);
        $dropDownData = $this->dispatchService->DropDownData();
        $param = request()->param;

        return view('dispatch.index', compact('contracts', 'dropDownData', 'param'));
    }

    public function store(StoreDispatchRequest $request)
    {
        // dd($request);
        $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['date'] = Carbon::parse($request['contract_date'])->format('Y-m-d');
        $dispatches = DispatchEntry::where('contract_id', $request['contract_id'])->get();
        $totalQuantity = Contract::where('id', $request['contract_id'])->first();
        $dispatchedQty = $dispatches->sum('dispatch_quantity');

        // dd($totalQuantity->quantity, $dispatchedQty);
        $balanceQty = $totalQuantity->quantity - $dispatchedQty;

        if($balanceQty == 0 || $balanceQty < 0) {
            return redirect('dispatch/dispatch-entry'.'/'.$request['contract_id'])->with('message', config('constants.no_balance_qty'));
        }

        $this->dispatchService->findUpdateOrCreate(DispatchEntry::class, ['id' => ''], $data);

        return redirect('dispatch/dispatch-entry'.'/'.$request['contract_id'])->with('message', config('constants.successfully_dispatched'));
    }

    public function update()
    {

    }

    public function dispatch(int $id)
    {
        $dropDownData = $this->dispatchService->DropDownData();
        $contractNo = Contract::max('id') + 1;
        $contract = Contract::find($id);
        $dispatches = DispatchEntry::where('contract_id', $id)->get();
        $totalQuantity = $contract->quantity ?? 0;
        $dispatchedQty = $dispatches->sum('dispatch_quantity') ?? 0;
        $balanceQty = $totalQuantity - $dispatchedQty;

        if (empty($contract)) {
            abort(404);
        }

        return view('dispatch.create', compact('contract', 'dispatches', 'dropDownData', 'contractNo', 'totalQuantity', 'dispatchedQty', 'balanceQty'));
    }

    public function destroy()
    {

    }

    public function dispatches()
    {
//        DispatchEntry::
    }
}
