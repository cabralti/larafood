<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateDeTailPlan;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailsPlan, Plan $plan)
    {
        $this->repository = $detailsPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);

    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function store(StoreUpdateDeTailPlan $request, $urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function edit($urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    public function update(StoreUpdateDeTailPlan $request, $urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }
        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }
}
