<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KycControllerStoreRequest;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Log;

class KycController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Verify Your Identity', 'url' => route('user.kyc.index'), 'active' => true]
        ];

        $data = [
            'title' => 'Verify Your Identity',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.kyc.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Verify Your Identity', 'url' => route('user.kyc.index')],
            ['label' => 'KYC Verification', 'url' => route('user.kyc.form'), 'active' => true]
        ];

        $data = [
            'title' => 'KYC Verification',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail()
        ];

        return view('dashboard.user.kyc.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KycControllerStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $data['front_side'] = $this->imageInterventionUpdateFile($request, 'front_side', '/uploads/dashboard/user/document/', 1012, 638, $user?->front_side);

            $data['back_side'] = $this->imageInterventionUpdateFile($request, 'back_side', '/uploads/dashboard/user/document/', 1012, 638, $user?->back_side);

            $user->update($data);

            DB::commit();

            return redirect()->route('user.dashboard')->with('success', 'KYC Verification successful.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
