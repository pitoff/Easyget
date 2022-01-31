<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ManagerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MakeManagerRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin'])->except('makeManagerRequest');
    }

    public function makeManagerRequest(Request $request)
    {
        ManagerRequest::create([
            'user_id' => auth()->user()->id,
            'my_request' => $request->status,
            'status' => ''
        ]);

        return back()->with('RequestCreated', 'Your request has been created');
    }

    public function showRequests()
    {
        $makeManagerRequests = ManagerRequest::all();

        return view('dashboard.admin.make_manager_requests.index', [
            'makeManagerRequests' => $makeManagerRequests
        ]);
    }

    public function makeManager(User $user)
    {
        $makeManager = $user->where('id', $user->id)->update([
            'role' => 'is_manager'
        ]);

        $updateManagerStatus = ManagerRequest::where('user_id', $user->id)->update([
            'status' => 'accepted'
        ]);

        if($makeManager && $updateManagerStatus){
            return back()->with('MadeManager', 'You added a new Manager');
        }
        
    }

    public function declineManagerRequest(ManagerRequest $id)
    {
        $id->delete();
        return back();
    }
}
