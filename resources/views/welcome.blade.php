<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DoctoCNAM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Rendez-vous</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">S'inscrire</a>
                        @endif
                    @endif
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                         width="250.000000pt" height="100.000000pt" viewBox="0 0 500.000000 257.000000"
                         preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,257.000000) scale(0.100000,-0.100000)"
                           fill="#c00a27" stroke="none">
                            <path d="M1526 2465 c-145 -37 -297 -155 -364 -282 -40 -76 -72 -197 -72 -273 0 -76 32 -197 72 -273 18 -34 62 -91 98 -127 228 -229 595 -224 820 11 56 59 113 162 135 245 19 75 19 213 0 288 -48 183 -196 341 -374 397 -86 28 -235 34 -315 14z m252 -50 c96 -23 179 -70 253 -144 101 -101 149 -218 149 -361 0 -142 -48 -258 -150 -361 -161 -164 -390 -203 -597 -103 -206 100 -326 341 -279 562 61 291 341 474 624 407z"/>
                            <path d="M1500 2185 l0 -115 -110 0 -110 0 0 -160 0 -160 110 0 110 0 0 -110 0 -110 165 0 165 0 0 110 0 110 110 0 110 0 0 160 0 160 -110 0 -110 0 0 115 0 115 -165 0 -165 0 0 -115z"/>
                            <path d="M80 2371 l0 -41 60 0 60 0 0 -410 0 -410 -60 0 -60 0 0 -40 0 -40 228 0 c257 1 349 13 445 58 168 80 251 224 251 437 0 229 -97 375 -300 453 -67 25 -76 26 -346 30 l-278 4 0 -41z m562 -73 c130 -60 188 -162 196 -342 7 -174 -27 -278 -116 -357 -65 -57 -136 -80 -269 -86 l-113 -6 0 413 0 412 123 -4 c105 -3 130 -8 179 -30z"/>
                            <path d="M2603 2365 c-152 -43 -257 -151 -299 -308 -18 -66 -18 -227 0 -292 53 -199 216 -325 419 -325 183 0 308 81 367 235 l10 25 -63 0 c-62 0 -63 -1 -75 -32 -34 -96 -121 -150 -238 -150 -133 0 -216 61 -261 192 -26 79 -26 321 0 399 46 135 127 194 265 193 49 0 93 -7 120 -17 54 -22 116 -92 132 -150 12 -44 14 -45 52 -45 l39 0 -3 108 -3 107 -100 34 c-121 40 -273 51 -362 26z"/>
                            <path d="M4362 2364 c-148 -40 -266 -170 -301 -332 -50 -237 48 -463 242 -553 68 -32 78 -34 182 -34 129 0 189 17 266 75 115 86 169 196 177 360 7 167 -29 279 -123 376 -84 86 -186 125 -323 123 -37 0 -91 -7 -120 -15z m245 -80 c55 -20 114 -86 144 -160 21 -53 24 -74 24 -214 0 -139 -3 -161 -24 -214 -48 -119 -128 -177 -250 -178 -116 -1 -188 35 -241 119 -78 122 -80 411 -5 539 68 116 208 159 352 108z"/>
                            <path d="M3170 2250 l0 -110 45 0 45 0 0 70 0 70 125 0 125 0 0 -375 0 -375 -60 0 -60 0 0 -35 0 -35 185 0 185 0 0 35 0 35 -60 0 -60 0 0 375 0 375 125 0 124 0 3 -67 3 -68 43 -3 42 -3 0 110 0 111 -405 0 -405 0 0 -110z"/>
                            <path d="M769 857 c-83 -30 -129 -65 -168 -125 -47 -74 -64 -149 -59 -261 3 -83 8 -105 33 -156 35 -69 97 -135 153 -164 22 -11 71 -26 109 -32 174 -29 329 48 349 173 6 33 4 36 -26 47 -51 17 -56 15 -88 -42 -81 -144 -287 -119 -375 46 -19 37 -22 57 -22 157 0 109 2 118 30 169 35 63 74 95 136 112 97 26 166 -11 235 -127 10 -17 13 -17 50 -3 59 23 59 71 -1 138 -76 83 -232 113 -356 68z"/>
                            <path d="M1655 871 c-69 -18 -143 -79 -160 -130 -11 -36 -22 -23 -30 36 -10 82 -11 83 -66 83 l-49 0 0 -370 0 -371 78 3 77 3 7 175 c6 188 21 264 64 337 13 23 36 51 50 62 61 48 152 34 189 -29 18 -32 20 -57 25 -290 l5 -255 75 0 75 0 0 290 c0 278 -1 292 -22 330 -44 83 -117 127 -218 131 -38 2 -83 0 -100 -5z"/>
                            <path d="M2410 874 c-14 -3 -55 -16 -92 -30 -110 -42 -155 -112 -145 -227 3 -32 9 -63 15 -69 5 -5 49 0 113 14 103 23 104 24 105 53 2 50 3 54 26 75 27 25 88 27 117 3 22 -18 51 -106 51 -153 l0 -25 -138 0 c-127 0 -141 -2 -193 -26 -131 -62 -158 -213 -55 -315 33 -33 53 -44 100 -54 109 -22 221 9 273 76 l26 35 21 -37 c31 -56 73 -76 159 -77 56 -1 80 3 107 19 33 19 35 23 35 75 l0 54 -35 3 c-19 2 -39 8 -45 13 -6 6 -12 94 -15 202 -6 215 -11 235 -80 306 -52 53 -132 82 -240 86 -47 2 -96 1 -110 -1z m172 -514 c-12 -40 -26 -60 -51 -77 -63 -43 -131 -23 -131 37 0 40 32 67 94 80 50 10 99 17 103 15 2 -1 -5 -26 -15 -55z"/><path d="M3440 871 c-77 -24 -133 -67 -175 -137 l-22 -37 -19 79 -19 79 -84 3 c-61 2 -87 -1 -92 -10 -11 -17 -11 -699 -1 -716 7 -9 42 -12 143 -10 l134 3 5 175 c6 195 18 248 63 286 33 28 50 30 71 8 14 -13 16 -49 16 -232 0 -119 4 -223 8 -230 7 -9 46 -12 163 -10 l154 3 5 170 c6 186 18 240 61 286 30 32 46 36 75 15 18 -13 19 -30 22 -245 l3 -231 155 0 155 0 -3 277 c-3 243 -6 283 -22 318 -30 66 -54 92 -112 125 -76 44 -151 51 -222 20 -52 -22 -113 -80 -134 -126 -6 -13 -14 -24 -17 -24 -3 0 -18 20 -32 43 -55 91 -186 146 -279 118z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 ">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold"><p class="text-gray-900 dark:text-white">Bienvenue</p></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Ce site vous permet de prendre rendez-vous à tout moment avec n'importe quel médecin.
                                    Pour commencer, <a href="{{ route('register') }}" class="text-gray-700 underline">inscrivez-vous</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
