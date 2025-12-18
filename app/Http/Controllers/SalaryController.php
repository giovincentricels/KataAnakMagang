<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryController extends Controller
{
    //
    public function index()
    {
        $salaries = Salary::latest()->paginate(9);

        return view('salaries', compact('salaries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'salary' => 'required|integer|min:0',
            'min_salary' => 'nullable|integer|min:0',
            'max_salary' => 'nullable|integer|min:0',
            'average_salary' => 'nullable|integer|min:0',
            'is_anonymous' => 'boolean',
        ]);

        $minSalary = (int) ($validated['salary'] * 0.85);
        $maxSalary = (int) ($validated['salary'] * 1.15);

        Salary::create([
            'user_id'        => Auth::id(),
            'job_title'      => $validated['job_title'],
            'company_name'   => $validated['company_name'],
            'location'       => $validated['location'],
            'type'           => $validated['type'] ?? null,
            'salary'         => $validated['salary'],
            'min_salary'     => $minSalary,
            'max_salary'     => $maxSalary,
            'average_salary' => $validated['salary'],
            'is_anonymous'   => $request->boolean('is_anonymous'),
        ]);

        return redirect()->back()->with('success', 'Salary entry submitted successfully.');
    }
}
