<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Mail;
use App\Models\User;
use App\Mail\CardApproved;
use App\Mail\CardRejected;
use App\Models\Transaction;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Enum\TransactionType;
use App\Enum\TransactionStatus;
use App\Enum\TransactionDirection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserCardController extends Controller
{
    public function index(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Cards', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $cards = $user->card()->with(['user'])->latest()->get();

        $data = [
            'title' => 'Cards',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'cards' => $cards
        ];

        return view('dashboard.admin.user.card.index', $data);
    }

    public function show(string $uuid, string $cardUUID)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Users', 'url' => route('admin.user.index')],
            ['label' => 'Cards', 'url' => route('admin.user.card.index', $uuid)],
            ['label' => 'Card Details', 'active' => true],
        ];

        $user = User::where('uuid', $uuid)->firstOrFail();
        $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();

        $data = [
            'title' => 'Card Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'card' => $card
        ];

        return view('dashboard.admin.user.card.show', $data);
    }

    public function delete(string $uuid, string $cardUUID)
    {
        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();
            $card->delete();

            DB::commit();

            return redirect()->route('admin.user.card.index', $uuid)->with('success', 'Card deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.card.index', $uuid)->with('error', config('app.messages.error'));
        }
    }

    public function approved(Request $request, string $uuid, string $cardUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();

            $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();

            $cardFee = cardFee($card->card_level);

            // Debit user for the card
            $user->account_balance = $user->account_balance - $cardFee;
            $user->save();

            $data = [
                'status' => $request->status
            ];

            $card->update($data);

            // Create transaction
            Transaction::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'type' => TransactionType::Payment->value,
                'direction' => TransactionDirection::Debit->value,
                'description' => 'Approved ' . ucfirst($card->card_type) . ' ' . $card->card_level . ' card for ' . $user->name . ', Ref: ' . $card->reference_id,
                'amount' => $cardFee,
                'current_balance' => $user->account_balance,
                'transaction_at' => now(),
                'reference_id' => $card->reference_id,
                'status' => TransactionStatus::Completed->value,
            ]);

            // Create notification
            Notification::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'title' => 'Card Approved',
                'description' => 'Your ' . $card->card_type . ' ' . $card->card_level . ' card has been approved.',
            ]);

            // Send mail
            Mail::to($user->email)->queue(new CardApproved($user, $card));

            DB::commit();

            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('success', 'Card approved successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('error', config('app.messages.error'));
        }
    }

    public function rejected(Request $request, string $uuid, string $cardUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();

            $data = [
                'status' => $request->status
            ];

            $card->update($data);

            // Create notification
            Notification::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'title' => 'Card Rejected',
                'description' => 'Your ' . $card->card_type . ' ' . $card->card_level . ' card has been rejected.',
            ]);

            // Send mail
            Mail::to($user->email)->queue(new CardRejected($user, $card));

            DB::commit();

            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('success', 'Card rejected successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('error', config('app.messages.error'));
        }
    }

    public function unblocked(Request $request, string $uuid, string $cardUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();

            $data = [
                'status' => $request->status
            ];

            $card->update($data);

            DB::commit();

            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('success', 'Card unblocked successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('error', config('app.messages.error'));
        }
    }

    public function blocked(Request $request, string $uuid, string $cardUUID)
    {
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::where('uuid', $uuid)->firstOrFail();
            $card = $user->card()->where('uuid', $cardUUID)->firstOrFail();

            $data = [
                'status' => $request->status
            ];

            $card->update($data);

            DB::commit();

            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('success', 'Card blocked successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('admin.user.card.show', [$uuid, $cardUUID])->with('error', config('app.messages.error'));
        }
    }
}
