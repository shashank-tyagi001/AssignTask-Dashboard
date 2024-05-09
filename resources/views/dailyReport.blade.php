@extends('Dashboard.header')
@section('content')
@include('Dashboard.sidebarUser')

<div class="container">
    <div class="row header">
      <h1>Daily Reports&nbsp;</h1>
      <h3> Milestones that have been achieved </h3>
    </div>
    <div class="row body">
      <form action={{route('dailyReports')}} method="POST" enctype="multipart/form-data"  >
        @csrf
        <ul>

        <li>
            <p class="left">
            <label for="user_id">Employee name</label>
            <select name="user_id" id="employee_id3" >
                @foreach($user->unique('name') as $users)
                <option value={{$users->id}}>{{$users->name}}</option>
                @endforeach
                </select>

            </p>
        </li>

        <div>
          <li>
            <p class="left">
              <label for="project_name">Project name</label>
              <input type="text" name="project_name" placeholder="project" required/>
            </p>
          </li>
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

          <li>
            <p>
              <label for="today_date">Today Date <span class="req">*</span></label>
              <input type="date" name="today_date" required />
            </p>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="firstPhase">9 to 11 am</label>
            <textarea cols="46" rows="3" name="firstPhase"></textarea>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="secondPhase">11 to 1 am</label>
            <textarea cols="46" rows="3" name="secondPhase"></textarea>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="thirdPhase">2 to 4 am </label>
            <textarea cols="46" rows="3" name="thirdPhase"></textarea>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="fourthPhase">4 to 6 am</label>
            <textarea cols="46" rows="3" name="fourthPhase"></textarea>
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
