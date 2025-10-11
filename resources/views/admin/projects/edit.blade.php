@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Project: {{ $project->title }}</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Projects
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
            id="projectForm">
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
                            <div class=" alert-info bg-light    ">
                                <div class="fw-bold mb-1">Media catalog (recommended minimums):</div>
                                <ul class="mb-0 ps-3">
                                    <li>Wide highlight (first gallery image): <strong>740px * 360px</strong>+</li>
                                    <li>Regular gallery images: <strong>360px * 360px</strong>+</li>
                                    <li>Video (landscape): <strong>1280px * 720px</strong>+ &nbsp;|&nbsp; Video (portrait):
                                        <strong>1080px * 1920px</strong>+
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Project Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title', $project->title) }}"
                                            required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                                id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4" required>{{ old('description', $project->description) }}</textarea>
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
                                            id="github_url" name="github_url"
                                            value="{{ old('github_url', $project->github_url) }}"
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
                                        <label for="order" class="form-label">Display Order <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('order') is-invalid @enderror"
                                            id="order" name="order" value="{{ old('order', $project->order) }}"
                                            min="0" required>
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
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
                            @if ($project->getFirstMedia('projects') || $project->getMedia('gallery')->count() > 0)
                                <div class="mb-3">
                                    <label class="form-label">Current Images</label>
                                    <div class="row">
                                        @if ($project->getFirstMedia('projects'))
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img src="{{ $project->getFirstMedia('projects')->getUrl() }}"
                                                        class="card-img-top" style="height: 150px; object-fit: cover;">
                                                    <div class="card-body p-2">
                                                        @php($mi = $project->getFirstMedia('projects'))
                                                        <small class="text-muted">Main Image</small>
                                                        @if ($mi && $mi->hasCustomProperty('generated_conversions'))
                                                        @endif
                                                        <div class="small text-muted mt-1">{{ $mi->file_name }} —
                                                            {{ number_format(($mi->size ?? 0) / 1024, 1) }} KB</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($project->getMedia('gallery') as $media)
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img src="{{ $media->getUrl() }}" class="card-img-top"
                                                        style="height: 150px; object-fit: cover;">
                                                    <div class="card-body p-2">
                                                        <small class="text-muted">Gallery Image</small>
                                                        <div class="small text-muted mt-1">{{ $media->file_name }} —
                                                            {{ number_format(($media->size ?? 0) / 1024, 1) }} KB</div>
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
                                        <div id="mainImageMeta" class="small text-muted mt-1"></div>
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
                                        <div id="imagesMeta" class="small text-muted mt-1"></div>
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
                                    @php($brochure = $project->getFirstMedia('brochure'))
                                    @if ($brochure)
                                        <div class="mb-3">
                                            <label class="form-label">Current PDF</label>
                                            <div class="border rounded p-3">
                                                <i class="fas fa-file-pdf text-danger me-2"></i>
                                                <a href="{{ $brochure->getUrl() }}" target="_blank"
                                                    class="text-decoration-none">
                                                    View Current PDF
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="video_file" class="form-label">Replace Project Video (optional)</label>
                                <input type="file" class="form-control @error('video_file') is-invalid @enderror"
                                    id="video_file" name="video_file" accept="video/*">
                                @error('video_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Upload a demo video (MP4/WebM, Max 50MB)</div>
                                <div id="videoMeta" class="small text-muted mt-1"></div>
                            </div>

                            <div class="mb-3">
                                <label for="video_poster" class="form-label">Replace Video Poster Image (optional)</label>
                                <input type="file" class="form-control @error('video_poster') is-invalid @enderror"
                                    id="video_poster" name="video_poster" accept="image/*">
                                @error('video_poster')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @php($poster = $project->getFirstMedia('video_poster'))
                                @if ($poster)
                                    <div class="form-text">Current poster: <a href="{{ $poster->getUrl() }}"
                                            target="_blank">View</a></div>
                                @endif
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
                                @foreach ($project->features as $index => $feature)
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
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fa-fw"
                                                                data-role="icon-preview"></i></span>
                                                        <input type="text" class="form-control feature-icon-input"
                                                            name="features[{{ $index }}][icon]"
                                                            value="{{ $feature->icon }}"
                                                            placeholder="e.g., fa fa-address-book">
                                                        <button type="button"
                                                            class="btn btn-outline-secondary icon-picker-trigger">Browse</button>
                                                    </div>
                                                    <div class="form-text">Font Awesome class, e.g., <code>fa
                                                            fa-address-book</code> or <code>fas fa-star</code>. Click Browse
                                                        to pick.</div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control"
                                                        name="features[{{ $index }}][title]"
                                                        value="{{ $feature->title }}" placeholder="Feature title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" name="features[{{ $index }}][description]" rows="3"
                                                placeholder="Feature description">{{ $feature->description }}</textarea>
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
                                @foreach ($project->techStacks as $index => $techStack)
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
                                                    <input type="text" class="form-control"
                                                        name="tech_stacks[{{ $index }}][parent_category]"
                                                        value="{{ $techStack->parent_category }}"
                                                        placeholder="e.g., Frontend, Backend">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Technology</label>
                                                    <input type="text" class="form-control"
                                                        name="tech_stacks[{{ $index }}][technology]"
                                                        value="{{ $techStack->technology }}"
                                                        placeholder="e.g., React.js, Laravel">
                                                </div>
                                            </div>
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
                                <input type="hidden" name="is_active" value="0">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                    value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
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
                                <label for="pricing_type" class="form-label">Pricing Type <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('pricing_type') is-invalid @enderror" id="pricing_type"
                                    name="pricing_type" required>
                                    <option value="none"
                                        {{ old('pricing_type', $project->pricing_type) === 'none' ? 'selected' : '' }}>No
                                        Price</option>
                                    <option value="fixed"
                                        {{ old('pricing_type', $project->pricing_type) === 'fixed' ? 'selected' : '' }}>
                                        Fixed Price</option>
                                    <option value="plans"
                                        {{ old('pricing_type', $project->pricing_type) === 'plans' ? 'selected' : '' }}>
                                        Pricing Plans</option>
                                </select>
                                @error('pricing_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Fixed Price Section -->
                            <div id="fixedPriceSection"
                                style="display: {{ $project->pricing_type === 'fixed' ? 'block' : 'none' }};">
                                <div class="mb-3">
                                    <label for="fixed_price" class="form-label">Fixed Price</label>
                                    <input type="number" class="form-control @error('fixed_price') is-invalid @enderror"
                                        id="fixed_price" name="fixed_price"
                                        value="{{ old('fixed_price', $project->fixed_price) }}" step="0.01"
                                        min="0">
                                    @error('fixed_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="discount_amount" class="form-label">Discount</label>
                                            <input type="number"
                                                class="form-control @error('discount_amount') is-invalid @enderror"
                                                id="discount_amount" name="discount_amount"
                                                value="{{ old('discount_amount', $project->discount_amount) }}"
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
                                                <option value="percentage"
                                                    {{ old('discount_type', $project->discount_type) === 'percentage' ? 'selected' : '' }}>
                                                    Percentage</option>
                                                <option value="amount"
                                                    {{ old('discount_type', $project->discount_type) === 'amount' ? 'selected' : '' }}>
                                                    Amount</option>
                                            </select>
                                            @error('discount_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Plans Section -->
                            <div id="pricingPlansSection"
                                style="display: {{ $project->pricing_type === 'plans' ? 'block' : 'none' }};">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label mb-0">Pricing Plans</label>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="addPricingPlan">
                                        <i class="fas fa-plus"></i> Add Plan
                                    </button>
                                </div>
                                <div id="pricingPlansContainer">
                                    @foreach ($project->pricingPlans as $index => $plan)
                                        <div class="pricing-plan-item border rounded p-3 mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="mb-0">Plan {{ $index + 1 }}</h6>
                                                <button type="button" class="btn btn-sm btn-danger remove-pricing-plan">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Plan Title</label>
                                                <input type="text" class="form-control"
                                                    name="pricing_plans[{{ $index }}][title]"
                                                    value="{{ $plan->title }}" placeholder="e.g., Basic, Premium">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Subtitle</label>
                                                <input type="text" class="form-control"
                                                    name="pricing_plans[{{ $index }}][subtitle]"
                                                    value="{{ $plan->subtitle }}" placeholder="Short description">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pricing Type</label>
                                                <select class="form-select pricing-type-select"
                                                    name="pricing_plans[{{ $index }}][pricing_type]">
                                                    <option value="fixed"
                                                        {{ $plan->pricing_type === 'fixed' ? 'selected' : '' }}>Fixed Price
                                                    </option>
                                                    <option value="per_user"
                                                        {{ $plan->pricing_type === 'per_user' ? 'selected' : '' }}>Per User
                                                        Price</option>
                                                    <option value="both"
                                                        {{ $plan->pricing_type === 'both' ? 'selected' : '' }}>Both Fixed
                                                        and Per User</option>
                                                </select>
                                            </div>
                                            <div class="row pricing-fields">
                                                <div class="col-md-6 fixed-price-field"
                                                    style="display: {{ in_array($plan->pricing_type, ['fixed', 'both']) ? 'block' : 'none' }};">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fixed Price</label>
                                                        <input type="number" class="form-control"
                                                            name="pricing_plans[{{ $index }}][price]"
                                                            value="{{ $plan->price }}" step="0.01" min="0"
                                                            placeholder="0.00">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 per-user-price-field"
                                                    style="display: {{ in_array($plan->pricing_type, ['per_user', 'both']) ? 'block' : 'none' }};">
                                                    <div class="mb-3">
                                                        <label class="form-label">Per User Price (text)</label>
                                                        <input type="text" class="form-control"
                                                            name="pricing_plans[{{ $index }}][per_user_price]"
                                                            value="{{ $plan->per_user_price }}" placeholder="e.g., $5/user or Contact us">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Currency Icon</label>
                                                <input type="file" class="form-control currency-icon-input"
                                                    name="pricing_plans[{{ $index }}][currency_icon]"
                                                    accept="image/*">
                                                @if ($plan->getCurrencyIcon())
                                                    <div class="mt-2">
                                                        <img src="{{ $plan->getCurrencyIcon() }}"
                                                            alt="Current currency icon"
                                                            style="width: 32px; height: 32px;">
                                                        <small class="text-muted">Leave empty to keep current icon</small>
                                                    </div>
                                                @else
                                                    <div class="form-text">Upload a custom currency icon (PNG, JPG, SVG).
                                                        Leave empty to use default.</div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pricing_plans[{{ $index }}][is_popular]"
                                                                value="1" {{ $plan->is_popular ? 'checked' : '' }}>
                                                            <label class="form-check-label">Mark as Popular</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Features (one per line)</label>
                                                <textarea class="form-control plan-features" rows="4" data-index="{{ $index }}">{{ implode("\n", $plan->features) }}</textarea>
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

@push('scripts')
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
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-fw" data-role="icon-preview"></i></span>
                                <input type="text" class="form-control feature-icon-input" name="features[${featureIndex}][icon]" placeholder="e.g., fas fa-star">
                                <button type="button" class="btn btn-outline-secondary icon-picker-trigger">Browse</button>
                            </div>
                            <div class="form-text">Font Awesome class, e.g., <code>fas fa-star</code>. Click Browse to pick.</div>
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
                wireUpFeatureRow(container.lastElementChild);
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
                <div class="mb-3">
                    <label class="form-label">Pricing Type</label>
                    <select class="form-select pricing-type-select" name="pricing_plans[${pricingPlanIndex}][pricing_type]">
                        <option value="fixed">Fixed Price</option>
                        <option value="per_user">Per User Price</option>
                        <option value="both">Both Fixed and Per User</option>
                    </select>
                </div>
                <div class="row pricing-fields">
                    <div class="col-md-6 fixed-price-field">
                        <div class="mb-3">
                            <label class="form-label">Fixed Price</label>
                            <input type="number" class="form-control" name="pricing_plans[${pricingPlanIndex}][price]"
                                   step="0.01" min="0" placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-6 per-user-price-field" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">Per User Price (text)</label>
                            <input type="text" class="form-control" name="pricing_plans[${pricingPlanIndex}][per_user_price]"
                                   placeholder="e.g., $5/user or Contact us">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Currency Icon</label>
                    <input type="file" class="form-control currency-icon-input"
                           name="pricing_plans[${pricingPlanIndex}][currency_icon]"
                           accept="image/*">
                    <div class="form-text">Upload a custom currency icon (PNG, JPG, SVG). Leave empty to use default.</div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                       name="pricing_plans[${pricingPlanIndex}][is_popular]" value="1">
                                <label class="form-check-label">Mark as Popular</label>
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
                wireUpPricingPlanRow(container.lastElementChild);
            });

            // Wire up existing pricing plans
            document.querySelectorAll('.pricing-plan-item').forEach(function(planElement) {
                wireUpPricingPlanRow(planElement);
            });

            // Wire up pricing plan row functionality
            function wireUpPricingPlanRow(planElement) {
                const pricingTypeSelect = planElement.querySelector('.pricing-type-select');
                const fixedPriceField = planElement.querySelector('.fixed-price-field');
                const perUserPriceField = planElement.querySelector('.per-user-price-field');

                if (pricingTypeSelect && fixedPriceField && perUserPriceField) {
                    pricingTypeSelect.addEventListener('change', function() {
                        const pricingType = this.value;

                        if (pricingType === 'fixed') {
                            fixedPriceField.style.display = 'block';
                            perUserPriceField.style.display = 'none';
                        } else if (pricingType === 'per_user') {
                            fixedPriceField.style.display = 'none';
                            perUserPriceField.style.display = 'block';
                        } else if (pricingType === 'both') {
                            fixedPriceField.style.display = 'block';
                            perUserPriceField.style.display = 'block';
                        }
                    });
                }
            }

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
                    const existingInputs = document.querySelectorAll(
                        `input[name^="pricing_plans[${index}][features]"]`);
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
            // Utilities
            function formatBytes(bytes) {
                if (!bytes && bytes !== 0) return '';
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                if (bytes === 0) return '0 Bytes';
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                return parseFloat((bytes / Math.pow(1024, i)).toFixed(2)) + ' ' + sizes[i];
            }

            async function readImageMeta(file) {
                return new Promise((resolve) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = new Image();
                        img.onload = function() {
                            resolve({
                                width: img.naturalWidth,
                                height: img.naturalHeight
                            });
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                });
            }

            // Media metadata previews (sequential)
            const mainImageInput = document.getElementById('image');
            const additionalImagesInput = document.getElementById('images');
            const videoInput = document.getElementById('video_file');

            mainImageInput.addEventListener('change', async function() {
                const metaDiv = document.getElementById('mainImageMeta');
                metaDiv.textContent = '';
                const file = this.files && this.files[0];
                if (!file) return;
                const meta = await readImageMeta(file);
                const rec = {
                    w: 800,
                    h: 600
                };
                const warn = (meta.width < rec.w || meta.height < rec.h) ?
                    ` (below recommended ${rec.w}px * ${rec.h}px)` :
                    '';
                metaDiv.textContent =
                    `${file.name} — ${meta.width}px * ${meta.height}px — ${formatBytes(file.size)}${warn}`;
            });

            additionalImagesInput.addEventListener('change', async function() {
                const metaDiv = document.getElementById('imagesMeta');
                metaDiv.innerHTML = '';
                const files = Array.from(this.files || []);
                if (!files.length) return;
                let processed = 0;
                const list = document.createElement('div');
                list.className = 'mt-1';
                metaDiv.appendChild(list);
                for (const file of files) {
                    processed++;
                    const progress = document.createElement('div');
                    progress.className = 'small text-muted';
                    progress.textContent = `Processing ${processed}/${files.length}…`;
                    metaDiv.appendChild(progress);
                    const meta = await readImageMeta(file);
                    const item = document.createElement('div');
                    item.className = 'small';
                    const isFirst = processed === 1;
                    const rec = isFirst ? {
                        w: 740,
                        h: 360
                    } : {
                        w: 360,
                        h: 360
                    };
                    const warn = (meta.width < rec.w || meta.height < rec.h) ?
                        ` (below recommended ${rec.w}px * ${rec.h}px${isFirst ? ' for wide slot' : ''})` :
                        '';
                    item.textContent =
                        `${file.name} — ${meta.width}px * ${meta.height}px — ${formatBytes(file.size)}${warn}`;
                    list.appendChild(item);
                    progress.remove();
                }
            });

            videoInput.addEventListener('change', function() {
                const metaDiv = document.getElementById('videoMeta');
                metaDiv.textContent = '';
                const file = this.files && this.files[0];
                if (!file) return;
                const url = URL.createObjectURL(file);
                const video = document.createElement('video');
                video.preload = 'metadata';
                video.onloadedmetadata = function() {
                    const w = video.videoWidth;
                    const h = video.videoHeight;
                    const isLandscape = w >= h;
                    const rec = isLandscape ? {
                        w: 1280,
                        h: 720
                    } : {
                        w: 1080,
                        h: 1920
                    };
                    const warn = (w < rec.w || h < rec.h) ?
                        ` (below recommended ${rec.w}px * ${rec.h}px for ${isLandscape ? 'landscape' : 'portrait'})` :
                        '';
                    metaDiv.textContent =
                        `${file.name} — ${w}px * ${h}px — ${formatBytes(file.size)}${warn}`;
                    URL.revokeObjectURL(url);
                };
                video.src = url;
            });

            // Icon picker and preview for features
            const ICONS = [
                'fa fa-address-book', 'fa fa-star', 'fa fa-cog', 'fa fa-bolt', 'fa fa-heart', 'fa fa-lock',
                'fa fa-shield', 'fa fa-line-chart', 'fa fa-mobile', 'fa fa-cloud', 'fa fa-rocket',
                'fa fa-users', 'fa fa-magic', 'fa fa-thumbs-up', 'fa fa-lightbulb-o', 'fa fa-headphones',
                'fa fa-search', 'fa fa-code',
                'fas fa-star', 'fas fa-check', 'fas fa-cog', 'fas fa-bolt', 'fas fa-heart', 'fas fa-lock',
                'fas fa-shield-alt', 'fas fa-chart-line', 'fas fa-mobile-alt', 'fas fa-cloud', 'fas fa-rocket',
                'fas fa-users', 'fas fa-magic', 'fas fa-thumbs-up', 'fas fa-lightbulb', 'fas fa-headset',
                'fas fa-search', 'fas fa-code',
                'fab fa-laravel', 'fab fa-react', 'fab fa-vuejs', 'fab fa-php', 'fas fa-database'
            ];

            function openIconPicker(targetInput) {
                const overlay = document.createElement('div');
                overlay.style.cssText =
                    'position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:1055;display:flex;align-items:center;justify-content:center;';
                const panel = document.createElement('div');
                panel.className = 'bg-white p-3 rounded shadow';
                panel.style.cssText = 'width:720px;max-width:95vw;max-height:80vh;overflow:auto;';
                panel.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <strong>Select Icon</strong>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-close>&times;</button>
                    </div>
                    <input type="text" class="form-control mb-2" placeholder="Search icons" data-search>
                    <div class="row row-cols-6 g-2" data-grid></div>
                    <div class="mt-2 small text-muted">Looking for more? Visit <a href="https://fontawesome.com/search?m=free&s=solid,regular,brands" target="_blank" rel="noopener">Font Awesome search</a>.</div>
                `;
                overlay.appendChild(panel);
                document.body.appendChild(overlay);
                const grid = panel.querySelector('[data-grid]');

                function render(list) {
                    grid.innerHTML = '';
                    list.forEach(cls => {
                        const col = document.createElement('div');
                        col.innerHTML =
                            `<button type="button" class="btn btn-light w-100" data-choose="${cls}"><i class="${cls}"></i></button>`;
                        grid.appendChild(col);
                    });
                }
                render(ICONS);
                panel.querySelector('[data-search]').addEventListener('input', function() {
                    const q = this.value.trim().toLowerCase();
                    render(ICONS.filter(c => c.toLowerCase().includes(q)));
                });
                panel.addEventListener('click', function(e) {
                    if (e.target.matches('[data-close]')) {
                        document.body.removeChild(overlay);
                    }
                    const btn = e.target.closest('[data-choose]');
                    if (btn) {
                        const cls = btn.getAttribute('data-choose');
                        targetInput.value = cls;
                        const preview = targetInput.parentElement.querySelector(
                            '[data-role=\"icon-preview\"]');
                        if (preview) {
                            preview.className = 'fa-fw ' + cls;
                        }
                        document.body.removeChild(overlay);
                    }
                });
                overlay.addEventListener('click', function(e) {
                    if (e.target === overlay) document.body.removeChild(overlay);
                });
            }

            function wireUpFeatureRow(row) {
                const input = row.querySelector('.feature-icon-input');
                const preview = row.querySelector('[data-role="icon-preview"]');
                const trigger = row.querySelector('.icon-picker-trigger');
                if (input && preview) {
                    input.addEventListener('input', function() {
                        preview.className = 'fa-fw ' + (this.value || '');
                    });
                    // set existing value preview
                    if (input.value) preview.className = 'fa-fw ' + input.value;
                }
                if (trigger && input) {
                    trigger.addEventListener('click', function() {
                        openIconPicker(input);
                    });
                }
            }

            // Wire existing feature rows
            document.querySelectorAll('#featuresContainer .feature-item').forEach(wireUpFeatureRow);
        });
    </script>
@endpush
