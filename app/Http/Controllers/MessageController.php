<?php

namespace App\Http\Controllers;

use App\DTO\DTOMessage;
use App\Service\MessageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    public function __construct(private MessageService $service)
    {
    }

    public function create()
    {
//        $message = json_decode(request()->getContent(), true);
//        return $this->service->createMessage($message);
        return view('form');
    }


    public function store(): JsonResponse
    {
        $this->service->createMessage(new DTOMessage());
        return new JsonResponse('', 200);
    }

    public function index(): JsonResponse
    {
        $pag = $this->service->indexAll();
        return new JsonResponse($pag, 200);
    }
}
