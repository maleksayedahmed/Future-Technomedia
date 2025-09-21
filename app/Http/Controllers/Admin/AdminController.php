<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Setting;
use App\Models\Fact;
use App\Models\FactSection;

class AdminController extends Controller
{
    public function index()
    {
        $slidersCount = Slider::count();
        $activeSlidersCount = Slider::active()->count();
        $featuresCount = Feature::count();
        $activeFeaturesCount = Feature::active()->count();
        $projectsCount = Project::count();
        $activeProjectsCount = Project::active()->count();
        $testimonialsCount = Testimonial::count();
        $activeTestimonialsCount = Testimonial::active()->count();
        $clientsCount = Client::count();
        $activeClientsCount = Client::active()->count();
        $factSectionsCount = FactSection::count();
        $activeFactSectionsCount = FactSection::active()->count();
        $factsCount = Fact::count();
        $activeFactsCount = Fact::active()->count();
        $settingsCount = Setting::count();
        $settingsGroupsCount = Setting::distinct('group')->count();

        return view('admin.dashboard', compact(
            'slidersCount',
            'activeSlidersCount',
            'featuresCount',
            'activeFeaturesCount',
            'projectsCount',
            'activeProjectsCount',
            'testimonialsCount',
            'activeTestimonialsCount',
            'clientsCount',
            'activeClientsCount',
            'factSectionsCount',
            'activeFactSectionsCount',
            'factsCount',
            'activeFactsCount',
            'settingsCount',
            'settingsGroupsCount'
        ));
    }
}
