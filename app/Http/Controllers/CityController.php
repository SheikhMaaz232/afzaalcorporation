<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Services\CityService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCityRequest;

class CityController extends Controller
{
    protected $CityService;
    public function __construct(CityService $CityService)
    {
        $this->CityService = $CityService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $cities = $this->CityService->search($request);

        return view('cities.index', compact('cities','param'));
    }

    public function create()
    {
        return view('cities.create');
    }


    public function store(StoreCityRequest $request)
    {

        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->CityService->findUpdateOrCreate(City::class, ['id' => ''], $data);
        return redirect('city/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $city = City::find($id);
        if (empty($city)) {
            abort(404);
        }
        return view('cities.create', compact('city'));
    }

    public function update(StoreCityRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->CityService->findUpdateOrCreate(City::class, ['id' => request('id')], $request);
        return redirect('city/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        // return $this->CityService->deleteResource(City::class);
        $deleted = City::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('city/list')->with('message', config('constants.wrong'));
        }
    }
}
