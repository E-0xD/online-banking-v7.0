<?php

namespace App\Http\Controllers\Dashboard\User;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CardControllerStoreRequest;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'registeredUser',
            'accountDormant',
            'accountRestricted',
            'accountFrozen',
            'accountPendingVerification'
        ]);
    }
    
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Cards', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $cards = $user->card()->with(['user'])->where('status', 'active')->latest()->get();

        $data = [
            'title' => 'Cards',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'cards' => $cards
        ];

        return view('dashboard.user.card.index', $data);
    }

    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Cards', 'url' => route('user.card.index')],
            ['label' => 'Apply for Virtual Card', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

        $data = [
            'title' => 'Apply for Virtual Card',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user
        ];

        return view('dashboard.user.card.create', $data);
    }

    public function store(CardControllerStoreRequest $request)
    {
        $validated = $request->validated();

        try {
            $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();

            // Generate card details
            $cardNumber = generateCardNumber($validated['card_type']);
            $cvv = rand(100, 999);
            $expiryDate = Carbon::now()->addYears(3)->endOfMonth();

            DB::beginTransaction();

            // Store in database
            Card::create([
                'uuid'              => str()->uuid(),
                'user_id'           => $user->id,
                'card_type'         => $validated['card_type'],
                'card_level'        => $validated['card_level'],
                'currency'          => $validated['currency'],
                'daily_limit'       => $request->daily_limit ?? 100, // default if not provided

                'card_number'       => $cardNumber,
                'cvv'               => $cvv,
                'expiry_date'       => $expiryDate,

                'card_holder_name'  => $validated['card_holder_name'],
                'billing_address'   => $validated['billing_address'],
                'city'              => $validated['city'],
                'zip'               => $validated['zip'],

                'reference_id'      => generateReferenceId(),
            ]);

            DB::commit();

            return redirect()
                ->route('user.card.index')
                ->with('success', 'Your virtual card application has been submitted successfully and is currently pending approval.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()
                ->route('user.card.index')
                ->with('error', config('app.messages.error'));
        }
    }

    public function history()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Cards', 'url' => route('user.card.index')],
            ['label' => 'Card History', 'active' => true]
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $cards =  $user->card()->with(['user'])->latest()->get();

        $data = [
            'title' => 'Card History',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'cards' => $cards
        ];

        return view('dashboard.user.card.history', $data);
    }

    public function show(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Dashboard', 'url' => route('user.dashboard')],
            ['label' => 'Cards', 'url' => route('user.card.index')],
            ['label' => 'Card History', 'url' => route('user.card.history')],
            ['label' => 'Card Details', 'active' => true],
        ];

        $user = User::where('role', 'user')->where('id', Auth::id())->firstOrFail();
        $card = $user->card()->where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Card Details',
            'breadcrumbs' => $breadcrumbs,
            'user' => $user,
            'card' => $card
        ];

        return view('dashboard.user.card.show', $data);
    }
}
