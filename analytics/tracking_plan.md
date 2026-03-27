# Tracking & Conversion Plan

## Ziele
- Form Submit (Kontakt-Formulare auf Landing & Silo-Seiten).
- Tool Engagement (Tragbarkeits-Rechner Start/Result, Dokumenten-Check Submission, Baupotenzial-CTA Klicks).
- Scroll/Section Views zur Content-Optimierung.

## Events (GTM → GA4/Search Console)
| Event | Trigger | Parameter |
| --- | --- | --- |
| `form_submit` | Formular-Abschicken (Kontakt, Dokumenten-Check) | form_id, silo |
| `tool_start` | Klick auf Tool-Karte | tool_name |
| `tool_result` | Tragbarkeits-Rechner Berechnung | ratio, income_bucket |
| `cta_click` | Klick auf CTA-Buttons (Call/Email) | silo, cta_type |

## Data Layer Vorschlag
```js
dataLayer.push({
  event: 'tool_start',
  tool_name: 'tragbarkeit'
});
```

## ToDos
1. GTM-ID eintragen (ersetzt `GTM-XXXXXXX`).
2. GA4 Property + Search Console Zugänge.
3. Formular-Endpunkt (Webhook/CRM) → fetch POST statt mailto.
