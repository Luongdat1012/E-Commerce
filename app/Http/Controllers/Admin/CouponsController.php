<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupons;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponsFormRequest;
use App\Http\Services\Admin\Category\CategoryService;
use App\Http\Services\Admin\Coupon\CouponService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CouponsController extends Controller
{

    protected $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.coupon.Coupon');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.coupon.CouponForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CouponsFormRequest $request
     * @return RedirectResponse
     */
    public function store(CouponsFormRequest $request)
    {
        $this->couponService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $coupon = Coupons::find($id);
        return view('admin.coupon.CouponForm', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CouponsFormRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CouponsFormRequest $request, $id)
    {
        $this->couponService->update($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
