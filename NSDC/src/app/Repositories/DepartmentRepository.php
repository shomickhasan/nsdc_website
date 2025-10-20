<?php
namespace App\Repositories;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DepartmentRepository extends Repository
{
    public function model()
    {
        return Department::class;
    }

    public function storeDepartment(DepartmentRequest $request)
    {
       
            $department = Department::create([
                'd_name' => $request->d_name,
                'department_level_id' => $request->department_level_id,
                'department_parent_id' => $request->department_parent_id,
            ]);
            return $department;
    }
    public function updateDepartment(Department $department, DepartmentRequest $request)
    {

        $department = $this->update($department,[
            'd_name' => $request->d_name,
            'department_level_id' => $request->department_level_id,
            'department_parent_id' => $request->department_parent_id,
        ]);
        return $department;
    }
}