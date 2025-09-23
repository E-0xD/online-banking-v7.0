<?php

namespace App\Livewire\Dashboard\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserKycStatus extends Component
{
    public $kyc;
    public $uuid;
    public $user;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $user = User::where('uuid', $uuid)->first();

        $this->kyc = $user->kyc;
        $this->user = $user;
    }

    protected function rules()
    {
        return [
            'kyc' => ['required'],
        ];
    }

    public function updated($propertyName)
    {
        // Validate only the updated field for real-time feedback
        $this->validateOnly($propertyName);
    }

    public function updateKycStatus()
    {
        $this->validate();

        try {

            DB::beginTransaction();

            $user = User::where('uuid', $this->uuid)->firstOrFail();

            $user->kyc = $this->kyc;
            $user->save();

            DB::commit();

            session()->flash('success', 'KYC status updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            session()->flash('error', config('app.messages.error'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            session()->flash('error', config('app.messages.error'));
        }
    }

    public function render()
    {
        return view('livewire.dashboard.admin.user-kyc-status');
    }
}
