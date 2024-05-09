<?php

namespace App\Providers;

use App\Models\ProjectName;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       $employee = DB::table('employees')->get();
       view()->share('employee',$employee);

        $project = DB::table('project_names')->get();
       view()->share('project',$project);

        $assignment = DB::table('assignments')->get();
        view()->share('assignment',$assignment);

        $user = DB::table('users')->where('role',0)->get();
        view()->share('user',$user);

        $task = DB::table('assign_tasks')->get();
        view()->share('task',$task);

        $result = ProjectName::groupBy('id')
                    ->select(DB::raw('count(*) as user_count'), 'id')
                    ->get();
        view()->share('totalProject',$result);
     }
}
