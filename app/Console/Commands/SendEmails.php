<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $postRepository;
    private $userRepository;
    public function __construct(PostRepository $postRepository,UserRepository $userRepository)
    {
        parent::__construct();
        $this->postRepository  = $postRepository;
        $this->userRepository  = $userRepository;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $topLike = $this->postRepository->getTopLike();
        $email = $topLike['0'];
        $like = $topLike['0'];
        
         $data = array(
            'email' => $email['0'],
            'like' =>$like['1']
        );
        Mail::send('emails.test',$data,
            function($message) {
            $message->to('YOUR@EMAIL.com')
            ->subject('Beetsoft thông báo');
        });
        $this->info('The emails are send successfully!');

    }
}
