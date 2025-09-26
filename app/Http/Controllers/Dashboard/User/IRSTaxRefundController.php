<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Models\User;
use App\Models\IRSTaxRefund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\IRSTaxRefundControllerStoreRequest;
use Illuminate\Support\Facades\Hash;

class IRSTaxRefundController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'IRS Tax Refund', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $latestRefund = $user->irsTaxRefund()->latest()->first();

        $data = [
            'title' => 'IRS Tax Refund',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'latestRefund' => $latestRefund
        ];

        return view('dashboard.user.irs_tax_refund.index', $data);
    }

    public function store(IRSTaxRefundControllerStoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            $data['uuid'] = str()->uuid();
            $data['id_me_password'] = Hash::make($data['id_me_password']); // encrypt password
            $data['filing_id'] = 'SIM-' . strtoupper(uniqid()); // generate fake IRS filing ID
            $irsTaxRefund = $user->irsTaxRefund()->create($data);

            DB::commit();

            return redirect()->route('user.irs_tax_refund.filing_id', $irsTaxRefund->uuid)->with('success', 'Your refund request has been submitted successfully. Please enter your filing ID to proceed.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function filingID(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'IRS Tax Refund', 'url' => route('user.irs_tax_refund.index')],
            ['label' => 'Enter Filing ID', 'active' => true]
        ];

        $irsTaxRefund = IRSTaxRefund::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Enter Filing ID',
            'breadcrumbs' => $breadcrumbs,
            'user' => User::where('role', 'user')->where('id', Auth::id())->firstOrFail(),
            'irsTaxRefund' => $irsTaxRefund
        ];

        return view('dashboard.user.irs_tax_refund.filing_id', $data);
    }

    public function filingIDStore(Request $request)
    {
        $request->validate([
            'filing_id' => ['required', 'exists:i_r_s_tax_refunds,filing_id'],
        ], [
            'filing_id.required' => 'Filing ID is required.',
            'filing_id.exists' => 'Filing ID not found.',
        ]);

        try {
            $irsTaxRefund = IRSTaxRefund::where('filing_id', $request->filing_id)->firstOrFail();

            if (!$irsTaxRefund) {
                return redirect()->back()->with('error', 'Filing ID not found.');
            }

            $irsTaxRefund->update([
                'status' => 'submitted'
            ]);

            $irsTaxRefund->user->notification()->create([
                'uuid' => str()->uuid(),
                'title' => 'IRS Tax Refund',
                'description' => 'Your IRS Tax Refund has been submitted successfully, please wait for our support team to process your refund request.'
            ]);

            return redirect()->route('user.irs_tax_refund.index')->with('success', 'Your filing ID has been verified successfully, please wait for our support team to process your refund request.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function track()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'IRS Tax Refund', 'ur' => route('user.irs_tax_refund.index')],
            ['label' => 'Track Refund', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $latestRefund = $user->irsTaxRefund()->latest()->first();

        if ($latestRefund->isPending()) {
            return redirect()->route('user.irs_tax_refund.filing_id', $user->irsTaxRefund->uuid)->with('error', 'Please submit your filing ID to track your refund status.');
        }

        $data = [
            'title' => 'Track Refund',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.user.irs_tax_refund.track', $data);
    }

    public function trackStore(Request $request)
    {
        $request->validate([
            'filing_id' => ['required', 'exists:i_r_s_tax_refunds,filing_id'],
        ], [
            'filing_id.required' => 'Filing ID is required.',
            'filing_id.exists' => 'Filing ID not found.',
        ]);

        try {
            $irsTaxRefund = IRSTaxRefund::where('filing_id', $request->filing_id)->firstOrFail();

            if (!$irsTaxRefund) {
                return redirect()->back()->with('error', 'Filing ID not found.');
            }

            return redirect()->route('user.irs_tax_refund.result', $irsTaxRefund->uuid);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    public function result(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'IRS Tax Refund', 'url' => route('user.irs_tax_refund.index')],
            ['label' => 'Track Refund', 'url' => route('user.irs_tax_refund.track')],
            ['label' => 'Track Result', 'active' => true]
        ];

        $irsTaxRefund = IRSTaxRefund::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Track Result',
            'breadcrumbs' => $breadcrumbs,
            'irsTaxRefund' => $irsTaxRefund
        ];

        return view('dashboard.user.irs_tax_refund.result', $data);
    }
}
