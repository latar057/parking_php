<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OneController extends Controller
{
    public function read() {
        $clients = DB::select(
            'SELECT name, brand, number
            FROM clients 
            INNER JOIN cars ON clients.id = cars.client_id'
            );
        return view('clients', ['clients' => $clients]);
    }

    public function create() {
        return view('create');
    }
    
    public function createClient(Request $request) {
        DB::insert(
            'INSERT INTO clients (name, gender, phone, adress, car)
            VALUES (?, ?, ?, ?, ?)',
            [
                $request->input('name'),
                $request->input('gender'),
                $request->input('number'),
                $request->input('adress'),
                $request->input('car'),
            ]);

        return redirect()->route('create');
    }

    public function createCar(Request $request) {
        
        $client_id = DB::select(
            'SELECT id FROM clients
            ORDER BY id DESC
            LIMIT 1'
            );
        
        $client_id = json_decode(json_encode($client_id), true);

        DB::insert(
            'INSERT INTO cars (brand, model, color, number, flag, client_id)
            VALUES (?, ?, ?, ?, ?, ?)',
            [
                $request->input('brand'),
                $request->input('model'),
                $request->input('color'),
                $request->input('number'),
                $request->input('flag'),
                
            ]
        );
        
        return redirect()->route('create');
    }
}
