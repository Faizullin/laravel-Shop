<?php

namespace App\Models\Traits;

use App\Jobs\Auth\ResetPasswordJob;
use Illuminate\Database\Eloquent\Builder;


trait CanSendQueuedEmail
{
    /**
     * Apply Filters on the Eloquent Model
     *
     * @param $query
     * @param QueryFilter $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */

	public function sendPasswordResetNotification($token)
	{
	    ResetPasswordJob::dispatch($this,$token);
	}
       
}


