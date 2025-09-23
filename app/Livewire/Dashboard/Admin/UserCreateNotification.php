<?php

namespace App\Livewire\Dashboard\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotificationSuccess;

class UserCreateNotification extends Component
{
    public $title;
    public $description;
    public $uuid;
    public $user;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $user = User::where('uuid', $uuid)->first();

        $this->title;
        $this->description;
        $this->user = $user;
    }

    protected function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
        ];
    }

    public function created($propertyName)
    {
        // Validate only the created field for real-time feedback
        $this->validateOnly($propertyName);
    }

    public function createNotification()
    {
        $this->validate();

        try {

            DB::beginTransaction();

            $user = User::where('uuid', $this->uuid)->firstOrFail();

            $notification = Notification::create([
                'uuid' => str()->uuid(),
                'user_id' => $user->id,
                'title' => $this->title,
                'description' => $this->description
            ]);

            Mail::to($user->email)->queue(new UserNotificationSuccess($user, $notification, $this->title));

            DB::commit();

            $this->reset(['title', 'description']);

            session()->flash('success', 'Notification created successfully');
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
        return view('livewire.dashboard.admin.user-create-notification');
    }
}
