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
            'INSERT INTO clients (id, name, gender, phone, adress, car)
            VALUES (NULL, ?, ?, ?, ?, ?)',
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
        
        DB::insert(
            'INSERT INTO cars (brand, model, color, number, flag, client_id)
            VALUES (?, ?, ?, ?, ?, (
                SELECT id FROM clients
                ORDER BY id DESC
                LIMIT 1
            ))',
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
