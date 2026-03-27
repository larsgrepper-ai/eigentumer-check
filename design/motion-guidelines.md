# Motion & Microinteraction Guidelines

1. **Tool Cards**
   - Hover: translateY(-4px), subtle shadow, arrow icon animiert.
   - Tap (mobile): Ripple + vibrate short (Web API, falls erlaubt).

2. **Form CTA**
   - Button states: idle → hover (brighten) → pending (spinner) → success (checkmark).
   - JS-Hook vorbereitet, sobald Formular-Endpoint steht.

3. **Section Reveal**
   - Intersection Observer für Hero-Stats & Silos (fade/slide).

4. **Navigation**
   - Sticky Nav + progress bar (scroll-based) für lange Seiten.

5. **Implementation Plan**
   - Shared CSS variables + `prefers-reduced-motion` fallback.
   - JS Modul `scripts/motion.js` (noch anzulegen) inkl. throttle.
