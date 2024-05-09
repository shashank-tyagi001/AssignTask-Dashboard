<?php

namespace App\Http\Controllers;

use App\Models\AssignEmp;
use App\Models\Assignment;
use App\Models\assignTask;
use App\Models\DailyReport;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\ProjectName;
use App\Models\User;

class ListApi extends Controller
{
    public function projectList()
    {
        $project = ProjectName::all();
        return response()->json($project);
    }

    public function employeeList()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    public function empList()
    {
        $assignEmp = AssignEmp::all();
        return response()->json($assignEmp);
    }

    public function project($id)
    {
        $projecdId = ProjectName::find($id);
        return response()->json($projecdId);
    }

    public function employee($id)
    {
        $employeeId = Employee::find($id);
        return response()->json($employeeId);
    }

    public function assignTask()
    {
        $assignTask = assignTask::all();
        return response()->json($assignTask);
    }

    public function userUse($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }


    //Project Delete Button
    public function prolistDel($id)
  {
    $projectDel = ProjectName::find($id);
    if (!$projectDel) {
        return response()->json(['error' => 'Project not found'], 404);
    }
    try {
        $projectDel->delete();
        return response()->json(['message' => 'Project deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete project'], 500);
    }
  }

  //Project edit and update
  public function prolistUpd($id)
  {
    $prolistUpd = ProjectName::find($id);
    return response()->json($prolistUpd,200);
  }

  public function proEdit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'comments' => 'nullable|string',
        ]);
        ProjectName::where('id',$id)->update(['name' => $validatedData['project_name'],
        'startDate' => $validatedData['start_date'],
        'endDate' => $validatedData['end_date'],
        'comments' => $validatedData['comments'],
    ]);
        return redirect()->route('projectList');
    }


    //Employee Delete Button
    public function emplistDel($id)
    {
        $emplist = Employee::find($id);
        if(!$emplist)
        {
            return response()->json(['error' => 'Employee not found'],404);
        }
        try{
            $emplist->delete();
            return response()->json(['message' => 'Project deleted successfully'], 200);
        } catch(\Exception $e){
            return response()->json(['error' => 'Failed to delete project'], 500);
        }
    }

    //Employee edit and update button
        public function emplistUpd($id)
    {
        $emplistUpd = Employee::find($id);
        return response()->json($emplistUpd,200);
    }

    public function empEdit(Request $request,$id)
    {
            $validateData = $request->validate([
                'employee_name' => 'required|string|max:255',
                'email' =>'required|email',
                'comments' => 'string'
            ]);
            Employee::where('id',$id)->update([
                'emp_name' => $validateData['employee_name'],
                'email' => $validateData['email'],
                'comments' => $validateData['comments']
            ]);
            return redirect()->route('employeeList');
        }


        //AssignEmp delete button
        public function assignEmp($id)
        {
            $assignEmp = AssignEmp::find($id);
            if(!$assignEmp)
            {
                return response()->json(['error' => 'Employee not found'],404);
            }
            try{
                $assignEmp->delete();
            } catch(\Exception $e){
                return response()->json(['error' => 'Failed to delete project'], 500);
            }
        }

        //AssingnEmp edit and update button
        public function assignUpd($id){
            $assignEmp = AssignEmp::find($id);
            return response()->json($assignEmp,200);
        }

        public function assignEdit(Request $request,$id)
        {
                $validateData = $request->validate([
                      'project_id' => 'required',
                      'employee_id' => 'required',
                      'task' => 'required'
                ]);
                AssignEmp::where('id',$id)->update([
                   'project_id' => $validateData['project_id'],
                   'employee_id' => $validateData['employee_id'],
                   'task' => $validateData['task']
                ]);
                return redirect()->route('empList');
        }

        //Show Daily Reports
        public function dailyreport()
        {
            $showResult = DailyReport::all();
            return response()->json($showResult,200);
        }

        ///USer Api
        public function user($id)
        {
            $user = User::find($id);
            return response()->json($user,200);
        }


}
