<?php


namespace App\Service;


use App\DTO\DTOMessage;
use App\Models\Message;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageService
{
    public function createMessage(DTOMessage $message)
    {
        return Message::create(['name' => $message->name,
            'email' => $message->email,
            'message' => $message->message,
            'create_date' => date('Y-m-d H:i:s')]);
    }

    public function indexAll(): LengthAwarePaginator
    {
        return Message::orderByDesc('create_date')->paginate(2);
    }
}
