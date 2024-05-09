@extends('Dashboard.header')


@section('content')
@include('Dashboard.sidebarUser')

  <div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5">

            <div class="card">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Project</th>
                        <th scope="col">Task</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($tasks as $Item)
                        <tr>
                            <td>
                            @php
                                $project = \App\Models\ProjectName::find($Item->project_id);
                            @endphp
                            @if($project)
                                {{$project->name}}
                            @else
                                No Project Assigned
                            @endif
                            </td>
                            <td>{{$Item->task}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            </div>
        </div>
    </div>
  </div>

@include('Dashboard.footer')
@endsection
