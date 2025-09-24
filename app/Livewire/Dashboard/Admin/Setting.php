<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Setting as SettingModel;

class Setting extends Component
{
    public $loan_interest_rate, $virtual_card_fee;

    public function mount()
    {
        $setting = SettingModel::first();
        $this->loan_interest_rate = $setting->loan_interest_rate;
        $this->virtual_card_fee = $setting->virtual_card_fee;
    }

    public function rules()
    {
        return [
            'loan_interest_rate' => ['required', 'numeric'],
            'virtual_card_fee' => ['required', 'numeric'],
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
