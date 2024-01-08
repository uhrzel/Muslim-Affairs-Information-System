<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->type === 'admin') {
            // Fetch all reports for admin users
            $reports = Report::all();
        } else {
            // Fetch reports only for the authenticated user
            $reports = Report::where('user_id', $user->id)->get();
        }

        return view('admin.reports.index', compact('reports'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reportTitle' => 'required',
            'reportDescription' => 'required',
        ]);

        $report = new Report;
        $report->report_title = $validatedData['reportTitle'];
        $report->report_description = $validatedData['reportDescription'];
        $report->status = 'pending';
        $report->user_id = auth()->user()->id;
        $report->save();

        return redirect()->route('admin.reports')->with('success', 'Report created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('admin.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'status' => 'required|in:settled,cancelled', // Add validation for status
        ]);

        $report->update(['status' => $request->status]);

        return redirect()->route('admin.reports')->with('success', 'Report updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('admin.reports.index')->with('success', 'Report deleted successfully.');
    }
}
