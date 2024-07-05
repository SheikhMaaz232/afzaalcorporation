<?php

namespace App\Services;

    /*
     * Class tblbanksService
     * @package App\Services
     * */
use App\Models\City;
use App\Services\CommonService;

    class CityService
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
        $q = City::query();
        if (!empty($request['param']))
        {
            $q->where('name', 'LIKE', '%'. $request['param'] . '%');
        }

        $cities = $q->orderBy('id', 'ASC')->paginate(config('constants.PER_PAGE'));
        return $cities;
    }

    public function deleteResource($modelClass)
    {
        $deleted = $modelClass::destroy(request()->id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.delete'));
            // return response()->json(['status' => 'success', 'message' => $message]);
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.wrong'));
        }
    }

}
