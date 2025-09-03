<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_category' => 'required|string|max:255',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'video_url' => 'nullable|url',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
            
            // Pricing validation
            'pricing_type' => 'required|in:fixed,plans,none',
            'fixed_price' => 'nullable|numeric|min:0|required_if:pricing_type,fixed',
            'discount_amount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:percentage,amount|required_with:discount_amount',
            
            // Gallery validation
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB per image
            
            // Features validation
            'features' => 'nullable|array',
            'features.*.icon' => 'required_with:features|string',
            'features.*.title' => 'required_with:features|string|max:255',
            'features.*.description' => 'required_with:features|string',
            
            // Tech stack validation
            'tech_stacks' => 'nullable|array',
            'tech_stacks.*.parent_category' => 'required_with:tech_stacks|string|max:255',
            'tech_stacks.*.technology' => 'required_with:tech_stacks|string|max:255',
            'tech_stacks.*.icon' => 'nullable|string',
            
            // Pricing plans validation
            'pricing_plans' => 'nullable|array|required_if:pricing_type,plans',
            'pricing_plans.*.title' => 'required_with:pricing_plans|string|max:255',
            'pricing_plans.*.subtitle' => 'nullable|string|max:255',
            'pricing_plans.*.price' => 'required_with:pricing_plans|numeric|min:0',
            'pricing_plans.*.features' => 'nullable|array',
            'pricing_plans.*.features.*' => 'string',
            'pricing_plans.*.is_popular' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'pricing_plans.required_if' => 'At least one pricing plan is required when pricing type is set to plans.',
            'fixed_price.required_if' => 'Fixed price is required when pricing type is set to fixed.',
            'features.*.icon.required_with' => 'Icon is required for each feature.',
            'features.*.title.required_with' => 'Title is required for each feature.',
            'features.*.description.required_with' => 'Description is required for each feature.',
            'tech_stacks.*.parent_category.required_with' => 'Parent category is required for each technology.',
            'tech_stacks.*.technology.required_with' => 'Technology name is required for each tech stack item.',
        ];
    }
}
