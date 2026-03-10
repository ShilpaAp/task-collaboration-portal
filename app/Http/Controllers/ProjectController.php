<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Update;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    public function viewAdmin_project(Request $request) {
        $projects = Project::with(['developer','client'])->get();
        $developers = User::where('role','Developer')->get();
        $clients = User::where('role','Client')->get();
        $query = Project::query();
        if($request->search){
            $query->where('title','like','%'.$request->search.'%');
        }
        $projects = $query->get();
        return view('admin.project', compact('projects','developers','clients'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'developer_id' => 'required',
            'client_id' => 'required',
        ]);
        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'developer_id' => $request->developer_id,
            'client_id' => $request->client_id,
            'status' => 'pending',
        ]);
        return redirect()->route('admin.project');
    }

    public function viewdev_project() {
        $projects = Project::where('developer_id',Session::get('loginId'))->get();
        return view('developer.dashboard', compact('projects'));
    }

    public function updateStatus(Request $request, $id){
        $project = Project::find($id);
        $project->status = $request->status;
        $project->save();

        return back();
    }

   public function storeUpdate(Request $request, $id)
    {
        $update = Update::where('project_id', $id)->first();

        $filename = $update->attachment ?? null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }

        $note = $request->note ?? $update->note;

        Update::updateOrCreate(
            ['project_id' => $id],
            [
                'note' => $note,
                'attachment' => $filename
            ]
        );

        return back()->with('success','Update saved');
    }

    public function viewClient(Request $request){
        $projects = Project::with('updates')
        ->where('client_id', Session::get('loginId'))
        ->get();       
        return view('client.dashboard', compact('projects'));

    }

    public function clientstore(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Client',
        ]);
        return redirect()->route('admin.client');
    }

    public function developerstore(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Developer',
        ]);
        return redirect()->route('admin.developer');
    }
}
