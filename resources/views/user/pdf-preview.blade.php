<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $fileName }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #ffffff;
            height: 100vh;
            overflow: hidden;
        }

        .pdf-viewer {
            width: 100vw;
            height: 100vh;
        }

        .pdf-viewer embed {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }

        .pdf-fallback {
            display: none;
            height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 20px;
            background: #f8f9fa;
        }

        .pdf-fallback p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }

        .download-fallback-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .download-fallback-btn:hover {
            background: #0056b3;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="pdf-viewer">
        <embed src="{{ $pdfUrl }}" type="application/pdf">

        <!-- Fallback for browsers that don't support embed -->
        <div class="pdf-fallback">
            <p>Your browser doesn't support PDF viewing.</p>
            <a href="{{ route('projects.brochure.download', $project) }}" class="download-fallback-btn">
                Download PDF File
            </a>
        </div>
    </div>

    <script>
        // Check if PDF embed is supported and show fallback if not
        document.addEventListener('DOMContentLoaded', function() {
            const embed = document.querySelector('.pdf-viewer embed');
            const fallback = document.querySelector('.pdf-fallback');

            // Check if embed loaded successfully after a short delay
            setTimeout(function() {
                if (!embed.offsetHeight || embed.offsetHeight < 100) {
                    embed.style.display = 'none';
                    fallback.style.display = 'flex';
                }
            }, 2000);
        });
    </script>
</body>

</html>
