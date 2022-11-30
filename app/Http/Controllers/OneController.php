<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OneController extends Controller
{
    public function read() {
        # Выборка основного списка клиентов
        $clients = DB::select(
            'SELECT client_id, name, brand, number
            FROM clients 
            INNER JOIN cars ON clients.id = cars.client_id'
            );
        return view('clients', ['clients' => $clients]);
    }

    public function create() {
        # Отображение форм добавления данных
        return view('create');
    }
    
    public function createClient(Request $request) {
        # Добавление клиента в БД
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
        # Добавление автомобилей в БД
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

    public function update(Request $request) {
        # Отображение обнавления данных
        $id = $request->query('id');
        return view('updates', ['id' => $id]);
    }
}
