<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enum\IRSTaxRefundStatus;
use App\Models\User;
use App\Models\IRSTaxRefund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserIRSTaxRefundController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'IRS Tax Refund', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $irsTaxRefunds = $user->irsTaxRefund()->latest()->get();

        $data = [
            'title' => 'IRS Tax Refund',
            'user' => $user,
            'irsTaxRefunds' => $irsTaxRefunds,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.irs_tax_refund.index', $data);
    }

    public function show(string $uuid, string $irsTaxRefundUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'IRS Tax Refund', 'url' => route('admin.user.irs_tax_refund.index', $uuid)],
            ['label' => 'IRS Tax Refund Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $irsTaxRefund = $user->irsTaxRefund()->where('uuid', $irsTaxRefundUUID)->firstOrFail();

        $data = [
            'title' => 'IRS Tax Refund Details',
            'user' => $user,
            'irsTaxRefund' => $irsTaxRefund,
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.user.irs_tax_refund.show', $data);
    }

    public function update(Request $request, string $uuid, string $irsTaxRefundUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $irsTaxRefund = IRSTaxRefund::where('uuid', $irsTaxRefundUUID)->firstOrFail();

            $irsTaxRefund->update([
                'status' => $request->status
            ]);

            if ($request->status == IRSTaxRefundStatus::Rejected->value) {
                $user->notification()->create([
                    'uuid' => str()->uuid(),
                    'title' => 'IRS Tax Refund Rejected',
                    'description' => 'Unfortunately, your IRS tax refund request has been rejected. Please review your information and try submitting again if necessary.',
                ]);
            } elseif ($request->status == IRSTaxRefundStatus::Refunded->value) {
                $user->notification()->create([
                    'uuid' => str()->uuid(),
                    'title' => 'IRS Tax Refund Accepted',
                    'description' => ' Your IRS tax refund has been approved and processed. The refund has been credited to your account.',
                ]);
            }

            DB::commit();
            return redirect()->route('admin.user.irs_tax_refund.show', [$uuid, $irsTaxRefundUUID])->with('success', 'IRS Tax Refund updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.user.irs_tax_refund.show', [$uuid, $irsTaxRefundUUID])->with('error', $e->getMessage());
        }
    }

    public function delete(string $uuid, string $irsTaxRefundUUID)
    {
        try {
            DB::beginTransaction();
            $user = User::where('uuid', $uuid)->firstOrFail();
            $irsTaxRefund = $user->irsTaxRefund()->where('uuid', $irsTaxRefundUUID)->firstOrFail();
            $irsTaxRefund->delete();
            DB::commit();
            return redirect()->route('admin.user.irs_tax_refund.index', $uuid)->with('success', 'IRS Tax Refund deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.user.irs_tax_refund.index', $uuid)->with('error', $e->getMessage());
        }
    }
}
