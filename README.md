🏟️ JerseyShop

Een Laravel-project ontwikkeld als onderdeel voor de eindoefening. JerseyShop is een platform waar gebruikers kunnen registreren, inloggen, hun profiel beheren, nieuws en FAQ’s bekijken, en contact opnemen met de beheerder. Admins krijgen extra rechten zoals gebruikersbeheer, nieuwsbeheer en FAQ-beheer.

📌 Kernfunctionaliteiten 🔑 Authenticatie & Gebruikersbeheer

Inloggen en registreren voor alle bezoekers Twee soorten accounts: Gebruiker en Admin Admins kunnen: Gebruikers adminrechten geven of afnemen Manueel nieuwe accounts aanmaken Wachtwoord vergeten → reset via e-mail Default admin account aanwezig: Username: admin Email: admin@ehb.be Password: Password!321

👤 Profielpagina

Publiek toegankelijk profiel (ook voor niet-ingelogde bezoekers) Ingelogde gebruikers kunnen hun gegevens bekijken Profiel bevat o.a.: Username Korte “Over mij”-tekst

📰 Nieuwsitems

Admins beheren nieuwsitems (CRUD) Elk nieuwsitem bevat: Titel Afbeelding (server-opslag) Content Publicatiedatum Bezoekers kunnen: Alle nieuwsitems bekijken Detailpagina’s openen

❓ FAQ

Lijst met vragen & antwoorden, gegroepeerd per categorie Admins beheren categorieën en Q&A’s Bezoekers hebben enkel leesrechten

📬 Contactformulier

Formulier beschikbaar voor elke bezoeker Bij verzenden krijgt de admin een e-mail met de inhoud

⚙️ Technische Specificaties 🔗 Routes & Controllers

Alle routes gekoppeld aan controllers Middleware toegepast voor beveiligde delen Logische route-groeperingen

🖼️ Views

Minstens twee layouts Gebruik van Blade components CSRF en XSS bescherming aanwezig Client-side validatie toegepast

🗄️ Database & Models

Eloquent Models per entiteit Relaties geïmplementeerd: One-to-Many (bijv. User → Newsitems) Many-to-Many (bijv. User ↔ Roles) Migraties en seeders voorzien php artisan migrate:fresh --seed levert een volledig gevulde database

🎨 Layout

Focus op duidelijke en professionele structuur Minimalistisch design (geen extra tijd verspillen aan grafisch werk)

🚀 Extra Features (optioneel)

Voor uitbreiding bovenop de basisvereisten: Admin dashboard voor contactberichten Commentaarsysteem bij nieuwsitems Interactie tussen gebruikers Suggesties van FAQ-vragen door bezoekers Forumfunctionaliteit Shop- of bestelsysteem (ideaal voor “JerseyShop” 👕)

📂 Installatiehandleiding

Clone repository
git clone https://github.com/username/jerseyshop.git cd jerseyshop

Installeer dependencies
composer install npm install && npm run dev
Maak .env bestand Kopieer .env.example → .env Stel databasegegevens in Genereer key & run migraties
php artisan key:generate php artisan migrate:fresh --seed
Start de server php artisan serve

Met de screenshots had ik een probleem die werden als link gebruikt.

✅ Deliverables

Volledige broncode in GitHub repository Dagelijkse commits Werkende demo via installatiehandleiding Database met seeders en migraties Default admin account aanwezig