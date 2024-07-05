<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Contract;
use App\Models\MillWeight;
use Illuminate\Http\Request;
use App\Models\DispatchEntry;
use App\Services\MillWeightService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDispatchRequest;

class MillWeightController extends Controller
{
    protected $millWeightService;

    public function __construct(MillWeightService $millWeightService)
    {
        $this->millWeightService = $millWeightService;
    }

    public function index(Request $request)
    {
        $weights = $this->millWeightService->search($request);
        $dropDownData = $this->millWeightService->DropDownData();
        $param = request()->param;

        return view('mill-weight.index', compact('weights', 'dropDownData', 'param'));
    }

    public function store(StoreDispatchRequest $request)
    {
        $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['date'] = Carbon::parse($request['contract_date'])->format('Y-m-d');
        $this->millWeightService->findUpdateOrCreate(DispatchEntry::class, ['id' => ''], $data);

        return redirect('dispatch/list')->with('message', config('constants.successfully_dispatched'));
    }

    public function addMillWeight($id)
    {
        $contract = DispatchEntry::where('id', $id)->first();
        $millWeights = MillWeight::where('contract_id', $contract->contract_id)->first();

        return view('mill-weight.create', compact('contract','millWeights'));
    }

    public function update()
    {

    }

    public function dispatch(int $id)
    {
        $dropDownData = $this->millWeightService->DropDownData();
        $contractNo = Contract::max('id') + 1;
        $contract = Contract::find($id);
        $dispatches = DispatchEntry::where('contract_id', $id)->get();
        if (empty($contract)) {
            abort(404);
        }

        return view('mill-weight.create', compact('contract', 'dispatches', 'dropDownData', 'contractNo'));
    }

    public function destroy()
    {

    }

    public function dispatches()
    {
//        DispatchEntry::
    }
}
