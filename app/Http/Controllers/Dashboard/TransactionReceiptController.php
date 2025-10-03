<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class TransactionReceiptController extends Controller
{
    public function index(string $uuid, $userUUID)
    {
        try {
            $user = User::where('role', 'user')->where('uuid', $userUUID)->firstOrFail();
            $transaction = $user->transaction()->where('uuid', $uuid)->first();

            $transfer = $transaction->transfer;

            $name = 'TransactionReceipt_' . now()->format('YmdHis');

            $data = [
                'user' => $user,
                'transaction' => $transaction,
                'transfer' => $transfer
            ];

            $pdf = Pdf::loadView('pdf.transaction', $data);

            if (config('app.env') == 'production') {
                return $pdf->download($name);
            } else {
                return $pdf->stream($name);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('app.messages.error'));
        }
    }
}
