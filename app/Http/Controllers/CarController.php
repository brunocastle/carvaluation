<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $car = CarModel::all();
        $total = CarModel::all()->count();
        return view('list-cars',compact('car','total'));
    }

    public function create(){
        return view('include-car');
    }

    public function store(Request $request){
        $car = new CarModel();
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->valuation = $request->valuation;
        $car->description = $request->description;
        $car->save();
        return redirect()->route('car.index')->with('message','Carro adicionado com sucesso.');
    }

    public function show($id){

    }

    public function edit($id){
        $car = CarModel::findOrFail($id);
        return view('alter-car',compact('car'));
    }

    public function update(Request $request, $id){
        $car = CarModel::findOrFail($id);
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->valuation = $request->valuation;
        $car->description = $request->description;
        $car->save();
        return redirect()->route('car.index')->with('message','Carro alterado com sucesso.');
    }

    public function destroy($id){
        $car = CarModel::findOrFail($id);
        $car->delete();
        return redirect()->route('car.index')->with('message','Carro excluído com sucesso.');
    }

}