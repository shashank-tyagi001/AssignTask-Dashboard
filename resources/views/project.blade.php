@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')
@if (session('success'))
    <p class="alert alert-success text-center alert-dismissible">{{ session('success') }}</p>
@endif
<div class="container">
    <div class="row header">
      <h1>Project Details &nbsp;</h1>
      <h3>A non-binding estimate of the work that must be performed </h3>
    </div>
    <div class="row body">
      <form action={{route('projectStore')}} method="POST" enctype="multipart/form-data"  >
        @csrf
        <ul>

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
              <label for="start_date">Start Date <span class="req">*</span></label>
              <input type="date" name="start_date" required />
            </p>
          </li>

          <li>
            <p>
              <label for="end_date">End Date <span class="req">*</span></label>
              <input type="date" name="end_date" required />
            </p>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="comments">Comment*</label>
            <textarea cols="46" rows="3" name="comments"></textarea>
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
