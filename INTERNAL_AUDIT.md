# INTERNAL AUDIT LOG

## 2026-04-01 – Kontrast & Grid-Sanierung
- **Fehlerbild:** Weißer Text auf hellen Hintergründen + uneinheitliche Spacing-Werte.
- **Korrektur:** Globaler Body-Reset (#07090d / #f5f7f9), dunkle Sektionen mit expliziten Textfarben, neues 8px-System mit `--unit`-Variablen.
- **Warum jetzt 10/10:** Keine Bereiche ohne definierten Kontrast mehr; alle Komponenten referenzieren dasselbe Token-Set.

## 2026-04-01 – Contrast Linter & Komponenten-System
- **Fehlerbild:** Risiko, erneut unzulässige Farbwerte einzubauen.
- **Korrektur:** `scripts/contrast-lint.js` prüft CSS-Dateien auf `color:#fff` und bricht bei Verstößen ab; CSS wird ausschließlich über Komponenten-/Token-Definitionen angepasst.
- **Warum jetzt 10/10:** Build/Pre-Commit kann mit Lint abgesichert werden, Änderungen laufen über zentrale Styles.

## Nächste Schritte
- Täglich Conversion-Hypothesen prüfen (bzw. simulieren) und selbstständig Headlines/CTAs iterieren.
- SERP-/SEO-Lücken in SZ/ZG/LU/ZH identifizieren und proaktiv Content erweitern.
