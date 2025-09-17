@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Project Details: {{ $project->title }}</h1>
            <div>
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Projects
                </a>
            </div>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Basic Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Basic Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Title:</strong></div>
                            <div class="col-sm-9">{{ $project->title }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Category:</strong></div>
                            <div class="col-sm-9">
                                <span class="badge bg-info">{{ $project->project_category }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>Description:</strong></div>
                            <div class="col-sm-9">{{ $project->description }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3"><strong>URLs:</strong></div>
                            <div class="col-sm-9">
                                @if ($project->live_url)
                                    <a href="{{ $project->live_url }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-external-link-alt"></i> Live Demo
                                    </a>
                                @endif
                                @if ($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank"
                                        class="btn btn-sm btn-outline-dark me-2">
                                        <i class="fab fa-github"></i> GitHub
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if ($project->pdf_file)
                            <div class="row mb-3">
                                <div class="col-sm-3"><strong>Documentation:</strong></div>
                                <div class="col-sm-9">
                                    <a href="{{ asset('storage/' . $project->pdf_file) }}" target="_blank"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-file-pdf"></i> View PDF
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Video & Gallery -->
                @php($video = $project->getFirstMedia('videos'))
                @php($poster = $project->getFirstMedia('video_poster'))
                @if ($video)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Project Video</h6>
                        </div>
                        <div class="card-body">
                            <video controls @if ($poster) poster="{{ $poster->getUrl() }}" @endif
                                style="max-width:100%;border-radius:8px;">
                                <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                            </video>
                            @if ($poster)
                                <div class="small text-muted mt-2">Poster: <a href="{{ $poster->getUrl() }}"
                                        target="_blank">View</a></div>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($project->getFirstMedia('projects') || $project->getMedia('gallery')->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gallery</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if ($project->getFirstMedia('projects'))
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <img src="{{ $project->getFirstMedia('projects')->getUrl() }}"
                                                class="card-img-top" style="height: 200px; object-fit: cover;">
                                            <div class="card-body p-2">
                                                <small class="text-muted fw-bold">Main Image</small>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach ($project->getMedia('gallery') as $media)
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <img src="{{ $media->getUrl() }}" class="card-img-top"
                                                style="height: 200px; object-fit: cover;">
                                            <div class="card-body p-2">
                                                <small class="text-muted">Gallery Image</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Features -->
                @if ($project->features->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Project Features</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($project->features as $feature)
                                    <div class="col-md-6 mb-4">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="{{ $feature->icon }}"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">{{ $feature->title }}</h6>
                                                <p class="text-muted mb-0">{{ $feature->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Technology Stack -->
                @if ($project->techStacks->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Technology Stack</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($project->getTechStacksByCategory() as $category => $technologies)
                                <div class="mb-4">
                                    <h6 class="text-primary mb-3">{{ $category }}</h6>
                                    <div class="row">
                                        @foreach ($technologies as $tech)
                                            <div class="col-md-4 mb-2">
                                                <div class="d-flex align-items-center">
                                                    @if ($tech->icon)
                                                        <i class="{{ $tech->icon }} me-2 text-muted"></i>
                                                    @endif
                                                    <span>{{ $tech->technology }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Status -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Project Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Status:</strong>
                            @if ($project->is_active)
                                <span class="badge bg-success ms-2">Active</span>
                            @else
                                <span class="badge bg-secondary ms-2">Inactive</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <strong>Display Order:</strong>
                            <span class="ms-2">{{ $project->order }}</span>
                        </div>
                        <div class="mb-3">
                            <strong>Created:</strong>
                            <span class="ms-2">{{ $project->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="mb-3">
                            <strong>Updated:</strong>
                            <span class="ms-2">{{ $project->updated_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Pricing Information -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pricing Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Pricing Type:</strong>
                            @if ($project->pricing_type === 'fixed')
                                <span class="badge bg-success ms-2">Fixed Price</span>
                            @elseif($project->pricing_type === 'plans')
                                <span class="badge bg-warning ms-2">Pricing Plans</span>
                            @else
                                <span class="badge bg-secondary ms-2">No Price</span>
                            @endif
                        </div>

                        @if ($project->hasFixedPrice())
                            <div class="mb-3">
                                <strong>Price:</strong>
                                <span class="ms-2">${{ number_format($project->fixed_price, 2) }}</span>
                            </div>
                            @if ($project->discount_amount)
                                <div class="mb-3">
                                    <strong>Discount:</strong>
                                    <span class="ms-2">
                                        @if ($project->discount_type === 'percentage')
                                            {{ $project->discount_amount }}%
                                        @else
                                            ${{ number_format($project->discount_amount, 2) }}
                                        @endif
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <strong>Final Price:</strong>
                                    <span
                                        class="ms-2 text-success fw-bold">${{ number_format($project->getDiscountedPrice(), 2) }}</span>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Pricing Plans -->
                @if ($project->hasPricingPlans() && $project->pricingPlans->count() > 0)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pricing Plans</h6>
                        </div>
                        <div class="card-body">
                            @foreach ($project->pricingPlans as $plan)
                                <div
                                    class="border rounded p-3 mb-3 {{ $plan->is_popular ? 'border-primary bg-light' : '' }}">
                                    @if ($plan->is_popular)
                                        <div class="badge bg-primary mb-2">Popular</div>
                                    @endif
                                    <h6 class="mb-1">{{ $plan->title }}</h6>
                                    @if ($plan->subtitle)
                                        <p class="text-muted small mb-2">{{ $plan->subtitle }}</p>
                                    @endif
                                    <div class="h4 mb-3 text-primary">${{ number_format($plan->price, 2) }}</div>
                                    @if (count($plan->features) > 0)
                                        <ul class="list-unstyled small">
                                            @foreach ($plan->features as $feature)
                                                <li class="mb-1">
                                                    <i class="fas fa-check text-success me-2"></i>{{ $feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Quick Actions -->
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Quick Actions</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Project
                            </a>
                            @if ($project->is_active)
                                <button class="btn btn-secondary" onclick="toggleStatus({{ $project->id }}, false)">
                                    <i class="fas fa-eye-slash"></i> Deactivate
                                </button>
                            @else
                                <button class="btn btn-success" onclick="toggleStatus({{ $project->id }}, true)">
                                    <i class="fas fa-eye"></i> Activate
                                </button>
                            @endif
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-trash"></i> Delete Project
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function toggleStatus(projectId, status) {
            if (confirm(`Are you sure you want to ${status ? 'activate' : 'deactivate'} this project?`)) {
                // Create a form and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/admin/projects/${projectId}`;

                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';

                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'is_active';
                statusInput.value = status ? '1' : '0';

                // Copy all current form data
                const currentData = @json($project->toArray());
                Object.keys(currentData).forEach(key => {
                    if (key !== 'is_active' && key !== 'created_at' && key !== 'updated_at') {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = key;
                        input.value = currentData[key] || '';
                        form.appendChild(input);
                    }
                });

                form.appendChild(csrfInput);
                form.appendChild(methodInput);
                form.appendChild(statusInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
