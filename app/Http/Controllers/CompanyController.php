<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Company::query();

        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('type') && $request->type !== 'All Type') {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $companies = Company::latest()->paginate(9)->withQueryString();

        return view('companies', compact('companies'));
    }

    public function show(Company $company)
    {
        $company->load([
            'reviews' => function ($query) {
                $query->latest();
            },
        ]);

        return view('detail', compact('company'));
    }
}
