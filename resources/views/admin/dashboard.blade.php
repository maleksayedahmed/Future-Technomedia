@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Dashboard</h1>
        </div>
    </div>

    <div class="row g-4">
        <!-- Total Sliders -->
        <div class="col-xl-3 col-md-6">
            <div class="card stats-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $slidersCount }}</h3>
                            <p class="mb-0 opacity-75">Total Sliders</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-images fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Sliders -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeSlidersCount }}</h3>
                            <p class="mb-0 opacity-75">Active Sliders</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Features -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $featuresCount }}</h3>
                            <p class="mb-0 opacity-75">Total Features</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-star fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Features -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeFeaturesCount }}</h3>
                            <p class="mb-0 opacity-75">Active Features</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-star-half-alt fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <!-- Total Projects -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #e83e8c 0%, #fd7e14 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $projectsCount }}</h3>
                            <p class="mb-0 opacity-75">Total Projects</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-folder-open fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Projects -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #20c997 0%, #17a2b8 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeProjectsCount }}</h3>
                            <p class="mb-0 opacity-75">Active Projects</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Sliders -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $slidersCount - $activeSlidersCount }}</h3>
                            <p class="mb-0 opacity-75">Inactive Sliders</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-times-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #17a2b8 0%, #6610f2 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h5 class="mb-2">Quick Actions</h5>
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-light btn-sm me-1 mb-1">
                                <i class="fas fa-plus"></i> Slider
                            </a>
                            <a href="{{ route('admin.features.create') }}" class="btn btn-light btn-sm me-1 mb-1">
                                <i class="fas fa-plus"></i> Feature
                            </a>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-light btn-sm mb-1">
                                <i class="fas fa-plus"></i> Project
                            </a>
                            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-light btn-sm me-1 mb-1">
                                <i class="fas fa-plus"></i> Testimonial
                            </a>
                            <a href="{{ route('admin.clients.create') }}" class="btn btn-light btn-sm me-1 mb-1">
                                <i class="fas fa-plus"></i> Client
                            </a>
                            <a href="{{ route('admin.facts.create') }}" class="btn btn-light btn-sm mb-1">
                                <i class="fas fa-plus"></i> Fact
                            </a>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-bolt fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <!-- Total Testimonials -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $testimonialsCount }}</h3>
                            <p class="mb-0 opacity-75">Total Testimonials</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-comments fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Testimonials -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeTestimonialsCount }}</h3>
                            <p class="mb-0 opacity-75">Active Testimonials</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-comment-check fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Clients -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $clientsCount }}</h3>
                            <p class="mb-0 opacity-75">Total Clients</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-handshake fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Clients -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #17a2b8 0%, #6610f2 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeClientsCount }}</h3>
                            <p class="mb-0 opacity-75">Active Clients</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <!-- Total Fact Sections -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $factSectionsCount }}</h3>
                            <p class="mb-0 opacity-75">Fact Sections</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-layer-group fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Facts -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $factsCount }}</h3>
                            <p class="mb-0 opacity-75">Total Facts</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-chart-line fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Facts -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $activeFactsCount }}</h3>
                            <p class="mb-0 opacity-75">Active Facts</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-check-circle fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Settings -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #6c757d 0%, #495057 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $settingsCount }}</h3>
                            <p class="mb-0 opacity-75">Site Settings</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-cog fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Groups -->
        <div class="col-xl-3 col-md-6">
            <div class="card" style="background: linear-gradient(135deg, #e83e8c 0%, #dc3545 100%); color: white;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h3 class="mb-0">{{ $settingsGroupsCount }}</h3>
                            <p class="mb-0 opacity-75">Settings Groups</p>
                        </div>
                        <div class="ms-3">
                            <i class="fas fa-layer-group fa-2x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions for Settings -->
        <div class="col-xl-6 col-md-12">
            <div class="card h-100">
                <div class="card-header bg-transparent">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>
                        Settings Management
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-primary btn-sm mb-1">
                                <i class="fas fa-list me-1"></i>Manage Settings
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.settings.create') }}" class="btn btn-outline-success btn-sm mb-1">
                                <i class="fas fa-plus me-1"></i>Add Setting
                            </a>
                        </div>
                    </div>
                    <small class="text-muted">Configure site-wide settings including social links, contact info, and
                        general site information.</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-line me-2"></i>
                        System Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Content Management</h6>
                            <div class="list-group list-group-flush">
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    <span><i class="fas fa-images text-primary me-2"></i>Manage Sliders</span>
                                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-outline-primary btn-sm">
                                        View All
                                    </a>
                                </div>
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    <span><i class="fas fa-star text-warning me-2"></i>Manage Features</span>
                                    <a href="{{ route('admin.features.index') }}" class="btn btn-outline-warning btn-sm">
                                        View All
                                    </a>
                                </div>
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    <span><i class="fas fa-layer-group text-primary me-2"></i>Manage Fact Sections</span>
                                    <a href="{{ route('admin.fact-sections.index') }}"
                                        class="btn btn-outline-primary btn-sm">
                                        View All
                                    </a>
                                </div>
                                <div
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    <span><i class="fas fa-chart-line text-info me-2"></i>Manage Facts</span>
                                    <a href="{{ route('admin.facts.index') }}" class="btn btn-outline-info btn-sm">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Recent Activity</h6>
                            <div class="text-muted">
                                <p><i class="fas fa-info-circle me-2"></i>No recent activity to display</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
