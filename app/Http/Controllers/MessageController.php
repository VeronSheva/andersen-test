<?php

namespace App\Http\Controllers;

use App\Service\MessageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct(private MessageService $service)
    {
    }

    public function create(): string
    {
        return $this->service->createMessage();
    }

    public function index(): Factory|View|Application
    {
        $this->service->indexAll();
        return view('table');
    }
}
