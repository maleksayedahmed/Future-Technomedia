@php
    use App\Models\Setting;
    $phone = Setting::get('contact_phone');
    $whatsapp = Setting::get('contact_whatsapp', $phone);
    // Build WhatsApp API link: remove non-digits and ensure country code
    $waDigits = $whatsapp ? preg_replace('/[^0-9]/', '', $whatsapp) : '';
    $waHref = $waDigits ? ('https://wa.me/' . $waDigits) : null;
    $telHref = $phone ? ('tel:' . preg_replace('/\s+/', '', $phone)) : null;
@endphp

@if($waHref || $telHref)
<style>
    .floating-contact{position:fixed;right:16px;bottom:16px;z-index:1050;display:flex;flex-direction:column;gap:12px}
    .floating-contact a{position:relative;width:56px;height:56px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;text-decoration:none;box-shadow:0 10px 20px rgba(0,0,0,.12);transition:transform .15s ease, box-shadow .15s ease}
    .floating-contact a:hover{transform:translateY(-2px);box-shadow:0 14px 24px rgba(0,0,0,.18)}
    .floating-contact a:focus-visible{outline:3px solid rgba(255,255,255,.9);outline-offset:2px;box-shadow:0 0 0 4px rgba(0,0,0,.12),0 10px 20px rgba(0,0,0,.12)}
    .floating-contact .btn-wa{background:#25D366}
    .floating-contact .btn-call{background:#0ea5e9}
    .floating-contact svg,.floating-contact img{width:26px;height:26px;filter:brightness(0) invert(1) drop-shadow(0 1px 0 rgba(0,0,0,.08))}
    @media (max-width: 480px){.floating-contact a{width:50px;height:50px}.floating-contact svg,.floating-contact img{width:22px;height:22px}}
    @media print{.floating-contact{display:none!important}}
    /* prevent overlap with cookie banners or chat widgets if any */
    .floating-contact{bottom:clamp(12px, 2vh, 24px)}
    .floating-contact{right:clamp(12px, 2vw, 24px)}
    /* flair pulse */
    .floating-contact a::after{content:"";position:absolute;inset:0;border-radius:50%;box-shadow:0 0 0 0 rgba(255,255,255,.35);animation:pulse 2s infinite}
    .floating-contact a:hover::after{animation:none}
    @keyframes pulse{to{box-shadow:0 0 0 16px rgba(255,255,255,0)}}
    @media (prefers-reduced-motion: reduce){.floating-contact a{transition:none}.floating-contact a:hover{transform:none}.floating-contact a::after{animation:none}}
</style>
<div class="floating-contact">
    @if($waHref)
    <a class="btn-wa" href="{{ $waHref }}" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" focusable="false" role="img">
            <title>WhatsApp</title>
            <path fill="currentColor" d="M16 0C7.164 0 0 7.163 0 16c0 2.825.738 5.484 2.018 7.792L0 32l8.433-2.03C10.657 31.245 13.247 32 16 32c8.837 0 16-7.163 16-16S24.837 0 16 0zm0 29.333c-2.51 0-4.868-.695-6.884-1.905l-.494-.296-5.122 1.233 1.27-5.01-.325-.514A13.26 13.26 0 012.667 16C2.667 8.636 8.636 2.667 16 2.667S29.333 8.636 29.333 16 23.364 29.333 16 29.333zm7.305-9.803c-.4-.2-2.37-1.17-2.737-1.303-.368-.133-.635-.2-.902.2-.268.4-1.037 1.303-1.27 1.57-.234.268-.468.301-.868.1-.4-.2-1.688-.622-3.215-1.984-1.188-1.06-1.99-2.368-2.223-2.768-.234-.4-.025-.616.175-.815.18-.179.4-.468.6-.702.2-.234.268-.4.4-.668.134-.268.067-.502-.033-.702-.1-.2-.902-2.175-1.237-2.977-.326-.782-.657-.676-.902-.689-.234-.012-.502-.015-.77-.015s-.702.1-1.07.502c-.367.4-1.402 1.37-1.402 3.343 0 1.972 1.436 3.877 1.636 4.145.2.267 2.82 4.305 6.832 6.038.955.412 1.7.658 2.28.842.958.304 1.83.26 2.52.158.77-.115 2.37-.969 2.703-1.905.334-.935.334-1.738.234-1.905-.1-.167-.368-.268-.768-.468z"/>
        </svg>
    </a>
    @endif
    @if($telHref)
    <a class="btn-call" href="{{ $telHref }}" aria-label="Call us">
        <img src="{{ asset('images/phone-call-svgrepo-com.svg') }}" alt="Call">
    </a>
    @endif
</div>
@endif
