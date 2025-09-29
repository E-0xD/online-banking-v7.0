<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
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
}
