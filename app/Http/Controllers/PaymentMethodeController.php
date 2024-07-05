<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use App\Services\PaymentMethodeService;
use App\Http\Requests\StorePaymentMethodeRequest;

class PaymentMethodeController extends Controller
{
    protected $PaymentMethodeService;
    public function __construct(PaymentMethodeService $PaymentMethodeService)
    {
        $this->PaymentMethodeService = $PaymentMethodeService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $paymentMethodes = $this->PaymentMethodeService->search($request);

        return view('paymentMethode.index', compact('paymentMethodes','param'));
    }

    public function create()
    {
        return view('paymentMethode.create');
    }


    public function store(StorePaymentMethodeRequest $request)
    {

        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->PaymentMethodeService->findUpdateOrCreate(PaymentMethod::class, ['id' => ''], $data);
        return redirect('paymentMethode/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $paymentMethode = PaymentMethod::find($id);
        if (empty($paymentMethode)) {
            abort(404);
        }
        return view('paymentMethode.create', compact('paymentMethode'));
    }

    public function update(StorePaymentMethodeRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->PaymentMethodeService->findUpdateOrCreate(PaymentMethod::class, ['id' => request('id')], $request);
        return redirect('paymentMethode/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        $deleted = PaymentMethod::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('paymentMethode/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('paymentMethode/list')->with('message', config('constants.wrong'));
        }
    }
}
