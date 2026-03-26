# Deployment Workflow – eigentümer-check.ch

1. **Branches**
   - `staging` → deployt automatisch auf `staging.eigentumer-check.ch`.
   - `main` → deployt automatisch auf `eigentumer-check.ch` (live).

2. **Secrets**
   - GitHub Actions verwenden die Repo-Secrets `server`, `username`, `password` für den FTP/SFTP-Zugang zu Infomaniak.

3. **Deploy Steps**
   1. Änderungen committen (sauberer `git status`).
   2. `git push origin staging` (für Tests) oder `git push origin main` (live).
   3. GitHub Actions → Workflow „Deploy Website“ bzw. „Deploy Staging“ beobachten, bis Status **success**.
   4. Nach erfolgreichem Lauf Live-Seite via Browser/curl prüfen.

4. **Fehlerbehebung**
   - Wenn Workflow rot: Logs im Action-Run öffnen, typischerweise fehlender FTP-Zugriff oder Build-Error.
   - Secrets ändern? → Repo Settings → Secrets and variables → Actions.

5. **Notizen**
   - Der Sandbox hat keinen direkten DNS-Zugriff auf `eigentumer-check.ch`, daher externe Kontrolle nötig.
   - Dummy-Commit möglich („chore: trigger deploy“), falls nur Deploy testen.
