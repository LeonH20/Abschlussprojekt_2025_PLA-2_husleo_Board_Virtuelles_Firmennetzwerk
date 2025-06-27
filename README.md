# Huskaj Solutions – Virtuelle IT-Infrastruktur mit 2FA-geschütztem Zugriff

## 🔒 Projektübersicht

Dieses Abschlussprojekt realisiert eine vollständige, virtualisierte Unternehmensumgebung mit dem Fokus auf sichere Benutzerverwaltung, Webservices und geschützten Datenzugriff. Alle Komponenten wurden in einer isolierten VMware-Workstation-Umgebung umgesetzt und durch eine OPNsense-Firewall sowie eine Zwei-Faktor-Authentifizierung (2FA) abgesichert.

---

## 🧱 Systemarchitektur

- **Öffentliches Webportal**  
  Kunden können Bash-Skripte bestellen, welche in einer SQL-Datenbank gespeichert werden.

- **Intranet mit Login**  
  Mitarbeitende greifen über eine interne Weboberfläche auf Inhalte zu – nur nach erfolgreicher Authentifizierung.

- **Active Directory**  
  Zentrale Benutzer- und Gruppenverwaltung unter Windows Server.

- **SQL-Datenbank**  
  Speicherung von Benutzer- und Bestelldaten mit Zugriffsbeschränkung per Benutzerrolle.

- **OPNsense Firewall**  
  Netzwerksegmentierung, DMZ, Port-Weiterleitungen und OpenVPN mit TOTP-2FA.

---

## 🚀 Umsetzungsschritte

1. **VM-Erstellung und Netzwerkdesign**
2. **Firewall-Konfiguration (OPNsense)**
3. **Aufsetzen der SQL-Datenbank und Benutzerrechte**
4. **Webentwicklung: Intranet & Public Portal (PHP, HTML, CSS)**
5. **Active Directory Integration**
6. **2FA mit OpenVPN und Google Authenticator**
7. **Testing und Absicherung**
8. **Backupkonzept implementiert (lokal + extern)**

---

## 🔐 Sicherheitsfeatures

- Segmentiertes Netzwerk (DMZ, LAN, LAN2)
- Rollenbasierte Zugriffe über AD
- PHP-basierte Zugriffskontrolle im Intranet
- OpenVPN-Zugriff ausschließlich mit TOTP-2FA
- Firewall-Regeln für gezielten Dienstzugriff
- Pläne für zukünftiges Fail2Ban zur Brute-Force-Abwehr

---

## 📦 Backupkonzept

- VM-Snapshots vor kritischen Änderungen
- Externe SSD mit verschlüsselter Sicherung
- Manuelle .lock-Ordner zur Verhinderung von Überschreibungen
- Restore-Tests regelmäßig durchgeführt

---

## 📊 Projektstatus

| Teilbereich             | Status       |
|-------------------------|--------------|
| Intranet-Funktion       | ✅ Abgeschlossen |
| Öffentliche Website     | ✅ Abgeschlossen |
| SQL-Integration         | ✅ Abgeschlossen |
| Active Directory        | ✅ Abgeschlossen |
| VPN + TOTP              | ✅ Erfolgreich getestet |
| Dokumentation & Tests   | ✅ Fertiggestellt |

---

## 🛠️ Technologien & Tools

- **VMware Workstation**
- **Ubuntu Server, Windows Server**
- **Apache2, PHP, MariaDB**
- **OPNsense Firewall**
- **OpenVPN mit TOTP**
- **HTML, CSS, JS (für Oberfläche)**
- **phpMyAdmin, AD-Benutzerverwaltung**

---

## 🧪 Testplan (Auszug)

- Ping-Tests zwischen VMs
- Zugriff auf Intranet & SQL via VPN
- Rechteprüfung Viewer/Admin in SQL
- Responsives Webdesign mit Dev-Tools
- Login-Schutz durch Sessions und SQL-Validierung
- OpenVPN mit Benutzer- & TOTP-Authentifizierung

---

## 🧠 Fazit

Dieses Projekt war eine praxisnahe Herausforderung, bei der viele Fähigkeiten aus dem ZLI-Jahr zur Anwendung kamen. Besonders im Bereich Netzwerk & Sicherheit konnte ich meine Eigenleistung beweisen. Die Einbindung von OPNsense, 2FA und strukturierter Benutzerverwaltung bietet eine starke Grundlage für realistische KMU-Infrastrukturen.

---

## 📚 Quellen

- [php.net](https://www.php.net)
- [htmlreference.io](https://htmlreference.io)
- [css-tricks.com](https://css-tricks.com)
- [Zenarmor: OpenVPN mit MFA auf OPNsense](https://www.zenarmor.com)
- [ChatGPT (OpenAI)](https://chat.openai.com)

---

## 👤 Autor

**Leon Huskaj**  
Abschlussprojekt ZLI 2025  
Letztes Update: 27.06.2025
