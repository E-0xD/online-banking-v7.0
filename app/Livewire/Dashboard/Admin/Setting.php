<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Setting as SettingModel;

class Setting extends Component
{
    public $loan_interest_rate,
        $virtual_card_fee,
        $paypal_email,
        $bank_name,
        $account_name,
        $account_number,
        $routing_number,
        $bank_swift_code,
        $bank_iban,
        $bank_address;

    public function mount()
    {
        $setting = SettingModel::first();
        $this->loan_interest_rate = $setting->loan_interest_rate;
        $this->virtual_card_fee = $setting->virtual_card_fee;
        $this->paypal_email = $setting->paypal_email;
        $this->bank_name = $setting->bank_name;
        $this->account_name = $setting->account_name;
        $this->account_number = $setting->account_number;
        $this->routing_number = $setting->routing_number;
        $this->bank_swift_code = $setting->bank_swift_code;
        $this->bank_iban = $setting->bank_iban;
        $this->bank_address = $setting->bank_address;
    }

    public function rules()
    {
        return [
            'loan_interest_rate' => ['required', 'numeric'],
            'virtual_card_fee' => ['required', 'numeric'],
            'paypal_email' => ['required', 'email'],
            'bank_name' => ['required'],
            'account_name' => ['required'],
            'account_number' => ['required'],
            'routing_number' => ['nullable'],
            'bank_swift_code' => ['nullable'],
            'bank_iban' => ['nullable'],
            'bank_address' => ['nullable'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            SettingModel::updateOrCreate(
                ['id' => 1],
                [
                    'loan_interest_rate' => $this->loan_interest_rate,
                    'virtual_card_fee' => $this->virtual_card_fee,
                    'paypal_email' => $this->paypal_email,
                    'bank_name' => $this->bank_name,
                    'account_name' => $this->account_name,
                    'account_number' => $this->account_number,
                    'routing_number' => $this->routing_number,
                    'bank_swift_code' => $this->bank_swift_code,
                    'bank_iban' => $this->bank_iban,
                    'bank_address' => $this->bank_address
                ]
            );

            DB::commit();

            session()->flash('success', config('app.messages.success'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            session()->flash('error', config('app.messages.error'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', config('app.messages.error'));
        }
    }

    public function render()
    {
        return view('livewire.dashboard.admin.setting');
    }
}
