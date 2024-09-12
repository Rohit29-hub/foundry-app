@extends('layout2')

@section('main')

<div class="container">

<div class="container my-4">
    <!-- Jobs Table -->
    <div>
        <h1 class="h4 mb-3">Client Jobs for Station: {{ $station->title }}</h1>
        <table class="table table-bordered table-hover bg-white">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($station->jobs->sortByDesc('created_at') as $job)
                <tr data-job-id="{{ $job->id }}" data-job-progress="{{ $job->progress }}" class="job-row cursor-pointer">
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <!-- Client Color Badge -->
                            <span class="rounded-circle" style="width: 10px; height: 10px; background-color: #{{ $job->client->color_code }};"></span>
                            <!-- Job Title with Link -->
                            <a class="text-decoration-none text-dark" href="{{ url('manager/jobedit/' . strtolower($job->title)) }}">
                                {{ $job->title }}
                            </a>
                        </div>
                    </td>
                    <td>{{ $job->due_date ? $job->due_date->diffForHumans() : 'No due date' }}</td>
                </tr>

                <!-- Hidden Form for Job Actions -->
                <tr id="form-row-{{ $job->id }}" class="d-none">
                    <td colspan="2">
                        <div id="form-container-{{ $job->id }}" class="p-3 bg-light border rounded">
                            <!-- Forms will be dynamically injected here -->
                        </div>
                    </td>
                </tr>

                <!-- Hidden Comments Row -->
                <tr id="comments-row-{{ $job->id }}" class="d-none">
                    <td colspan="2">
                        <div id="comments-container-{{ $job->id }}" class="p-3 bg-light border rounded">
                            <!-- Comments will be dynamically injected here -->
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
