@extends('Dashboard.header')


@section('content')
@extends('Dashboard.sidebar')
<div class="container">
    <div class="row header">
      <h1>Assign Emp &nbsp;</h1>

    </div>
    <div class="row body">
      <form action={{route('assignEdit',$assignEmp->id)}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>

        <li>
            <p class="left">
              <label for="project_id">Project name</label>
              <select name="project_id" id="project_id">
                  @foreach($project->unique('name') as $projects)
                  <option value={{$projects->id}}>{{$projects->name}}</option>
                  @endforeach
                </select>
            </p>
          </li>

            <li>
              <p class="left">
                <label for="employee_id">Employee name</label>
                <select name="employee_id[]" id="employee_name" multiple="multiple">
                    @foreach($employee->unique('emp_name') as $employees)
                    <option value={{$employees->id}}>{{$employees->emp_name}}</option>
                    @endforeach
                  </select>
              </p>
            </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="task">Comments*</label>
            <textarea cols="46" rows="3" name="task" value="">{{$assignEmp->task}}</textarea>
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
