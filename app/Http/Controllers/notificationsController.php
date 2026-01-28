<?php

namespace App\Http\Controllers;

use App\Services\notificationsService;

class notificationsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public $token;

    public function index()
    {
        // Create an instance of the notifications service
        $notificationsService = new notificationsService();

        // Retrieve the server key token asynchronously
        $this->token = $notificationsService->getServerKeyToken();

        return view('pages.notifications.index', ['token' => $this->token]);
    }
}
