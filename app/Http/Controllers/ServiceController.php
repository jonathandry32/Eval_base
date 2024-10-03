<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceExport;
use App\Imports\ServiceImport;

class ServiceController extends Controller
{

    public function liste() {
        $services = Service::paginate(5);
        return view('services.list', ['services' => $services]);
    }
    
    public function listePDF()
    {
        $services = Service::all();
        $pdf = PDF::loadView('services.listPDF', ['services' => $services]);
        return $pdf->stream('listeService.pdf');
    }

    public function nouveau()
    {
        return view('services.insert');
    }
    
    public function modifier($idService)
    {
        $service = Service::find($idService);
        return view('services.update', ['service' => $service]);
    }

    public function update(Request $request)
    {
        $service = Service::find($request->idService);
        $service->update([
            'nom' => $request->nom
        ]);
        return redirect()->route('services.liste');
    }
    public function supprimer(Request $request)
    {
        $service = Service::find($request->idService);
        $service->delete();
        return redirect()->route('services.liste');
    }

    public function ajouter(Request $request)
    {
        Service::create([
            'idService' => $request->idService,
            'nom' => $request->nom
        ]);
        return redirect()->route('services.liste');
    }
    public function csv(Request $request)
    {
        // if($request->hasFile('csv')){
        //     $file = $request->file('csv');
        //     $csvData = file_get_contents($file);
        //     $lines = explode("\n",$csvData);
        //     foreach($lines as $line){
        //         $data = str_getcsv($line);
        //         Service::create([
        //             'nom' => $data[0]
        //         ]);
        //     }
        //     return redirect()->route('services.liste');
        // }
        if($request->hasFile('csv')){
            $file = $request->file('csv');
            $csvData = file_get_contents($file);
            $lines = explode("\n",$csvData);
            $headers = str_getcsv(array_shift($lines));
            foreach($lines as $line){
                $data = str_getcsv($line);
                $rowData = [];
                foreach($headers as $index => $header){
                    $rowData[$header] = $data[$index];
                }
                Service::create($rowData);
            }
            return redirect()->route('services.liste');
        }
        return redirect()->back()->with('error','Erreur de csv');
    }
    public function exportcsv()
    {
        $services = Service::all()->toArray();
        $csvData = "IdService,Nom".PHP_EOL;
        foreach($services as $row){
            $csvData .= $row['idService'].','.$row['nom'].PHP_EOL;
        }
        $filepath = 'csvexport/services.csv';
        Storage::disk('public')->put($filepath,$csvData);
        return redirect()->route('services.liste');
    }
    public function image(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img'),$imageName);
            Service::create([
                'nom'=>$imageName
            ]);
            return redirect()->route('services.liste');
        }
        return redirect()->back()->with('error','Erreur de upload');
    }
    public function servicesexport()
    {
        return Excel::download(new ServiceExport, 'service.xlsx');
    }
    public function servicecsvimport(Request $request)
    {
        $request->validate([
            'csv' => 'required|file|mimes:csv,txt',
        ]);
        $data = Excel::import(new ServiceImport, $request->file('csv'));
        return back()->with('success', 'File imported successfully.');
    }

}
