<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminWalletStoreRequest;
use App\Http\Requests\AdminWalletUpdateRequest;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Log;

class WalletController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Wallets', 'active' => true],
        ];

        $wallets = Wallet::latest()->get();

        $data = [
            'title' => 'Wallets',
            'breadcrumbs' => $breadcrumbs,
            'wallets' => $wallets
        ];

        return view('dashboard.admin.wallet.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Wallets', 'url' => route('admin.wallet.index')],
            ['label' => 'Create Wallet', 'active' => true],
        ];

        $data = [
            'title' => 'Create Wallet',
            'breadcrumbs' => $breadcrumbs
        ];

        return view('dashboard.admin.wallet.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminWalletStoreRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $wallet = Wallet::create([
                'uuid' => str()->uuid(),
                'name' => $request->name,
                'symbol' => $request->symbol,
                'address' => $request->address,
                'network' => $request->network,
                'qr_code_path' => $this->imageInterventionUploadFile($request, 'qr_code_path', '/uploads/dashboard/admin/wallet/', 450, 450),
                'balance' => $request->balance,
                'status' => $request->status,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('admin.wallet.show', $wallet->uuid)->with('success', 'Wallet created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Wallets', 'url' => route('admin.wallet.index')],
            ['label' => 'Wallet Details', 'active' => true],
        ];

        $wallet = Wallet::where('uuid', $uuid)->first();

        $data = [
            'title' => 'Wallet Details',
            'breadcrumbs' => $breadcrumbs,
            'wallet' => $wallet,
        ];

        return view('dashboard.admin.wallet.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Wallets', 'url' => route('admin.wallet.index')],
            ['label' => 'Edit Wallet', 'active' => true],
        ];

        $wallet = Wallet::where('uuid', $uuid)->first();

        $data = [
            'title' => 'Edit Wallet',
            'breadcrumbs' => $breadcrumbs,
            'wallet' => $wallet,
        ];

        return view('dashboard.admin.wallet.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminWalletUpdateRequest $request, string $id)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $wallet = Wallet::where('uuid', $id)->first();

            $wallet->update([
                'name' => $request->name,
                'symbol' => $request->symbol,
                'address' => $request->address,
                'network' => $request->network,
                'qr_code_path' => $this->imageInterventionUpdateFile($request, 'qr_code_path', '/uploads/dashboard/admin/wallet/', 450, 450, $wallet?->qr_code_path),
                'balance' => $request->balance,
                'status' => $request->status,
                'description' => $request->description,
            ]);

            DB::commit();
            return redirect()->route('admin.wallet.show', $wallet->uuid)->with('success', 'Wallet updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        try {
            DB::beginTransaction();

            $wallet = Wallet::where('uuid', $uuid)->first();

            $walletQrCode = $wallet->qr_code_path;

            $wallet->delete();

            $this->deleteFile($walletQrCode);

            DB::commit();

            return redirect()->route('admin.wallet.index')->with('success', 'Wallet deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
