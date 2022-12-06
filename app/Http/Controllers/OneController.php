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
        # Отображение форм добавления данных клиента и автомобиля
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
        $update_table = DB::select(
            "SELECT * 
            FROM clients
                INNER JOIN cars ON cars.client_id = clients.id
            WHERE client_id = ?",
            [
                $id
            ]
            );
        return view('update', ['update_table' => $update_table]);
    }

    public function updateClient(Request $request) {
        # Редактирование клиента
        DB::update(
            "UPDATE clients
            SET name = ?, gender = ?, phone = ?, adress = ?, car = ?
            WHERE id = ?",
            [
                $request->name,
                $request->gender,
                $request->number,
                $request->adress,
                $request->car,
                $request->client_id
            ]
        );

        return redirect()->route('update', ['id' => $request->client_id]);
    }

    public function updateCar(Request $request) {
        # Редактирование автомобилей
        DB::update(
            "UPDATE cars
            SET brand = ?, model = ?, color = ?, number = ?, flag = ?
            WHERE client_id = ?",
            [
                $request->brand,
                $request->model,
                $request->color,
                $request->number,
                $request->flag,
                $request->client_id
            ]
        );

        return redirect()->route('update', ['id' => $request->client_id]);
    }

    public function deleted(Request $request) {
        # Удаление данных
        DB::delete(
            "DELETE FROM cars
            WHERE number = ?",
            [
                $request->number
            ]
        );

        return redirect()->route('clients');
    }
}
