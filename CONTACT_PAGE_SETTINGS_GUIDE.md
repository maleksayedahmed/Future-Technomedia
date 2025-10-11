# Contact Page Settings - Admin Guide

## Overview
The contact page is now fully manageable from the admin dashboard through the Settings section. All text content, contact information, and map location can be customized without touching code.

## Settings Added

### 1. Hero Section Settings
These control the top banner section of the contact page:

| Setting Key | Description | Type | Default Value |
|------------|-------------|------|---------------|
| `contact_hero_title` | Main title (appears before "Contact") | Text | "My" |
| `contact_hero_description` | Description text below the title | Textarea | "If you are going to use a passage..." |
| `contact_hero_subtitle` | Subtitle in the decorative box | Text | "Contacts" |

**Example Output:** "My **Contact** Page"

---

### 2. Contact Details Section
These control the contact information display:

| Setting Key | Description | Type | Default Value |
|------------|-------------|------|---------------|
| `contact_details_title` | Section title | Text | "Contact Details" |
| `contact_details_subtitle` | Subtitle below the title | Textarea | "Lorem Ipsum generators..." |
| `contact_phone` | Phone number (already exists) | Text | "+489756412322" |
| `contact_email` | Email address (already exists) | Text | "yourmail@domain.com" |
| `contact_address` | Physical address (already exists) | Text | "USA 27TH Brooklyn NY" |

**Note:** Phone, Email, and Address settings already existed in the database under the 'contact' group.

---

### 3. Map Section
These control the embedded Google Map:

| Setting Key | Description | Type | Default Value |
|------------|-------------|------|---------------|
| `contact_map_latitude` | Map latitude coordinate | Text | "24.7136" (Riyadh) |
| `contact_map_longitude` | Map longitude coordinate | Text | "46.6753" (Riyadh) |
| `contact_map_embed_url` | Full Google Maps embed URL | URL | (Riyadh embed URL) |

**How to get a new Map Embed URL:**
1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your location
3. Click "Share" button
4. Select "Embed a map" tab
5. Copy the entire URL from the iframe src attribute
6. Paste it into `contact_map_embed_url` setting

---

### 4. Contact Form Section

| Setting Key | Description | Type | Default Value |
|------------|-------------|------|---------------|
| `contact_form_title` | Form section title | Text | "Get In Touch" |
| `contact_form_subtitle` | Subtitle below the title | Textarea | "Lorem Ipsum generators..." |

---

### 5. Social Networks Section

| Setting Key | Description | Type | Default Value |
|------------|-------------|------|---------------|
| `contact_social_title` | Social section heading | Text | "Find me on social networks :" |
| `social_facebook` | Facebook profile URL | URL | "#" |
| `social_instagram` | Instagram profile URL | URL | "#" |
| `social_twitter` | Twitter profile URL | URL | "#" |
| `social_vk` | VK profile URL | URL | "#" |

**Note:** Social media links are from the 'social' group settings. Only links with valid URLs (not '#') will be displayed. The page shows 4 social networks: Facebook, Instagram, Twitter, and VK.

---

## How to Update Settings in Admin Dashboard

### Method 1: Through Settings Page (Recommended)
1. Login to admin dashboard
2. Navigate to **Settings** section
3. Find the **Contact** group/tab
4. Update any field you want to change
5. Click "Save" or "Update"

### Method 2: Using Laravel Tinker (For Developers)
```php
php artisan tinker

// Update a single setting
Setting::set('contact_hero_title', 'Get In');
Setting::set('contact_phone', '+966 50 123 4567');
Setting::set('contact_address', 'Riyadh, Saudi Arabia');

// Update map location
Setting::set('contact_map_latitude', '24.7136');
Setting::set('contact_map_longitude', '46.6753');
```

---

## Database Structure

All settings are stored in the `settings` table with the following structure:
- `key`: Unique identifier (e.g., 'contact_hero_title')
- `value`: The actual content
- `type`: Field type (text, textarea, url, image, boolean)
- `group`: Setting group ('contact', 'general', etc.)
- `label`: Human-readable label for admin panel
- `description`: Help text explaining the setting
- `order`: Display order in admin panel

---

## Code Changes Made

### 1. Migration File
**File:** `database/migrations/2025_09_22_000000_add_contact_page_settings.php`
- Added all contact page settings with default values
- Organized settings by section with proper ordering

### 2. Route Update
**File:** `routes/web.php`
```php
Route::get('/contact', function () {
    $contactSettings = \App\Models\Setting::getByGroup('contact');
    return view('user.contact', compact('contactSettings'));
})->name('contact');
```

### 3. Blade Template Update
**File:** `resources/views/user/contact.blade.php`
- Replaced all hardcoded text with dynamic settings
- Added fallback values for each setting
- Made phone/email clickable with proper links

---

## Important Notes

### Already Existing Settings
The following settings already existed in your database:
- `contact_phone`
- `contact_email`
- `contact_address`
- `contact_whatsapp`

These are now integrated with the contact page display.

### Backward Compatibility
All settings have fallback values, so if a setting is missing or empty, the page will still display properly with default content.

### Google Maps Embed
- The current map shows **Riyadh, Saudi Arabia**
- No API key required for embedded maps
- To change location: Update the `contact_map_embed_url` setting

---

## Testing Checklist

✅ **Verify Settings Work:**
1. Go to admin settings page
2. Update `contact_hero_title` to "Contact Us"
3. Visit contact page
4. Verify title changed to "Contact Us"

✅ **Test Contact Information:**
1. Update phone number in settings
2. Visit contact page
3. Click phone number - should dial correctly

✅ **Test Map Location:**
1. Get new Google Maps embed URL
2. Update `contact_map_embed_url` setting
3. Refresh contact page
4. Verify map shows new location

---

## Future Enhancements (Optional)

Consider adding these settings later:
- Background image for hero section
- Social media links (Facebook, Instagram, Twitter, VK)
- Contact form success/error messages
- Business hours display
- Multiple office locations

---

## Support

If you need to add more settings or modify existing ones:
1. Check the `Setting` model in `app/Models/Setting.php`
2. Use the `Setting::set()` method to add new settings
3. Update the blade template to use the new setting
4. Add proper fallback values

**Example:**
```php
// In controller or route
Setting::set('contact_page_enabled', true, 'boolean', 'contact', 'Enable Contact Page');

// In blade template
@if($contactSettings['contact_page_enabled'] ?? true)
    <!-- Contact page content -->
@endif
```
