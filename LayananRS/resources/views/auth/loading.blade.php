<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital System Access</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Keyframes for the EKG Line */
        @keyframes dash {
            0% {
                stroke-dashoffset: 1000;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 15px rgba(37, 99, 235, 0.2);
            }
            50% {
                box-shadow: 0 0 25px rgba(37, 99, 235, 0.6);
            }
        }

        .ekg-line {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: dash 3s linear infinite;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Medical Grid Background */
        .bg-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(203, 213, 225, 0.3) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(203, 213, 225, 0.3) 1px, transparent 1px);
        }
    </style>
</head>
<body class="bg-slate-50 h-screen w-full flex items-center justify-center overflow-hidden font-sans text-slate-600 relative">

    <!-- Background Decoration -->
    <div class="absolute inset-0 bg-grid z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-100 to-transparent z-0"></div>

    <!-- Main Loader Container -->
    <div class="glass-panel relative z-10 p-8 rounded-2xl w-full max-w-md mx-4 text-center border-t-4 border-blue-600 animate-[fade-in-up_0.8s_ease-out]">

        <!-- Icon Section -->
        <div class="mb-6 relative flex justify-center items-center h-20">
            <!-- Background Pulse Circle -->
            <div class="absolute w-16 h-16 bg-blue-50 rounded-full animate-[ping_2s_cubic-bezier(0,0,0.2,1)_infinite]"></div>

            <!-- Medical Cross Icon -->
            <div class="relative bg-blue-600 text-white p-3 rounded-lg shadow-lg z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </div>
        </div>

        <!-- EKG Animation SVG -->
        <div class="w-full h-16 mb-4 overflow-hidden relative">
            <svg viewBox="0 0 500 100" class="w-full h-full" preserveAspectRatio="none">
                <!-- The static faint line -->
                <path d="M0,50 L500,50" stroke="#e2e8f0" stroke-width="2" fill="none"/>

                <!-- The moving EKG line -->
                <path class="ekg-line"
                      d="M0,50 L100,50 L120,50 L135,20 L150,80 L165,50 L180,50 L250,50 L270,50 L285,10 L300,90 L315,50 L500,50"
                      stroke="#2563eb"
                      stroke-width="3"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
            <!-- Fade masks to make the line appear/disappear smoothly at edges -->
            <div class="absolute inset-y-0 left-0 w-8 bg-gradient-to-r from-white/90 to-transparent"></div>
            <div class="absolute inset-y-0 right-0 w-8 bg-gradient-to-l from-white/90 to-transparent"></div>
        </div>

        <!-- Text Status -->
        <h2 class="text-xl font-bold text-slate-800 mb-2 tracking-tight">System Access Granted</h2>
        <p id="status-text" class="text-sm text-slate-500 font-medium animate-pulse">Initializing dashboard modules...</p>

        <!-- Progress Bar -->
        <div class="w-full bg-slate-200 rounded-full h-1.5 mt-6 overflow-hidden">
            <div id="progress-bar" class="bg-blue-600 h-1.5 rounded-full transition-all duration-[2000ms] ease-out w-0"></div>
        </div>
    </div>

    <script>
        // Start the progress bar animation
        setTimeout(() => {
            document.getElementById('progress-bar').style.width = '100%';
        }, 100);

        // Change text halfway through
        setTimeout(() => {
            document.getElementById('status-text').innerText = "Redirecting to secure area...";
            document.getElementById('status-text').classList.remove('text-slate-500');
            document.getElementById('status-text').classList.add('text-blue-600');
        }, 1200);

        // Final Redirect
        setTimeout(function() {

            window.location.href = "{{ route('redirect.dashboard') }}";

            // For preview purposes only:
            console.log("Redirect triggered!");
        }, 2500); // Redirects after 2.5 seconds
    </script>
</body>
</html>
