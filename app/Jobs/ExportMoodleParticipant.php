<?php

namespace App\Jobs;

use App\Helpers\MailService;
use App\Helpers\MoodleRequestService;
use App\Models\ExportedUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportMoodleParticipant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $moodleRequest = new MoodleRequestService();
            $response = $moodleRequest->createMoodleUser($this->user); // Should return moodle user id
            if (!is_null($response)) {
                // Create record in database...
                ExportedUser::create(['participant_id' => $this->user->participant->id, 'emails' => 1]);
            }
        } catch (\Exception $exception) {
            MailService::sendErrorEmail($exception);
        }
    }
}
