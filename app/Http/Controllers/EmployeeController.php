<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class EmployeeController extends Controller
{
    private $apiBaseUrl = 'http://34.228.177.130:31411/api/employees';
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $employees = $this->fetchData($this->apiBaseUrl);
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        // Return view to create new employee
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name']);
        $this->postData($this->apiBaseUrl, $data);
        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        $employee = $this->fetchData("$this->apiBaseUrl/$id");
        return view('employees.show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        $employee = $this->fetchData("$this->apiBaseUrl/$id");
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['name']);
        $this->putData("$this->apiBaseUrl/$id", $data);
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $this->deleteData("$this->apiBaseUrl/$id");
        return redirect()->route('employees.index');
    }

    private function fetchData($url)
    {
        try {
            $response = $this->client->get($url);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            \Log::error('Fetch Data Error: ' . $e->getMessage());
            abort(404, 'API endpoint not found or request failed.');
        }
    }

    private function postData($url, $data)
    {
        try {
            $response = $this->client->post($url, [
                'json' => $data,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            \Log::info('Post Data Response: ' . $response->getBody());
        } catch (RequestException $e) {
            \Log::error('Post Data Error: ' . $e->getMessage());
            abort(500, 'Failed to post data to API.');
        }
    }

    private function putData($url, $data)
    {
        try {
            $response = $this->client->put($url, [
                'json' => $data,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            \Log::info('Put Data Response: ' . $response->getBody());
        } catch (RequestException $e) {
            \Log::error('Put Data Error: ' . $e->getMessage());
            abort(500, 'Failed to put data to API.');
        }
    }

    private function deleteData($url)
    {
        try {
            $response = $this->client->delete($url, [
                'headers' => ['Content-Type' => 'application/json']
            ]);
            \Log::info('Delete Data Response: ' . $response->getBody());
        } catch (RequestException $e) {
            \Log::error('Delete Data Error: ' . $e->getMessage());
            abort(500, 'Failed to delete data from API.');
        }
    }
}
