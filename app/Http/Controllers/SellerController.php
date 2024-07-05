<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Services\SellerService;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    protected $sellerService;
    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $sellers = $this->sellerService->search($request);

        return view('sellers.index', compact('sellers','param'));
    }

    public function create()
    {
        $dropDownData = $this->sellerService->DropDownData();
        return view('sellers.create',compact('dropDownData'));
    }

    public function store(StoreSellerRequest $request)
    {
        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->sellerService->findUpdateOrCreate(Seller::class, ['id' => ''], $data);
        return redirect('seller/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->sellerService->DropDownData();
        $seller = Seller::find($id);
        if (empty($seller)) {
            abort(404);
        }
        return view('sellers.create', compact('seller','dropDownData'));
    }

    public function update(StoreSellerRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->sellerService->findUpdateOrCreate(Seller::class, ['id' => request('id')], $request);
        return redirect('seller/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        // return $this->sellerService->deleteResource(Seller::class);
        $deleted = Seller::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('seller/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('seller/list')->with('message', config('constants.wrong'));
        }
    }
}
