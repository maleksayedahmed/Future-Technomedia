@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Project: {{ $project->title }}</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Projects
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Basic Information -->
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Basic Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Project Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="project_category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('project_category') is-invalid @enderror"
                                           id="project_category" name="project_category" value="{{ old('project_category', $project->project_category) }}"
                                           placeholder="e.g., Web Design, Mobile App" required>
                                    @error('project_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="live_url" class="form-label">Live URL</label>
                                    <input type="url" class="form-control @error('live_url') is-invalid @enderror"
                                           id="live_url" name="live_url" value="{{ old('live_url', $project->live_url) }}"
                                           placeholder="https://example.com">
                                    @error('live_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="github_url" class="form-label">GitHub URL</label>
                                    <input type="url" class="form-control @error('github_url') is-invalid @enderror"
                                           id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}"
                                           placeholder="https://github.com/username/repo">
                                    @error('github_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="video_url" class="form-label">Video URL</label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror"
                                           id="video_url" name="video_url" value="{{ old('video_url', $project->video_url) }}"
                                           placeholder="https://youtube.com/watch?v=...">
                                    @error('video_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Display Order <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                                           id="order" name="order" value="{{ old('order', $project->order) }}" min="0" required>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Gallery</h6>
                    </div>
                    <div class="card-body">
                        <!-- Current Images -->
                        @if($project->getFirstMedia('projects') || $project->getMedia('gallery')->count() > 0)
                            <div class="mb-3">
                                <label class="form-label">Current Images</label>
                                <div class="row">
                                    @if($project->getFirstMedia('projects'))
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ $project->getFirstMedia('projects')->getUrl() }}"
                                                     class="card-img-top" style="height: 150px; object-fit: cover;">
                                                <div class="card-body p-2">
                                                    <small class="text-muted">Main Image</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach($project->getMedia('gallery') as $media)
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img src="{{ $media->getUrl() }}"
                                                     class="card-img-top" style="height: 150px; object-fit: cover;">
                                                <div class="card-body p-2">
                                                    <small class="text-muted">Gallery Image</small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Replace Main Project Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload new main project image (JPEG, PNG, JPG, GIF)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="images" class="form-label">Replace Additional Images</label>
                                    <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                           id="images" name="images[]" accept="image/*" multiple>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload new additional project images</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pdf_file" class="form-label">Project PDF</label>
                                    <input type="file" class="form-control @error('pdf_file') is-invalid @enderror"
                                           id="pdf_file" name="pdf_file" accept=".pdf">
                                    @error('pdf_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload project documentation/brochure (PDF, Max 10MB)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($project->pdf_file)
                                    <div class="mb-3">
                                        <label class="form-label">Current PDF</label>
                                        <div class="border rounded p-3">
                                            <i class="fas fa-file-pdf text-danger me-2"></i>
                                            <a href="{{ Storage::url($project->pdf_file) }}" target="_blank" class="text-decoration-none">
                                                View Current PDF
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Project Features</h6>
                        <button type="button" class="btn btn-sm btn-primary" id="addFeature">
                            <i class="fas fa-plus"></i> Add Feature
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="featuresContainer">
                            @foreach($project->features as $index => $feature)
                                <div class="feature-item border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Feature {{ $index + 1 }}</h6>
                                        <button type="button" class="btn btn-sm btn-danger remove-feature">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Icon</label>
                                                <input type="text" class="form-control" name="features[{{ $index }}][icon]"
                                                       value="{{ $feature->icon }}" placeholder="fas fa-icon-name">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Title</label>
                                                <input type="text" class="form-control" name="features[{{ $index }}][title]"
                                                       value="{{ $feature->title }}" placeholder="Feature title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="features[{{ $index }}][description]"
                                                  rows="3" placeholder="Feature description">{{ $feature->description }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tech Stack Section -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Technology Stack</h6>
                        <button type="button" class="btn btn-sm btn-primary" id="addTechStack">
                            <i class="fas fa-plus"></i> Add Technology
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="techStackContainer">
                            @foreach($project->techStacks as $index => $techStack)
                                <div class="tech-stack-item border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="mb-0">Technology {{ $index + 1 }}</h6>
                                        <button type="button" class="btn btn-sm btn-danger remove-tech-stack">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="text" class="form-control" name="tech_stacks[{{ $index }}][parent_category]"
                                                       value="{{ $techStack->parent_category }}" placeholder="e.g., Frontend, Backend">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Technology</label>
                                                <input type="text" class="form-control" name="tech_stacks[{{ $index }}][technology]"
                                                       value="{{ $techStack->technology }}" placeholder="e.g., React.js, Laravel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Icon (optional)</label>
                                        <input type="text" class="form-control" name="tech_stacks[{{ $index }}][icon]"
                                               value="{{ $techStack->icon }}" placeholder="fas fa-icon-name or image URL">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Status -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                   {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Pricing Section -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pricing</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="pricing_type" class="form-label">Pricing Type <span class="text-danger">*</span></label>
                            <select class="form-select @error('pricing_type') is-invalid @enderror"
                                    id="pricing_type" name="pricing_type" required>
                                <option value="none" {{ old('pricing_type', $project->pricing_type) === 'none' ? 'selected' : '' }}>No Price</option>
                                <option value="fixed" {{ old('pricing_type', $project->pricing_type) === 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                                <option value="plans" {{ old('pricing_type', $project->pricing_type) === 'plans' ? 'selected' : '' }}>Pricing Plans</option>
                            </select>
                            @error('pricing_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fixed Price Section -->
                        <div id="fixedPriceSection" style="display: {{ $project->pricing_type === 'fixed' ? 'block' : 'none' }};">
                            <div class="mb-3">
                                <label for="fixed_price" class="form-label">Fixed Price</label>
                                <input type="number" class="form-control @error('fixed_price') is-invalid @enderror"
                                       id="fixed_price" name="fixed_price" value="{{ old('fixed_price', $project->fixed_price) }}"
                                       step="0.01" min="0">
                                @error('fixed_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount_amount" class="form-label">Discount</label>
                                        <input type="number" class="form-control @error('discount_amount') is-invalid @enderror"
                                               id="discount_amount" name="discount_amount" value="{{ old('discount_amount', $project->discount_amount) }}"
                                               step="0.01" min="0">
                                        @error('discount_amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount_type" class="form-label">Discount Type</label>
                                        <select class="form-select @error('discount_type') is-invalid @enderror"
                                                id="discount_type" name="discount_type">
                                            <option value="">Select Type</option>
                                            <option value="percentage" {{ old('discount_type', $project->discount_type) === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                            <option value="amount" {{ old('discount_type', $project->discount_type) === 'amount' ? 'selected' : '' }}>Amount</option>
                                        </select>
                                        @error('discount_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Plans Section -->
                        <div id="pricingPlansSection" style="display: {{ $project->pricing_type === 'plans' ? 'block' : 'none' }};">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label mb-0">Pricing Plans</label>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="addPricingPlan">
                                    <i class="fas fa-plus"></i> Add Plan
                                </button>
                            </div>
                            <div id="pricingPlansContainer">
                                @foreach($project->pricingPlans as $index => $plan)
                                    <div class="pricing-plan-item border rounded p-3 mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">Plan {{ $index + 1 }}</h6>
                                            <button type="button" class="btn btn-sm btn-danger remove-pricing-plan">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Plan Title</label>
                                            <input type="text" class="form-control" name="pricing_plans[{{ $index }}][title]"
                                                   value="{{ $plan->title }}" placeholder="e.g., Basic, Premium">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" name="pricing_plans[{{ $index }}][subtitle]"
                                                   value="{{ $plan->subtitle }}" placeholder="Short description">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" class="form-control" name="pricing_plans[{{ $index }}][price]"
                                                           value="{{ $plan->price }}" step="0.01" min="0" placeholder="0.00">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <div class="form-check mt-4">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="pricing_plans[{{ $index }}][is_popular]" value="1"
                                                               {{ $plan->is_popular ? 'checked' : '' }}>
                                                        <label class="form-check-label">Popular</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Features (one per line)</label>
                                            <textarea class="form-control plan-features" rows="4"
                                                      data-index="{{ $index }}">{{ implode("\n", $plan->features) }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let featureIndex = {{ $project->features->count() }};
    let techStackIndex = {{ $project->techStacks->count() }};
    let pricingPlanIndex = {{ $project->pricingPlans->count() }};

    // Pricing type change handler
    document.getElementById('pricing_type').addEventListener('change', function() {
        const fixedSection = document.getElementById('fixedPriceSection');
        const plansSection = document.getElementById('pricingPlansSection');

        if (this.value === 'fixed') {
            fixedSection.style.display = 'block';
            plansSection.style.display = 'none';
        } else if (this.value === 'plans') {
            fixedSection.style.display = 'none';
            plansSection.style.display = 'block';
        } else {
            fixedSection.style.display = 'none';
            plansSection.style.display = 'none';
        }
    });

    // Add feature
    document.getElementById('addFeature').addEventListener('click', function() {
        const container = document.getElementById('featuresContainer');
        const featureHtml = `
            <div class="feature-item border rounded p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Feature ${featureIndex + 1}</h6>
                    <button type="button" class="btn btn-sm btn-danger remove-feature">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Icon</label>
                            <input type="text" class="form-control" name="features[${featureIndex}][icon]"
                                   placeholder="fas fa-icon-name">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="features[${featureIndex}][title]"
                                   placeholder="Feature title">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="features[${featureIndex}][description]"
                              rows="3" placeholder="Feature description"></textarea>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', featureHtml);
        featureIndex++;
    });

    // Remove feature
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-item').remove();
        }
    });

    // Add tech stack
    document.getElementById('addTechStack').addEventListener('click', function() {
        const container = document.getElementById('techStackContainer');
        const techStackHtml = `
            <div class="tech-stack-item border rounded p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Technology ${techStackIndex + 1}</h6>
                    <button type="button" class="btn btn-sm btn-danger remove-tech-stack">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="text" class="form-control" name="tech_stacks[${techStackIndex}][parent_category]"
                                   placeholder="e.g., Frontend, Backend">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Technology</label>
                            <input type="text" class="form-control" name="tech_stacks[${techStackIndex}][technology]"
                                   placeholder="e.g., React.js, Laravel">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Icon (optional)</label>
                    <input type="text" class="form-control" name="tech_stacks[${techStackIndex}][icon]"
                           placeholder="fas fa-icon-name or image URL">
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', techStackHtml);
        techStackIndex++;
    });

    // Remove tech stack
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-tech-stack')) {
            e.target.closest('.tech-stack-item').remove();
        }
    });

    // Add pricing plan
    document.getElementById('addPricingPlan').addEventListener('click', function() {
        const container = document.getElementById('pricingPlansContainer');
        const planHtml = `
            <div class="pricing-plan-item border rounded p-3 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0">Plan ${pricingPlanIndex + 1}</h6>
                    <button type="button" class="btn btn-sm btn-danger remove-pricing-plan">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="mb-3">
                    <label class="form-label">Plan Title</label>
                    <input type="text" class="form-control" name="pricing_plans[${pricingPlanIndex}][title]"
                           placeholder="e.g., Basic, Premium">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <input type="text" class="form-control" name="pricing_plans[${pricingPlanIndex}][subtitle]"
                           placeholder="Short description">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="pricing_plans[${pricingPlanIndex}][price]"
                                   step="0.01" min="0" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox"
                                       name="pricing_plans[${pricingPlanIndex}][is_popular]" value="1">
                                <label class="form-check-label">Popular</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Features (one per line)</label>
                    <textarea class="form-control plan-features" rows="4"
                              placeholder="Feature 1&#10;Feature 2&#10;Feature 3"
                              data-index="${pricingPlanIndex}"></textarea>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', planHtml);
        pricingPlanIndex++;
    });

    // Remove pricing plan
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-pricing-plan')) {
            e.target.closest('.pricing-plan-item').remove();
        }
    });

    // Handle form submission to convert features textarea to array
    document.getElementById('projectForm').addEventListener('submit', function(e) {
        document.querySelectorAll('.plan-features').forEach(function(textarea) {
            const index = textarea.dataset.index;
            const features = textarea.value.split('\n').filter(f => f.trim() !== '');

            // Remove existing hidden inputs for this plan
            const existingInputs = document.querySelectorAll(`input[name^="pricing_plans[${index}][features]"]`);
            existingInputs.forEach(input => input.remove());

            // Add new hidden inputs
            features.forEach(function(feature, featureIndex) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `pricing_plans[${index}][features][${featureIndex}]`;
                input.value = feature.trim();
                textarea.parentNode.appendChild(input);
            });
        });
    });
});
</script>
@endsection
