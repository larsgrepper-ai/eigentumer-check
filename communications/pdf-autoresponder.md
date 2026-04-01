# PDF-Autoresponder Konzept

## Ziel
Automatisierte E-Mail innert 2 Minuten nach Formular-Abschluss. Liefert versprochene Checkliste/PDF und startet Vertrauensaufbau.

## Placeholder-Webhook
- Aktuell: `https://hooks.make.com/eigentumer-check-placeholder`
- Make.com-Szenario übernimmt JSON-Payload und stößt E-Mail-Versand an (z.B. Infomaniak, Mailjet oder Sendgrid).

## Empfohlene E-Mail-Struktur
```
Absender: Eigentümer-Check <kontakt@eigentumer-check.ch>
Betreff: [Fokus] Dossier-Link ist bereit

Hoi <<Vorname>>

Danke für dein Vertrauen. Im Anhang findest du die aktuelle Checkliste + Beispiel-Dossier für <<Fokus>>. Darin siehst du:
• Zahlen & KPIs
• Handlungsschritte
• Ansprechpartner (Bank, Recht, Planung)

Nächste Schritte:
1. Fülle die gelben Felder aus
2. Lade Dokumente im sicheren Portal hoch
3. Buche deinen Standorttermin (Link)

Wenn du Fragen hast, antworte einfach auf diese Nachricht oder ruf mich direkt an: +41 79 270 04 46.

Beste Grüsse
Lars Grepper
Immobilienexperte, Eigentümer-Check.ch
```

## Anhänge
- PDF pro Silo (Dummy-Dateien, 18 Seiten)
  - `Pensionierung_Dossier_v1.pdf`
  - `Scheidung_Playbook_v1.pdf`
  - `Erbschaft_Checkliste_v1.pdf`
  - `Verdichtung_ExecutiveSummary_v1.pdf`
- Hosting-Vorschlag: Infomaniak Drive (Passwort) oder AWS S3 mit signiertem Link (72h gültig)

## Automations-Logik
1. Make.com empfängt Payload (`type`, `name`, `email`, `focus` ...)
2. Router je Fokus → Anhang + Copy auswählen
3. E-Mail versenden → Erfolgs- oder Fehlerstatus zurück an Frontend
4. Optional: Slack/Signal-Alert, wenn `lead_generated`

## Erweiterungen
- Personalisierte Titelseiten (Name, Datum)
- Reminder nach 48h ohne Öffnung
- Lead-Score Sync in CRM
