@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')
<div class="container">
    <div class="row header">
      <h1>Employee Details &nbsp;</h1>
      <h3>“If you can't fly, then run; if you can't run, then walk; if you can't walk, then crawl, but whatever you do, you have to keep moving forward.”</h3>
    </div>
    <div class="row body">
      <form action={{route('empEdit', $emp->id)}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <ul>

          <li>
            <p class="left">
              <label for="employee_name">Employee name</label>
              <input type="text" name="employee_name"  class="employee_name" value="{{$emp->emp_name}}" placeholder="John" />
            </p>
          </li>

          <li>
            <p class="left">
              <label for="email">Employee email</label>
              <input type="email" name="email" class="email" value="{{$emp->email}}" placeholder="john@gmail.com" />
            </p>
          </li>

          <li><div class="divider"></div></li>
          <li>
            <label for="comments">Position*</label>
            <textarea cols="46" rows="3" name="comments" value="">{{$emp->comments}}</textarea>
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
