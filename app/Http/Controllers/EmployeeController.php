<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    protected $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $param = request()->param;
        $employees = $this->employeeService->search($request);

        return view('employees.index', compact('employees','param'));
    }

    public function create()
    {
        $dropDownData = $this->employeeService->DropDownData();
        return view('employees.create',compact('dropDownData'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $data = $data = $request->except('_token', 'id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $this->employeeService->findUpdateOrCreate(Employee::class, ['id' => ''], $data);
        return redirect('employee/list')->with('message', config('constants.add'));
    }

    public function edit($id)
    {
        $dropDownData = $this->employeeService->DropDownData();
        $employee = Employee::find($id);
        if (empty($employee)) {
            abort(404);
        }
        return view('employees.create', compact('employee','dropDownData'));
    }

    public function update(StoreEmployeeRequest $request)
    {
        $request = $request->except('_token', 'id');
        $this->employeeService->findUpdateOrCreate(Employee::class, ['id' => request('id')], $request);
        return redirect('employee/list')->with('message', config('constants.update'));
    }

    public function destroy($id)
    {
        // return $this->employeeService->deleteResource(Employee::class);
        $deleted = Employee::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('employee/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            // return response()->json(['status' => 'error', 'message' => $message]);
            session()->flash('message', $message);
            return redirect('employee/list')->with('message', config('constants.wrong'));
        }
    }
}
