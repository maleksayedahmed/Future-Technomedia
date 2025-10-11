# Social Media Links - Quick Setup Guide

## Contact Page Social Media Integration

The contact page now displays social media links from the admin settings. Only 4 networks are shown: **Facebook, Instagram, Twitter, and VK**.

---

## Current Settings

The following settings control the social media links on the contact page:

| Setting Key | Network | Icon | Group |
|------------|---------|------|-------|
| `social_facebook` | Facebook | fab fa-facebook-f | social |
| `social_instagram` | Instagram | fab fa-instagram | social |
| `social_twitter` | Twitter | fab fa-twitter | social |
| `social_vk` | VK | fab fa-vk | social |

---

## How It Works

### Display Logic:
- Links are **only displayed** if they have a valid URL (not empty and not "#")
- If a social link is "#" or empty, it will be **hidden** from the contact page
- Links open in a new tab/window (`target="_blank"`)

### Example:
```php
// If settings are:
social_facebook = "https://facebook.com/yourpage"  // ✅ Will show
social_instagram = "#"                              // ❌ Hidden
social_twitter = ""                                 // ❌ Hidden  
social_vk = "https://vk.com/yourpage"              // ✅ Will show

// Contact page will only show Facebook and VK links
```

---

## How to Update Social Links

### Method 1: Admin Dashboard (Recommended)
1. Login to admin dashboard
2. Go to **Settings** section
3. Find the **Social** group
4. Update the URLs for your social media profiles:
   - Facebook: `https://facebook.com/yourpage`
   - Instagram: `https://instagram.com/yourusername`
   - Twitter: `https://twitter.com/yourusername`
   - VK: `https://vk.com/yourpage`
5. Leave as "#" to hide that social link
6. Click **Save**

### Method 2: Using Tinker (For Developers)
```bash
php artisan tinker

# Update social media links
Setting::set('social_facebook', 'https://facebook.com/futuretechnomedia');
Setting::set('social_instagram', 'https://instagram.com/futuretechnomedia');
Setting::set('social_twitter', 'https://twitter.com/futuretechnomedia');
Setting::set('social_vk', 'https://vk.com/futuretechnomedia');

# Hide a social link (set to #)
Setting::set('social_vk', '#');
```

---

## Testing Your Changes

1. Update social media URLs in admin settings
2. Visit the contact page: `/contact`
3. Scroll to the bottom social section
4. Verify:
   - ✅ Only links with real URLs appear
   - ✅ Links with "#" are hidden
   - ✅ Clicking links opens correct social profile
   - ✅ Links open in new tab

---

## Code Implementation

### Route (routes/web.php)
```php
Route::get('/contact', function () {
    $contactSettings = \App\Models\Setting::getByGroup('contact');
    $socialSettings = \App\Models\Setting::getByGroup('social');
    return view('user.contact', compact('contactSettings', 'socialSettings'));
})->name('contact');
```

### Blade Template (contact.blade.php)
```blade
<div class="col-md-4">
    <ul>
        @if(!empty($socialSettings['social_facebook']) && $socialSettings['social_facebook'] !== '#')
            <li><a href="{{ $socialSettings['social_facebook'] }}" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a></li>
        @endif
        
        @if(!empty($socialSettings['social_instagram']) && $socialSettings['social_instagram'] !== '#')
            <li><a href="{{ $socialSettings['social_instagram'] }}" target="_blank">
                <i class="fab fa-instagram"></i>
            </a></li>
        @endif
        
        @if(!empty($socialSettings['social_twitter']) && $socialSettings['social_twitter'] !== '#')
            <li><a href="{{ $socialSettings['social_twitter'] }}" target="_blank">
                <i class="fab fa-twitter"></i>
            </a></li>
        @endif
        
        @if(!empty($socialSettings['social_vk']) && $socialSettings['social_vk'] !== '#')
            <li><a href="{{ $socialSettings['social_vk'] }}" target="_blank">
                <i class="fab fa-vk"></i>
            </a></li>
        @endif
    </ul>
</div>
```

---

## Common Social Media URL Formats

### Facebook
- Personal Profile: `https://facebook.com/yourname`
- Business Page: `https://facebook.com/yourpagename`

### Instagram
- Profile: `https://instagram.com/yourusername`

### Twitter (X)
- Profile: `https://twitter.com/yourusername`
- Or new format: `https://x.com/yourusername`

### VK (VKontakte)
- Profile: `https://vk.com/yourusername`
- Community: `https://vk.com/yourgroup`

---

## Available Social Networks (Already in Database)

While the contact page shows only 4 networks, these settings are also available:
- `social_pinterest` - Pinterest
- `social_linkedin` - LinkedIn (if added)
- `social_youtube` - YouTube (if added)

You can customize which 4 networks to show by editing the contact blade template.

---

## Tips

### Show/Hide Individual Links
- Set URL to your profile → Link appears
- Set URL to "#" → Link hidden
- Leave empty → Link hidden

### Change Which 4 Networks Display
Edit `resources/views/user/contact.blade.php` and replace the network keys:
```blade
@if(!empty($socialSettings['social_linkedin']) && $socialSettings['social_linkedin'] !== '#')
    <li><a href="{{ $socialSettings['social_linkedin'] }}" target="_blank">
        <i class="fab fa-linkedin"></i>
    </a></li>
@endif
```

---

## Related Settings

| Setting | Purpose | Location |
|---------|---------|----------|
| `contact_social_title` | Section heading text | Contact group |
| `social_*` | Social media URLs | Social group |

---

**Last Updated:** October 11, 2025  
**Status:** ✅ Fully Implemented
