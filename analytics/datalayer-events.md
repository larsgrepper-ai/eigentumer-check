# DataLayer Events – Eigentümer-Check

| Event | Wann ausgelöst | Payload-Felder | Zweck |
|-------|----------------|----------------|-------|
| `calculator_step_completed` | Bei jedem Klick auf einen Rechner (Tragbarkeit, Scheidung, Verdichtung) | `calculator` (tragbarkeit|scheidung|verdichtung), `ratio` oder `equity` oder `potential`, `zone` (nur Verdichtung) | Tracking der Nutzungstiefe, Grundlage für Funnel-Analysen in GA4/GTM |
| `pdf_requested` | Erfolgreiches Absenden des PDF-Lead-Formulars | `focus` (Pensionierung|Scheidung|Erbschaft|Verdichtung) | Conversion-Metrik für Leadmagnet |
| `lead_generated` | Erfolgreiches Absenden des Standortbestimmungs-Formulars | `caseType`, `timeline` | Kern-KPI „Opportunities“ |

## DataLayer Initialisierung
```html
<script>
  window.dataLayer = window.dataLayer || [];
</script>
```

## GTM-Implementierung
- Trigger 1: Custom Event = `calculator_step_completed`
- Trigger 2: Custom Event = `pdf_requested`
- Trigger 3: Custom Event = `lead_generated`
- Variablen: DataLayer Variable für jedes Payload-Feld

## Nächste Schritte
1. Im GTM-Container `GTM-M7JNHTLN` drei Custom Event Trigger anlegen.
2. GA4-Events mit identischen Namen erstellen (Naming-Konsistenz).
3. Zusätzlich serverseitig speichern, sobald Make.com-Webhook produktiv ist.

## Failover
- Frontend sendet Payload parallel an Make.com-Webhook und `/form-handler.php` (E-Mail an kontakt@eigentumer-check.ch).
- Sobald Webhook produktiv ist, genügt das Aktualisieren der URL – der Mailer bleibt als Backup aktiv.
