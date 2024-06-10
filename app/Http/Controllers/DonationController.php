<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use App\Models\Project;
//use App\Models\Donation;
//use Illuminate\Support\Facades\Auth;
//
//class DonationController extends Controller
//{
//    public function store(Request $request, Project $project)
//    {
//        $request->validate([
//            'amount' => 'required|numeric|min:1',
//            'comment' => 'nullable|string',
//        ]);
//
//        $donation = new Donation();
//        $donation->user_id = Auth::id();
//        $donation->project_id = $project->id;
//        $donation->amount = $request->input('amount');
//        $donation->comment = $request->input('comment');
//        $donation->save();
//
//        $project->current_amount += $donation->amount;
//        $project->save();
//
//        $user = Auth::user();
//        $user->balance += $donation->amount;
//        $user->save();
//
//        return redirect()->route('projects.show', $project)->with('success', 'Донат внесено успішно!');
//    }
//}


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'comment' => 'nullable|string',
        ]);

        $donation = new Donation();
        $donation->user_id = Auth::id();
        $donation->project_id = $project->id;
        $donation->amount = $request->input('amount');
        $donation->comment = $request->input('comment');
        $donation->save();

        // Оновлення суми наявних коштів проекту
        $project->current_amount += $donation->amount;
        $project->save();

        // Оновлення балансу користувача
        $user = Auth::user();
        $user->balance += $donation->amount;
        $user->save();

        $project->isCompleted();

        return redirect()->route('projects.show', $project)->with('success', 'Донат внесено успішно!');
    }
}
