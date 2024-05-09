<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectName;
use App\Models\Employee;
use App\Models\AssignEmp;
use App\Models\assignTask;
use App\Models\DailyReport;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class DashboardController extends Controller
{
    //Registration
    public function register()
    {
        return view('register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'register_name' => 'required|min:4',
            'register_email' => 'required|unique:registrations,email|email',
            'role' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('index');
        }
        return redirect('register')->with('Registration is completed');
    }


    //Login
    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect('MainPage');
            } elseif ($user->role == 0) {
                return redirect('userUse');
            }
        } else {
            return redirect('/')->with('error', 'Invalid Credentials');
        }
    }


    //Dashboard
    public function index()
    {
        return view('index');
    }


    public function mainPage()
    {
        return view('Dashboard.MainPage');
    }


    public function projectAdd()
    {
        return view('project');
    }

    public function projectStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|min:2',
            'start_date' => 'required',
            'end_date' => 'required',
            'comments' => 'required',
        ]);
        if ($validator->passes()) {
            $project = new ProjectName;
            $project->name = $request->project_name;
            $project->startDate = $request->start_date;
            $project->enddate = $request->end_date;
            $project->comments = $request->comments;
            $project->save();
            return redirect('project')->with('success', 'Project will be added');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function employeeAdd()
    {
        return view('employee');
    }

    public function employeeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_name' => 'required|min:2',
            'email' => 'required|email',
            'comments' => 'required',
        ]);
        if ($validator->passes()) {
            $employee = new Employee;
            $employee->emp_name = $request->employee_name;
            $employee->email = $request->email;
            $employee->comments = $request->comments;
            $employee->save();
            return redirect('employee')->with('success', 'EMPLOYEE will be added');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    //Assign Emp
    public function assignEmp()
    {
        return view('assignEmp');
    }

    public function assignEmpStore(Request $request)
    {
        $employee_ids = $request->input('employee_id');

        foreach ($employee_ids as $employee_id) {
            AssignEmp::create([
                'project_id' => $request->project_id,
                'employee_id' => $employee_id,
                'task' => $request->task
            ]);
        }

        return redirect('assignEmp')->with('success', 'Employees will be assign on project');
    }

    //Assign Task
    public function assignTask()
    {
        return view('assignTask');
    }

    public function assignTaskStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->passes()) {
            $task = new assignTask();
            $task->project_id = $request->project_id;
            $task->user_id = $request->user_id;
            $task->task = $request->task;
            $task->save();
            return redirect('assignTask')->with('success', 'TASK will be assigned');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    //ProjectList
    public function projectList()
    {
        return view('ListApi.projectList');
    }

    //EmployeeList
    public function employeeList()
    {
        return view('ListApi.employeeList');
    }

    //AssignEmp List
    public function empList()
    {
        return view('ListApi.empList');
    }

    //Assign Task
    public function taskList()
    {
        return view('ListApi.taskList');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    //User Interface
    public function userUse()
    {
        $userId = Auth::id();
        $tasks = assignTask::where('user_id', $userId)->with('user')->get();
        return view('userUse', ['tasks' => $tasks]);
    }


    public function projectUpd(Request $request, $id)
    {
        $project = ProjectName::findOrFail($id);
        return view('projectUpd',compact('project'));
    }

    public function employeeUpd(Request $request, $id)
    {
        $emp = Employee::findOrFail($id);
        return view('employeeUpd',compact('emp'));
    }

    public function assignUpd(Request $request,$id)
    {
        $assignEmp = AssignEmp::findOrFail($id);
        return view('assignUpd',compact('assignEmp'));
    }

    //Daily Report
    public function dailyReport()
    {
        return view('dailyReport');
    }

    public function dailyReports(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'project_name' => 'required',
            'today_date' => 'required',
            'firstPhase' => 'required',
            'secondPhase' => 'required',
            'thirdPhase' => 'required',
            'fourthPhase' => 'required',
        ]);
        if ($validator->passes()) {
            $reports = new dailyReport();
            $reports->user_id= $request->user_id;
            $reports->project_name= $request->project_name;
            $reports->today_date = $request->today_date;
            $reports->firstPhase = $request->firstPhase;
            $reports->secondPhase = $request->secondPhase;
            $reports->thirdPhase = $request->thirdPhase;
            $reports->fourthPhase = $request->fourthPhase;
            $reports->save();
            return redirect('dailyReport')->with('success', 'Record will be added');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    //Show DailyReports
    public function showReports()
    {
        return view('ListApi.showReports');
    }

}
