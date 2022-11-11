<?php


namespace App\Service;


use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function createMessage(): string
    {
        Message::create() ;
        return 'created';
    }

    public function indexAll(): Collection
    {
        return Message::all();
    }
}
