<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use PDF;
use App\Exports\ReportsExport;
use Spatie\Browsershot\Browsershot;


class ExportController extends Controller
{/* 
    public function excel()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    } */


    public function pdf()
    {
        $reports = Report::all();

        $html = view('admin.reports.exports.pdf', compact('reports'))->render();

        $pdf = Browsershot::html($html)
            ->setNodeModulePath('C:\xampp\htdocs\muslim-affairs-information-system\node_modules')
            ->pdf();

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="reports.pdf"');
    }


    public function word()
    {
        $reports = Report::all();

        $html = view('admin.reports.exports.word', compact('reports'))->render();

        // Specify the path to the Node.js binary used by Browsershot
        Browsershot::html($html)
            ->setNodeBinary('C:\Program Files\nodejs') // Replace '/path/to/node' with the actual path
            ->save('reports.docx');

        return response()->download('reports.docx');
    }
}
