<?php

namespace App\Mail;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CategoryCreate extends Mailable
{
    use Queueable, SerializesModels;

    private $category;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->student);
        return $this->view('mail.category', [
            'category' => $this->category,
        ]);
    }
}
