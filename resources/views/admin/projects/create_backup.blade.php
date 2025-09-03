@extends('admin.layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Project</h1>
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

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="projectForm">
        @csrf
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
                                           id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="project_category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('project_category') is-invalid @enderror"
                                           id="project_category" name="project_category" value="{{ old('project_category') }}"
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
                                      id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="live_url" class="form-label">Live URL</label>
                                    <input type="url" class="form-control @error('live_url') is-invalid @enderror"
                                           id="live_url" name="live_url" value="{{ old('live_url') }}"
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
                                           id="github_url" name="github_url" value="{{ old('github_url') }}"
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
                                           id="video_url" name="video_url" value="{{ old('video_url') }}"
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
                                           id="order" name="order" value="{{ old('order', 0) }}" min="0" required>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Main Project Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload main project image (JPEG, PNG, JPG, GIF)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="images" class="form-label">Additional Images</label>
                                    <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                           id="images" name="images[]" accept="image/*" multiple>
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Upload additional project images</div>
                                </div>
                            </div>
                        </div>

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
                            <!-- Features will be added dynamically -->
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
                            <!-- Tech stacks will be added dynamically -->
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
                                   {{ old('is_active') ? 'checked' : '' }}>
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
                                <option value="none" {{ old('pricing_type') === 'none' ? 'selected' : '' }}>No Price</option>
                                <option value="fixed" {{ old('pricing_type') === 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                                <option value="plans" {{ old('pricing_type') === 'plans' ? 'selected' : '' }}>Pricing Plans</option>
                            </select>
                            @error('pricing_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fixed Price Section -->
                        <div id="fixedPriceSection" style="display: none;">
                            <div class="mb-3">
                                <label for="fixed_price" class="form-label">Fixed Price</label>
                                <input type="number" class="form-control @error('fixed_price') is-invalid @enderror"
                                       id="fixed_price" name="fixed_price" value="{{ old('fixed_price') }}"
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
                                               id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}"
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
                                            <option value="percentage" {{ old('discount_type') === 'percentage' ? 'selected' : '' }}>Percentage</option>
                                            <option value="amount" {{ old('discount_type') === 'amount' ? 'selected' : '' }}>Amount</option>
                                        </select>
                                        @error('discount_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Plans Section -->
                        <div id="pricingPlansSection" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label mb-0">Pricing Plans</label>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="addPricingPlan">
                                    <i class="fas fa-plus"></i> Add Plan
                                </button>
                            </div>
                            <div id="pricingPlansContainer">
                                <!-- Pricing plans will be added dynamically -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let featureIndex = 0;
    let techStackIndex = 0;
    let pricingPlanIndex = 0;

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

    // Initialize with one feature and one tech stack
    document.getElementById('addFeature').click();
    document.getElementById('addTechStack').click();
});
</script>
@endpush
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active (Display on website)
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary me-md-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tips</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Title:</strong> Keep it concise and descriptive
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Category:</strong> Use consistent categories for better organization
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Image:</strong> Use high-resolution images (recommended 800x600px)
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-lightbulb text-warning"></i>
                            <strong>Order:</strong> Lower numbers appear first
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
