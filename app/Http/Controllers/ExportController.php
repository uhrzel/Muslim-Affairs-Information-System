<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use PDF;
use App\Exports\ReportsExport;
use Spatie\Browsershot\Browsershot;
use TCPDF;

class ExportController extends Controller
{/* 
    public function excel()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    } */

    public function pdf()
    {
        $reports = Report::all();

        // Create new PDF document
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator('uhrzel');
        $pdf->SetAuthor('Muslim Affairs Administrator');
        $pdf->SetTitle('Reports PDF');
        $pdf->SetSubject('Reports PDF');

        // Add a page
        $pdf->AddPage();

        // Render the HTML view to a string
        $html = view('admin.reports.exports.pdf', compact('reports'))->render();

        // Output the HTML content to the PDF
        $pdf->writeHTML($html);

        // Close and output PDF
        $pdfContent = $pdf->Output(
            'reports.pdf',
            'S'
        );

        // Return the PDF as a response
        return response($pdfContent)
            ->header(
                'Content-Type',
                'application/pdf'
            )
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
