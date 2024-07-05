<?php

namespace App\Services;

    /*
     * Class tblbanksService
     * @package App\Services
     * */

use App\Models\PaymentMethod;
use App\Services\CommonService;

    class PaymentMethodeService
{
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        $this->commonService = $commonService;
    }

    public function findUpdateOrCreate($model, array $where, array $data)
    {
       $object = $model::firstOrNew($where);
        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();
        return $object;
    }


    public function search($request)
    {
        $q = PaymentMethod::query();
        if (!empty($request['param']))
        {
            $q->where('name', 'LIKE', '%'. $request['param'] . '%');
        }

        $paymentMethods = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $paymentMethods;
    }

    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('paymentMethode/list')->with('message', config('constants.delete'));
            // return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('paymentMethode/list')->with('message', config('constants.wrong'));
        }
    }

}
