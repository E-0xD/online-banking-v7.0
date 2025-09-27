<?php

namespace App\Livewire\Dashboard\Admin;

use App\Models\User;
use Livewire\Component;
use App\Enum\UserStatus;
use App\Enum\UserAccountState as UserAccountStateEnum;
use App\Enum\UserKycStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserAccountState extends Component
{
    public $account_state;
    public $account_state_message;
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::where('uuid', $userId)->first();

        $this->account_state = $user->account_state;
        $this->account_state_message = $user->account_state_message;
    }

    protected function rules()
    {
        return [
            'account_state' => ['required'],
            'account_state_message' => ['nullable']
        ];
    }

    public function updated($propertyName)
    {
        // Validate only the updated field for real-time feedback
        $this->validateOnly($propertyName);
    }

    public function updateAccountState()
    {
        $this->validate();

        try {

            DB::beginTransaction();

            $user = User::where('uuid', $this->userId)->firstOrFail();

            if ($this->account_state === UserAccountStateEnum::Disabled->value) {
                $user->status = UserStatus::INACTIVE->value;
            } else {
                $user->status = UserStatus::ACTIVE->value;
            }

            if ($this->account_state === UserAccountStateEnum::Kyc->value) {
                $user->kyc = UserKycStatus::Pending->value;
            } else {
                $user->kyc = UserKycStatus::Approved->value;
            }

            $user->account_state = $this->account_state;
            $user->account_state_message = $this->account_state_message;
            $user->save();

            DB::commit();

            session()->flash('success', 'User account state updated successfully');
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
        return view('livewire.dashboard.admin.user-account-state');
    }
}
