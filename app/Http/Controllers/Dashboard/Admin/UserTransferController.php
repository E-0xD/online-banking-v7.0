<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\TransferCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserTransferController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'User Transfer', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $transfers = $user->transfer()->with(['user'])->latest()->get();

        $data = [
            'title' => 'User Transfer',
            'user' => $user,
            'breadcrumbs' => $breadcrumbs,
            'transfers' => $transfers
        ];

        return view('dashboard.admin.user.transfer.index', $data);
    }

    public function show(string $uuid, string $transferUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'User Transfer', 'url' => route('admin.user.transfer.index', $uuid)],
            ['label' => 'Transfer Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $transfer = $user->transfer()->with(['user'])->where('uuid', $transferUUID)->firstOrFail();

        $transferCode = new TransferCode();

        $data = [
            'title' => 'Transfer Details',
            'user' => $user,
            'transfer' => $transfer,
            'breadcrumbs' => $breadcrumbs,
            'transferCodes' => $transferCode->getTransferVerificationData($transfer->reference_id)
        ];

        return view('dashboard.admin.user.transfer.show', $data);
    }

    public function delete(string $uuid, string $transferUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $transfer = $user->transfer()->where('uuid', $transferUUID)->firstOrFail();
            $transfer->delete();

            DB::commit();
            return redirect()->route('admin.user.transfer.index', $uuid)->with('success', 'Transfer deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.transfer.index', $uuid)->with('error', config('app.messages.error'));
        }
    }
}
