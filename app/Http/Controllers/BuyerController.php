<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBuyerRequest;
use App\Models\Buyer;
use App\Services\BuyerService;

class BuyerController extends Controller
{
    protected $buyerService;
    public function __construct(BuyerService $buyerService)
    {
        $this->buyerService = $buyerService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $buyers = $this->buyerService->search($request);

        return view('buyers.index', compact('buyers','param'));
    }

    public function create()
    {
        $dropDownData = $this->buyerService->DropDownData();
        return view('buyers.create',compact('dropDownData'));
    }

    public function store(StoreBuyerRequest $request)
    {
        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->buyerService->findUpdateOrCreate(Buyer::class, ['id' => ''], $data);
        return redirect('buyer/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->buyerService->DropDownData();
        $buyer = Buyer::find($id);
        if (empty($buyer)) {
            abort(404);
        }
        return view('buyers.create', compact('buyer','dropDownData'));
    }

    public function update(StoreBuyerRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->buyerService->findUpdateOrCreate(Buyer::class, ['id' => request('id')], $request);
        return redirect('buyer/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        // return $this->buyerService->deleteResource(Buyer::class);
        $deleted = Buyer::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('buyer/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            // return response()->json(['status' => 'error', 'message' => $message]);
            session()->flash('message', $message);
            return redirect('buyer/list')->with('message', config('constants.wrong'));
        }
    }
}
