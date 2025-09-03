<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Future Techno Media') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        :root{
            --card-bg: #ffffff;
            --accent: #0069d9;
        }
        html,body{height:100%;}
        body {
            background: linear-gradient(135deg,#eef2ff 0%, #f8fafc 50%, #fff 100%);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
        }
        .auth-viewport{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:2rem;
        }
        .auth-card{
            width:100%;
            max-width:480px;
            background:var(--card-bg);
            border-radius:12px;
            box-shadow:0 10px 30px rgba(16,24,40,0.08);
            padding:1.5rem;
            border:1px solid rgba(99,102,241,0.04);
            display:block;
        }
        .auth-header{display:flex;align-items:center;gap:12px;margin-bottom:1rem}
        .auth-logo{width:56px;height:56px;border-radius:8px;overflow:hidden;display:flex;align-items:center;justify-content:center;background:linear-gradient(180deg,#ffffff,#f1f5f9);box-shadow:0 4px 12px rgba(13, 27, 62, 0.06)}
        .auth-title{font-size:1.25rem;font-weight:600;margin:0}
        .auth-sub{color:#6b7280;font-size:0.9rem}
        .social-btn{width:48%;}
        .small-muted{color:#6b7280;font-size:0.85rem}
        .input-group .btn{border-top-left-radius:0;border-bottom-left-radius:0}
    .strength-bar{height:8px;border-radius:8px;background:#e9ecef;overflow:hidden}
    .strength-bar > i{display:block;height:100%;width:0%;background:linear-gradient(90deg,#f97316,#10b981);transition:width .25s ease}
    .strength-weak > i{background:linear-gradient(90deg,#f87171,#fb923c)}
    .strength-medium > i{background:linear-gradient(90deg,#f59e0b,#f97316)}
    .strength-strong > i{background:linear-gradient(90deg,#10b981,#06b6d4)}
    .btn-primary{background:linear-gradient(90deg,var(--accent),#0046b3);border:none}
    .social-btn{border-radius:8px}
    .auth-card .input-group-text{background:#f8fafc;border:1px solid rgba(15,23,42,0.04)}
        .footer-note{font-size:0.85rem;color:#94a3b8;margin-top:1rem;text-align:center}
    </style>
</head>
<body>
    <div class="auth-viewport">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">
                    <a href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width:48px;max-height:48px">
                    </a>
                </div>
                <div>
                    <h1 class="auth-title">{{ config('app.name', 'Laravel') }}</h1>
                    <div class="auth-sub">Nice to see you — please sign in or create an account</div>
                </div>
            </div>

            <div>
                {{ $slot }}
            </div>

            <div class="footer-note">
                © {{ date('Y') }} {{ config('app.name') }} — Built with PHP & Laravel. No Node/Vite required for auth pages.
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility for any input with data-toggle="password"
        document.addEventListener('click', function(e){
            var t = e.target;
            if(t && t.matches('[data-toggle="password"]')){
                var input = document.querySelector(t.getAttribute('data-target'));
                if(!input) return;
                if(input.type === 'password'){
                    input.type = 'text';
                    t.innerHTML = '<i class="bi bi-eye-slash"></i>';
                } else {
                    input.type = 'password';
                    t.innerHTML = '<i class="bi bi-eye"></i>';
                }
            }
        });

        // Simple password strength helper
        function updateStrengthMeter(input, barSelector, textSelector){
            var val = input.value || '';
            var score = 0;
            if(val.length >= 6) score++;
            if(val.length >= 10) score++;
            if(/[A-Z]/.test(val)) score++;
            if(/[0-9]/.test(val)) score++;
            var pct = Math.min(100, (score / 4) * 100);
            var barWrap = document.querySelector(barSelector);
            var bar = barWrap ? barWrap.querySelector('> i') : null;
            if(bar) bar.style.width = pct + '%';

            // strength class and text
            if(barWrap){
                barWrap.classList.remove('strength-weak','strength-medium','strength-strong');
                if(pct < 40) barWrap.classList.add('strength-weak');
                else if(pct < 80) barWrap.classList.add('strength-medium');
                else barWrap.classList.add('strength-strong');
            }
            if(textSelector){
                var txt = document.querySelector(textSelector);
                if(txt){
                    var label = 'Too short';
                    if(pct < 40) label = 'Weak';
                    else if(pct < 80) label = 'Moderate';
                    else label = 'Strong';
                    txt.textContent = label;
                }
            }
        }

        // Disable form submit buttons and show spinner to prevent double submits
        document.addEventListener('DOMContentLoaded', function(){
            document.querySelectorAll('.auth-form').forEach(function(form){
                form.addEventListener('submit', function(e){
                    var btn = form.querySelector('button[type="submit"]');
                    if(btn){
                        btn.disabled = true;
                        var spinner = btn.querySelector('.spinner-border');
                        if(spinner) spinner.classList.remove('d-none');
                    }
                });
            });
        });
    </script>
</body>
</html>
