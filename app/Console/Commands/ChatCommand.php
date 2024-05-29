<?php

namespace App\Console\Commands;

use App\AI\ChatWithOpenAI;
use Illuminate\Console\Command;
use function Laravel\Prompts\{info , text , spin};

class ChatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'কথা-বলব';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chat with Open AI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $question = text('Ki Hoyeche?' , required: true);
        $user = new ChatWithOpenAI();
        $response = spin(fn() => ($user -> send($question)) , 'Vabchi...');
        info($response);
        while($question = text('Aro Kichu Bolte Chao?'))
        {
            $response = spin(fn() => ($user -> send($question)) , 'Vabchi...');
            info($response);
        }
    }
}
