@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')
<div class="container">
    <div class="row header">
      <h1>Project Details &nbsp;</h1>
      <h3>A non-binding estimate of the work that must be performed </h3>
    </div>
    <div class="row body">
      <form action={{route('proEdit', $project->id)}} method="POST" enctype="multipart/form-data" id="editForm" class="editForm" >
        @csrf
        @method('PUT')
        <ul>

        <div>
          <li>
            <p class="left">
              <label for="project_name">Project name</label>
              <input type="text" name="project_name" id="project_name"  value="{{$project->name}}" class="projectName" placeholder="project" required/>
            </p>
          </li>
          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

          <li>
            <p>
              <label for="start_date">Start Date <span class="req">*</span></label>
              <input type="date" name="start_date"  value="{{$project->startDate}}" ` required />
            </p>
          </li>

          <li>
            <p>
              <label for="end_date">End Date <span class="req">*</span></label>
              <input type="date" name="end_date" value="{{$project->endDate}}" required />
            </p>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="comments">Comment*</label>
            <textarea cols="46" rows="3" name="comments" value="">{{$project->comments}}</textarea>
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
