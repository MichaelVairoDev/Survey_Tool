<svg viewBox="0 0 280 70" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <!-- Definiciones para efectos avanzados -->
    <defs>
        <!-- Gradiente principal -->
        <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#3F87F5" />
            <stop offset="45%" stop-color="#3674B5" />
            <stop offset="100%" stop-color="#00C4D4" />
        </linearGradient>

        <!-- Gradiente del fondo del icono -->
        <linearGradient id="iconGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#ffffff" />
            <stop offset="100%" stop-color="#f0f0f0" />
        </linearGradient>

        <!-- Filtro para sombra -->
        <filter id="shadowEffect" x="-20%" y="-20%" width="140%" height="140%">
            <feDropShadow dx="0" dy="2" stdDeviation="4" flood-opacity="0.3" />
        </filter>

        <!-- Efecto de brillo -->
        <radialGradient id="glowEffect" cx="50%" cy="50%" r="50%" fx="50%" fy="50%">
            <stop offset="0%" stop-color="white" stop-opacity="0.3" />
            <stop offset="100%" stop-color="white" stop-opacity="0" />
        </radialGradient>
    </defs>

    <!-- Forma principal dinámica -->
    <path d="M40,20 C50,12 70,15 90,18 C180,28 220,20 250,30 C260,34 265,40 265,48 C265,58 255,65 245,65 C180,65 140,55 90,58 C70,60 50,58 40,50 C30,42 30,28 40,20 Z" fill="url(#logoGradient)" filter="url(#shadowEffect)" />

    <!-- Elemento de brillo -->
    <circle cx="230" cy="35" r="15" fill="url(#glowEffect)" />

    <!-- Icono de formulario/encuesta -->
    <g transform="translate(25, 25)">
        <!-- Papel de encuesta -->
        <rect x="0" y="0" width="25" height="32" rx="4" fill="url(#iconGradient)" stroke="#3674B5" stroke-width="1.5" />

        <!-- Líneas del formulario -->
        <line x1="6" y1="8" x2="20" y2="8" stroke="#3674B5" stroke-width="2" stroke-linecap="round" />
        <line x1="6" y1="16" x2="18" y2="16" stroke="#3674B5" stroke-width="2" stroke-linecap="round" />
        <line x1="6" y1="24" x2="16" y2="24" stroke="#3674B5" stroke-width="2" stroke-linecap="round" />

        <!-- Marca de verificación -->
        <circle cx="30" cy="20" r="10" fill="#00C4D4" fill-opacity="0.2" />
        <path d="M25,20 L28,23 L35,16" stroke="#00C4D4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </g>

    <!-- Texto del logo con efecto de sombra -->
    <text x="80" y="47" font-family="system-ui, -apple-system, BlinkMacSystemFont, Arial" font-weight="700" font-size="28" fill="white" filter="url(#shadowEffect)">
        Survey Tool
    </text>

    <!-- Elementos decorativos -->
    <circle cx="255" cy="30" r="4" fill="white" fill-opacity="0.6" />
    <circle cx="245" cy="50" r="2" fill="white" fill-opacity="0.4" />
    <circle cx="235" cy="45" r="1" fill="white" fill-opacity="0.3" />
</svg>
