<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Models\Contract;
use App\Models\Seller;
use App\Services\ContractService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContractController extends Controller
{
    protected $contractService;

    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $dropDownData = $this->contractService->DropDownData();
        $contracts = $this->contractService->search($request);

        return view('contracts.index', compact('contracts', 'param', 'dropDownData'));
    }

    public function create()
    {
        $dropDownData = $this->contractService->DropDownData();
        $contractNo = Contract::max('id') + 1;

        return view('contracts.create', compact('dropDownData', 'contractNo'));
    }

    public function store(StoreContractRequest $request)
    {
        $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['contract_date'] = Carbon::parse($request['contract_date'])->format('Y-m-d');
        $this->contractService->findUpdateOrCreate(Contract::class, ['id' => ''], $data);

        return redirect('contracts/list')->with('message', config('constants.add'));
    }

    public function edit(int $id)
    {
        $dropDownData = $this->contractService->DropDownData();
        $contractNo = Contract::max('id') + 1;
        $contract = Contract::find($id);
        if (empty($contract)) {
            abort(404);
        }
        return view('contracts.create', compact('contract', 'dropDownData', 'contractNo'));
    }

    public function update(StoreContractRequest $request)
    {
        $request = $request->except('_token', 'id');
        $request['contract_date'] = Carbon::parse($request['contract_date'])->format('Y-m-d');
        $this->contractService->findUpdateOrCreate(Contract::class, ['id' => request('id')], $request);
        return redirect('contracts/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        // return $this->buyerService->deleteResource(Buyer::class);
        $deleted = Contract::destroy($id);
        if ($deleted) {
            $message = config('constants.delete');
            session()->flash('message', $message);
            return redirect('contrcts/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong');
            // return response()->json(['status' => 'error', 'message' => $message]);
            session()->flash('message', $message);
            return redirect('contrcts/list')->with('message', config('constants.wrong'));
        }
    }

    public function print($id)
    {
        $contracts = Contract::where('id', $id)->get();
        // dd($contracts);

        return view('contracts.print', compact('contracts'));
    }

    public function sendEmail(Request $request)
    {
        Mail::send($request['to'], $request['description']);
    }

    public function getSellerDetail($name)
    {
        $detailAccount = Seller::where('name', trim($name))->first('bank_detail');

        if ($detailAccount) {
            return response()->json(['status' => 'success', 'bank_detail' => $detailAccount->bank_detail]);
        }
        return response()->json(['status' => 'fail', 'data' => []]);
    }

}
