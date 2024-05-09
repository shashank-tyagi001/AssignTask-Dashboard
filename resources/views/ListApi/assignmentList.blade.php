@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebar')
<div class="content-wrapper">


<div class="card">
    <div class="card-header">
      <h3 class="card-title">Assign Employee</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>Id</th>
          <th>Employee Name</th>
          <th>Assignment</th>
        </tr>
        </thead>
        <tbody class="assignAssignment" id="assignAssignment">

        {{-- <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
        </tr> --}}

        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
          <th>Employee Name</th>
          <th>Assignment</th>
        </tr>
        </tfoot>
      </table>

    </div>
</div>
</div>

      @include('Dashboard.footer')
      @endsection
