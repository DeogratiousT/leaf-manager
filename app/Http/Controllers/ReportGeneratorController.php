<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;
use App\Models\Farmerinput;
use App\Models\Cropyear;
use App\Models\Unit;
use App\Models\Bale;
use PdfReport;
use ExcelReport;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportGeneratorController extends Controller
{
    public function allfarmerspdf()
    {
        $title = 'All Registered Farmers Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = DB::table('farmers')
        ->join('counties', 'counties.id', '=', 'farmers.county_id')
        ->select('farmers.*','counties.county_name')
        ->orderBy('first_name');

        $columns = [
            'Serial' => 'serial',
            'First Name' => 'first_name',
            'Middle Name' => 'middle_name',
            'Last Name' => 'last_name',
            'Gender' => 'gender',
            'ID Number' => 'id_number',
            'Acrerage' => 'acrerage',
            'Town' => 'town',
            'County' => 'county_name'
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['First Name', 'Last Name'], [ // Mass edit column
                        'class' => 'left'
                    ])
                    ->download('farmers'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }


    public function allfarmersexcel()
    {
        $title = 'Registered Farmers Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = DB::table('farmers')
        ->join('counties', 'counties.id', '=', 'farmers.county_id')
        ->select('farmers.*','counties.county_name')
        ->orderBy('first_name');

        $columns = [
            'Serial' => 'serial',
            'First Name' => 'first_name',
            'Middle Name' => 'middle_name',
            'Last Name' => 'last_name',
            'Gender' => 'gender',
            'ID Number' => 'id_number',
            'Acrerage' => 'acrerage',
            'Town' => 'town',
            'County' => 'county_name'
        ];

        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['First Name', 'Last Name'], [ // Mass edit column
                        'class' => 'left bold'
                    ])
                    ->download('farmers'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }

    public function cropyearfarmerspdf($id)
    { 
        $cropyear = Cropyear::find($id);

        $title = 'Farmers Recruited in '. $cropyear->slug_name . 'Crop-Year Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = DB::table('farmers')
        ->where('cropyear_id',$id)
        ->join('counties', 'counties.id', '=', 'farmers.county_id')
        ->select('farmers.*','counties.county_name')
        ->orderBy('first_name');

        $columns = [
            'Serial' => 'serial',
            'First Name' => 'first_name',
            'Middle Name' => 'middle_name',
            'Last Name' => 'last_name',
            'Gender' => 'gender',
            'ID Number' => 'id_number',
            'Acrerage' => 'acrerage',
            'Town' => 'town',
            'County' => 'county_name'
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['First Name', 'Last Name'], [ // Mass edit column
                        'class' => 'left'
                    ])
                    ->download('cropyear-farmers'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }


    public function cropyearfarmersexcel($id)
    {
        $cropyear = Cropyear::find($id);

        $title = 'Farmers Recruited in '. $cropyear->slug_name . 'Crop-Year Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = DB::table('farmers')
        ->where('cropyear_id',$id)        
        ->join('counties', 'counties.id', '=', 'farmers.county_id')
        ->select('farmers.*','counties.county_name')
        ->orderBy('first_name');

        $columns = [
            'Serial' => 'serial',
            'First Name' => 'first_name',
            'Middle Name' => 'middle_name',
            'Last Name' => 'last_name',
            'Gender' => 'gender',
            'ID Number' => 'id_number',
            'Acrerage' => 'acrerage',
            'Town' => 'town',
            'County' => 'county_name'
        ];

        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['First Name', 'Last Name'], [ // Mass edit column
                        'class' => 'left bold'
                    ])
                    ->download('cropyear-farmers'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }

    public function farminputallocationspdf()
    { 
        $farmerinputs = Farmerinput::all();

        $title = 'Farm Input Allocations Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = Farmerinput::with(['farminputs','farmers']);

        $columns = [
            'Farmer' => function($result) {
                return $result->farmer->first_name. ' '. $result->farmer->middle_name.' '.$result->farmer->last_name;
            },
            'Farm Input' => function($result) { 
                return $result->farminput->first()->name;
            },
            'Amount' => function($result) { 
                return $result->amount. ' '.$result->unit->unit_name;
            },
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['Farmer','Farm Input', 'Amount'], [ // Mass edit column
                        'class' => 'left'
                    ])
                    ->download('farm-input-allocations'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }


    public function farminputallocationsexcel()
    {
        $farmerinputs = Farmerinput::all();

        $title = 'Farm Input Allocations Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = Farmerinput::with(['farminputs','farmers']);

        $columns = [
            'Farmer' => function($result) {
                return $result->farmer->first_name. ' '. $result->farmer->middle_name.' '.$result->farmer->last_name;
            },
            'Farm Input' => function($result) { 
                return $result->farminput->first()->name;
            },
            'Amount' => function($result) { 
                return $result->amount. ' '.$result->unit->unit_name;
            },
        ];

        return ExcelReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['Farmer', 'Farm Input', 'Amount'], [ // Mass edit column
                        'class' => 'left bold'
                    ])
                    ->download('farm-input-allocations'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }

    public function farmeractivitypdf(Farmer $farmer)
    { 
        $title = $farmer->fullname().' Bales Report in the '.$farmer->cropyear->slug_name.' Crop Year';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = Bale::where('farmer_id',$farmer->id);

        $columns = [
            'Farmer' => function($result) {
                return $result->farmer->first_name. ' '. $result->farmer->middle_name.' '.$result->farmer->last_name;
            },
            'Bale Number' => function($result) { 
                return $result->number;
            },
            'Weight' => function($result) { 
                return $result->weight_at_reception;
            },
            'Market' => function($result) { 
                return (isset($result->balereception->station->name) ?  $result->balereception->station->name : null);
            },
            'Receiving Store' => function($result) { 
                return (isset($result->balereception->store->name) ?  $result->balereception->store->name : null);
            },
            'Date' => function($result) { 
                return $result->created_at;
            },
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['Farmer','Bale Number', 'Weight', 'Market', 'Receiving Store', 'Date'], [ // Mass edit column
                        'class' => 'left'
                    ])
                    ->download($farmer->fullname(). ' farmer-activity'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }

    public function allbalespdf()
    {
        $title = 'All Bales Report';

        $meta = [
            'Generated' => Carbon::now()
        ];

        $queryBuilder  = Bale::orderBy('number','DESC');

        $columns = [
            'Number' => 'number',
            'Grade' => function($result) { 
                return (isset($result->grade->grade_name) ?  $result->grade->grade_name : null);
            },
            'Market' => function($result) { 
                return (isset($result->balereception->station->name) ?  $result->balereception->station->name : null);
            },
            'Store' => function($result) { 
                return (isset($result->balereception->store->name) ?  $result->balereception->store->name : null);
            },
            'Reception Weight' => 'weight_at_reception',
            'TDRF' => 'tdrf_number',
            'Lorry' => function($result) { 
                return (isset($result->lorry->plate_number) ?  $result->lorry->plate_number : null);
            },
            'Loading Weight' => 'weight_at_loading',
            'Off Loading Weight' => 'weight_at_off_loading',
            'Status' => 'state',            
            'Date' => function($result) { 
                return $result->created_at;
            },
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->editColumns(['Number', 'Grade'], [ // Mass edit column
                        'class' => 'left'
                    ])
                    ->download('bales'); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    }
}
