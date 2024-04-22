<!-- print.blade.php -->

<style>
    .section-header {
        font-size: 20px;
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .report-table {
        border-collapse: collapse;
        width: 100%;
    }

    .report-table th,
    .report-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .report-table th {
        background-color: #f2f2f2;
    }
</style>

<div class="section-header">Settled Reports</div>
<table class="report-table">
    <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Report Title</th>
            <th>Report Description</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <!-- Display settled reports -->
        @foreach($reports->where('status', 'settled') as $report)
        <tr>
            <td>{{ $report->user->name }}</td>
            <td>{{ $report->user->email }}</td>
            <td>{{ $report->report_title }}</td>
            <td>{{ $report->report_description }}</td>
            <td>{{ $report->status }}</td>
            <td>{{ $report->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="section-header">Cancelled Reports</div>
<table class="report-table">
    <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Report Title</th>
            <th>Report Description</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <!-- Display cancelled reports -->
        @foreach($reports->where('status', 'cancelled') as $report)
        <tr>
            <td>{{ $report->user->name }}</td>
            <td>{{ $report->user->email }}</td>
            <td>{{ $report->report_title }}</td>
            <td>{{ $report->report_description }}</td>
            <td>{{ $report->status }}</td>
            <td>{{ $report->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="section-header">Pending Reports</div>
<table class="report-table">
    <thead>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Report Title</th>
            <th>Report Description</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <!-- Display pending reports -->
        @foreach($reports->where('status', 'pending') as $report)
        <tr>
            <td>{{ $report->user->name }}</td>
            <td>{{ $report->user->email }}</td>
            <td>{{ $report->report_title }}</td>
            <td>{{ $report->report_description }}</td>
            <td>{{ $report->status }}</td>
            <td>{{ $report->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>