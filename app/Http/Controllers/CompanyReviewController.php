<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
class CompanyReviewController extends Controller
{
    //
    public function store(Request $request, Company $company)
    {
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'position' => 'required|string|max:255',
            'duration' => 'nullable|string|max:255',
            'content' => 'required|string',
            'is_anonymous' => 'sometimes|boolean',
        ]);

        $data['user_id'] = Auth::id();
        $data['company_id'] = $request->boolean('is_anonymous');

        $company->reviews()->create($data);

        $this->updateCompanyRating($company);

        return back()->with('success', 'Review submitted successfully.');
    }

    public function destroy(CompanyReview $review)
    {
        $this->authorize('delete', $review);

        $company = $review->company;
        $review->delete();

        $this->updateCompanyRating($company);

        return back()->with('success', 'Review deleted successfully.');
    }

    private function updateCompanyRating(Company $company)
    {
        $company->update([
            'average_rating' => round($company->reviews()->avg('rating') ?? 0, 1),
            'reviews_count'  => $company->reviews()->count(),
        ]);
    }
}
