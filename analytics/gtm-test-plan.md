# GTM / GA4 Testplan – Eigentümer-Check
_Date: 01.04.2026_

## Voraussetzungen
- Zugang zu GTM-Container `GTM-M7JNHTLN` (Preview + Publish-Rechte)
- GA4 Property (ID tbd) mit benutzerdefinierten Events: `calculator_step_completed`, `pdf_requested`, `lead_generated`
- Browser mit DebugView (Chrome/Edge) + Consent bereits erteilt

## Testfälle
| # | Interaktion | Erwartetes DataLayer-Event | GA4 Prüfung |
|---|-------------|---------------------------|-------------|
| 1 | Klick auf "Berechnen" im Tragbarkeit-Labor | `{event:'calculator_step_completed', calculator:'tragbarkeit', ratio:XX.X}` | DebugView zeigt Event + Parameter `calculator` & `ratio` |
| 2 | Klick auf "Ausgleich berechnen" im Scheidungs-Instrument | `{event:'calculator_step_completed', calculator:'scheidung', equity:CHF}` | Event mit `calculator=scheidung`, `equity` |
| 3 | Klick auf "Score berechnen" im Verdichtungstool | `{event:'calculator_step_completed', calculator:'verdichtung', potential, zone}` | Parameter `potential`, `zone` sichtbar |
| 4 | Leadmagnet-Formular erfolgreich abgesendet | `{event:'pdf_requested', focus:'SILO'}` | Event + parameter `focus` |
| 5 | Standortbestimmung-Formular erfolgreich abgesendet | `{event:'lead_generated', caseType:'SILO', timeline:'x'}` | Event + Parameter `caseType`, `timeline` |

## Vorgehen
1. GTM-Preview starten, Seite laden (Chrome).
2. Jede Interaktion aus Tabelle ausführen; im Preview prüfen, ob Trigger feuert.
3. Parallel GA4 DebugView öffnen, auf Events warten (~5s).
4. Ergebnisse in dieser Datei dokumentieren (Status + Timestamp).

## Offene Punkte
- Fehlende GTM-Zugangsdaten → ohne Preview keine Validierung möglich.
- GA4 Measurement ID noch unbekannt.

## Nächste Schritte
- Zugangsdaten anfordern
- Nach Freigabe: Testcases abhaken und Screenshots im Ordner `analytics/screenshots/` ablegen.
