@extends('layout2')

@section('main')

<div class="container my-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Top Buttons -->
    <div class="d-flex justify-content-start gap-3 mb-4 flex-wrap">
        <button id="edit-progress-btn" class="btn btn-outline-primary text-nowrap">Edit Progress</button>
        <button id="report-issue-btn" class="btn btn-outline-primary text-nowrap">Report Issue</button>
        <button id="mark-resolved-btn" class="btn btn-outline-primary text-nowrap">Mark Resolved</button>
    </div>

    <!-- Job Details and Form -->
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <!-- Job Details Table and Form -->
        <div class="flex-grow-1 pe-md-3 mb-4 pr-2" style="flex: 1;">
            <div>
                <h1 class="h4 mb-3">Job: {{ $job->title }}</h1>
                <table class="table table-bordered table-hover bg-white">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Job Quantity</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <!-- Client Color Badge -->
                                    <span class="rounded-circle" style="width: 10px; height: 10px; background-color: #{{ $job->client->color_code }};"></span>
                                    <!-- Job Title with Link -->
                                    <a class="text-decoration-none text-dark" href="#">
                                        {{ $job->title }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $job->quantity }}</td>
                            <td>{{ $job->due_date ? $job->due_date->diffForHumans() : 'No due date' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Form for Job Actions -->
            <div id="form-container" class="d-none p-3 border rounded">
                <!-- Forms will be dynamically injected here -->
            </div>

            
        </div>

        <!-- Fixed Comments Section -->
        <div id="comments-container" class="p-3 bg-light border rounded" style="flex: 0 0 30%; max-height: 100vh; overflow-y: auto;">
            <!-- Comments are shown by default, latest first -->
            <p class='text-center'>Progress Updates</p>
            <hr/>
            @foreach($job->comments()->latest()->cursor() as $comment)
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <p class="">{{ $comment->content }}</p>
                <p class="small text-muted">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>        
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedButton = null;
    const jobId = @json($job->id); // Pass job ID from Blade to JavaScript
    const jobProgress = @json($job->progress); // Pass job progress from Blade to JavaScript

    selectButton(document.getElementById('edit-progress-btn'));
    selectedButton = 'edit-progress';
    showForm();

    // Handle button clicks
    document.getElementById('edit-progress-btn').addEventListener('click', function() {
        selectButton(this);
        selectedButton = 'edit-progress';
        showForm();
    });

    document.getElementById('report-issue-btn').addEventListener('click', function() {
        selectButton(this);
        selectedButton = 'report-issue';
        showForm();
    });

    document.getElementById('mark-resolved-btn').addEventListener('click', function() {
        selectButton(this);
        selectedButton = 'mark-resolved';
        showForm();
    });

    function showForm() {
        const formContainer = document.getElementById('form-container');
        const commentsContainer = document.getElementById('comments-container');
        formContainer.classList.remove('d-none');
        formContainer.innerHTML = '';

        // Inject the appropriate form based on the selected button
        if (selectedButton === 'edit-progress') {
            formContainer.innerHTML = `
                <form id="update-progress-form" method="POST" action="{{ url('/manager/job/${jobId}/update-progress') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="progress" class="form-label">Progress</label>
                        <div class="d-flex align-items-center gap-3">
                            <input 
                                id="progress-slider" 
                                type="range" 
                                name="progress" 
                                min="0" 
                                max="100" 
                                value="${jobProgress}" 
                                class="form-range"
                                onchange="updateProgressValue()"
                                style="flex: 1;"
                            >
                            <span id="progress-value" class="ms-2 fw-bold">${jobProgress}</span>
                             <span id="suggested-quantity" class="ms-2 text-muted"></span>
                            <button type="submit" class="btn btn-success" id="update-progress-button">Update</button>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes <span class='text-danger'>*</span></label>
                        <textarea name="comment" rows="3" class="form-control" required></textarea>
                    </div>
                </form>
            `;
        } else if (selectedButton === 'report-issue') {
            formContainer.innerHTML = `
                <form method="POST" action="{{ url('/manager/job/${jobId}/report-issue') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="issue" class="form-label">Issue <span class='text-danger'>*</span></label>
                        <textarea name="comment" rows="3" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Report Issue</button>
                </form>
            `;
        } else if (selectedButton === 'mark-resolved') {
            formContainer.innerHTML = `
                <form method="POST" action="{{ url('/manager/job/${jobId}/mark-resolved') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="resolution" class="form-label">Resolution <span class='text-danger'>*</span></label>
                        <textarea name="comment" rows="3" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Mark as Resolved</button>
                </form>
            `;
        }

        // Show comments if no button is selected
        if (selectedButton === null) {
            formContainer.classList.add('d-none');
            commentsContainer.classList.remove('d-none');
        }
    }

    function selectButton(button) {
        document.querySelectorAll('button').forEach(btn => btn.classList.remove('btn-primary', 'text-white'));
        button.classList.add('btn-primary');
        button.classList.add('text-white');
    }

   window.updateProgressValue = function() {
        const progressSlider = document.getElementById('progress-slider');
        const progressValue = document.getElementById('progress-value');
        

        // Prevent slider from moving below the jobProgress value
        if (progressSlider && progressSlider.value < jobProgress) {
            progressSlider.value = jobProgress;
        }

        if (progressSlider && progressValue) {
            progressValue.textContent = progressSlider.value;
        } else {
            console.error('Progress slider or value span not found.');
        }

        // Show confirmation if progress is set to 100%
        const form = document.getElementById('update-progress-form');
        if (form) {
            form.addEventListener('submit', function(event) {
                if (progressSlider.value == 100) {
                    if (!confirm('You have marked the progress as 100%. Do you want to complete the job and move it to the next station?')) {
                        event.preventDefault(); // Prevent form submission if user cancels
                    }
                }
            });
        }
    }
});
</script>

@endsection
