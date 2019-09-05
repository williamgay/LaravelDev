<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $project;

    /**
     *
     *
     * @param $project
     */
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     *
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.project-created');
    }
}
