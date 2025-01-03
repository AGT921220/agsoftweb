<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $this->saveRequest();
        return view('index');
    }
    private function saveRequest()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? null;
        $referer = $_SERVER['HTTP_REFERER'] ?? null;
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? null;
        $requestUri = $_SERVER['REQUEST_URI'] ?? null;
        $queryString = $_SERVER['QUERY_STRING'] ?? null;

        $visit = new Visit();
        $visit->user_agent = $userAgent;
        $visit->ip_address = $ipAddress;
        $visit->referer = $referer;
        $visit->request_method = $requestMethod;
        $visit->request_uri = $requestUri;
        $visit->query_string = $queryString;
        $visit->save();
    }
}
