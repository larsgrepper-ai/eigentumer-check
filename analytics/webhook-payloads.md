# Webhook Payloads – Eigentümer-Check

## `calc_lead` (Multi-Step Instrumente)
- `type`: `calc_lead`
- `flow`: `tragbarkeit` | `verdichtung`
- `silo`: `Silo_Pensionierung` bzw. `Silo_Verdichtung`
- `timestamp`: ISO-8601
- `values`: Objekt mit den eingegebenen Feldern
  - Tragbarkeit: `income`, `loan`, `rate`, `living`
  - Verdichtung: `plot`, `factor`, `zone`
- `result`: Text mit berechneter Aussage
- `email`: Zieladresse für das Dossier

## `pdf_request` (Leadmagnet)
- `type`: `pdf_request`
- `name`, `email`, `fokus`
- `silo`: `Silo_<Fokus>`
- `timestamp`: ISO-8601

## `lead` (Standortbestimmung)
- `type`: `lead`
- `caseType`, `timeline`, `name`, `email`, `tel`, `message`
- `silo`: `Silo_<caseType>`
- `timestamp`: ISO-8601

Alle Payloads werden parallel an den Make.com-Webhooks (`WEBHOOK_URL`) und den PHP-Mail-Fallback (`EMAIL_ENDPOINT`) gesendet. Jede Payload enthält somit einen Silo-Tag und einen Zeitstempel für spätere Segmentierung in Make.
