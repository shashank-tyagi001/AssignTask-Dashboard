@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')

@if(session('success'))
    <p class="alert alert-success text-center alert-dismissible">{{ session('success') }}</p>
@endif

<div class="container">
    <div class="row header">
      <h1>Assign Task &nbsp;</h1>

    </div>
    <div class="row body">
      <form action={{route('assignTaskStore')}} method="POST" enctype="multipart/form-data">
        @csrf
        <ul>

        <li>
            <p class="left">
              <label for="project_id">Project name</label>
              <select name="project_id" id="project_id2">
                <option>Select a Project</option>
                  @foreach($project->unique('name') as $projects)
                  <option value={{$projects->id}}>{{$projects->name}}</option>
                  @endforeach
                </select>
            </p>
          </li>

          <li>
            <p class="left">
              <label for="user_id">Employee name</label>
              <select name="user_id" id="employee_id2">
                <option>Select a Employee</option>
                @foreach($employee->unique('emp_name') as $employees)
                <option value={{$employees->id}}>{{$employees->emp_name}}</option>
                @endforeach
                </select>
            </p>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="task">Task</label>
            <textarea cols="46" rows="3" name="task" required></textarea>
          </li>

          <li>
            <input class="btn btn-submit" type="submit" name="save" value="Submit" />
            <small>or press <strong>enter</strong></small>
          </li>

        </ul>
      </form>
    </div>
  </div>

@include('Dashboard.footer')
@endsection
