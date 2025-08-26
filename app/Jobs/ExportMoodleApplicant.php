<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Helpers\MoodleRequestService;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\ExportedUser;
use App\Helpers\MailService;

class ExportMoodleApplicant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $userId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            // Cargar el usuario con la relación applicant directamente en el worker
            $user = User::with('applicant')->findOrFail($this->userId);

            $moodleRequest = new MoodleRequestService();
            $response = $moodleRequest->createMoodleUser($user);

            if (!is_null($response)) {
                ExportedUser::create([
                    'applicant_id' => $user->applicant->id,
                    'emails' => 1
                ]);
            }
        } catch (\Exception $exception) {
            MailService::sendErrorEmail($exception);
        }
    }
}
