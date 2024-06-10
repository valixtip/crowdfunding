<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function store(Request $request, Project $project)
    {
        if (Auth::id() !== $project->user_id) {
            return redirect()->route('projects.show', $project)->with('error', 'Ви не маєте права додавати звіти до цього проекту.');
        }

        $request->validate([
            'text' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $report = new Report();
        $report->user_id = Auth::id();
        $report->project_id = $project->id;
        $report->text = $request->input('text');

        if ($request->hasFile('photo')) {
            $report->photo = $request->file('photo')->store('photos', 'public');
        }

        $report->save();

        return redirect()->route('projects.show', $project)->with('success', 'Звіт додано успішно!');
    }
}
