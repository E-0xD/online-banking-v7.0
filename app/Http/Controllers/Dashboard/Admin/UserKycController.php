<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Enum\UserKycStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserKycController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'KYC Verification', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'KYC Verification',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.kyc.index', $data);
    }


    public function approve(Request $request, string $uuid)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $user->update([
                'kyc' => UserKycStatus::Approved->value,
            ]);

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'KYC Verification Approved',
                'description' => 'Your KYC verification has been approved. You can now start using the platform.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', config('app.messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function reject(Request $request, string $uuid)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $user->update([
                'kyc' => UserKycStatus::Rejected->value,
            ]);

            $user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'KYC Verification Rejected',
                'description' => 'Your KYC verification has been rejected. Please try again.',
            ]);

            DB::commit();

            return redirect()->back()->with('success', config('app.messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
