# Changelog
## 03-11-2024
- Deeplinken beveiliging over edit opgelost probleem was precisie in de === omdat in mijn migration het een ander datatype was.
- Activeren / deactiveren bug
- Comments toevoegen voor assistentie tijdens toetsing.
- Gestopt met opschonen bestanden na verwijderen bestand Controller.php waardoor project stopte met werken.

## 02-11-2024
- Deeplinken als gast laat niet meer error zien en stuurt terug naar homepagina
- Deeplink beveiliging over edit proberen te zetten alleen liep steeds vast, morgen afmaken.
## 01-11-2024
- PHP storm bug opgelost door hulp van docent. Probleem lag in settings dat mijn bestand verbonden was met onedrive.
- Diepere validatie dmv ELoquent toegevoegd door te checken op reviews.
- Favorieten toegevoegd als searchcriteria
- Als gast kan je nu de Home pagina zien zonder te crashen.
- De user die het huis heeft aangemaakt kan deze nu aanpassen en verwijderen

## 31-10-2024
- Geprobeerd te werken aan de diepere validatie
- Grote vervelende bug waardoor php storm elke keer mij uit mijn bestanden gooit en weer terug zet naar de grootste map in mijn project
- github wilt ook niet meer updaten
- Docent om hulp gevraagd bij dit probleem zeker omdat het mij moeite gaat brengen met het presenteren van het project laat staan het afmaken.
- Op andere PC zelfde project opgestart daar geen problemen. Kort daarop gewerkt maar geen extra instalaties op gedaan waardoor er problemen waren.
- Toch nog gelukt filteren op categorën toe te voegen erg trost maar probleem is nog steeds aanwezig wat erg iriterend en demotiverend is.
- 
======= (Update vanuit andere pc voordat ik de beslissing had gemaakt om zelfd met de bug op mijn laptop door te gaan)=======
- Project geopend op andere PC hier is het geen probleem
- Verder werken op deze PC en elke change pushen/pullen om op andere pc live prview te hebben (omdat ik op deze pc geen extra instalateis heb gedaan om dit te runnen)

## 28-10-2024
Actie:

- Bewerken en verwijderen een admin only mogelijkheid gemaakt.
- Admin page aangemaakt / originele manier van verwijderen/editen verplaatst naar deze pagina
## 23-10-2024
Actie:
- Presentatie uitleg mondeling
- Migration database van users aangepast met status voor admin
- Research Eloquent gedaan

Bronnen:
- https://laravel.com/docs/11.x/eloquent
## 22-10-2024
Actie:
- Presentatie les OTAP thuis doorgenomen.
- Les 6, 1 op veel relatie opgave ingehaald en gemaakt. Reviews zijn nu mogelijk op mijn pagina
- cascadeOnDelete() toegevoegd in de migration van reviews tabel.
## 21-10-2024
Acties:
- Uitleg gekregen over OWASP Top 10
- Nummer 8 9 en 10 uit kunnen leggen uit de lijst
- Hulp gevraagd over mijn probleem met de Create. Verder geholpen uit mijn loop zonder Error. Aangeraden op te zoeken waar de Error zat en die op de pagina weer te kunnen geven.
- Database probleem opgelost. Probleem lag in 2 dingen user_id werd niet aangevuld omdat het niet verplicht was om in te loggen en category_id werd niet ingevuld waardoor query niet werkte.
- House migration aangepast met toevoeging "$table->float('category_id')->nullable();" na rollback database en daarna weer migration was ahet probleem opgelost.
- Aangepaste app (lichtere kleuren) layout toegepast op mijn bestaande pages. Dit hielp bij het overzicht houden van mijn totale voortgang.
- Delete functie in HouseController toegevoegd
- Delete form in list.blade.php toegevoegd
- Edit en Update in HouseController toegevoegd
- edit.blade.php toegevoegd
- Edit pagina werkend gemaakt

Bronnen:
-https://www.cybertilt.nl/security/uitleg-encoding-hashing-encryption/

## 20-10-2024
Acties:
- Gewerkt aan het maken van de create en store voor houses
- begonnen met het aanpassen van de HousesController.
- create functie toegevoegd met validatie van de columns.
- Store functie toegevoegd.
- de view (create.blade.php) aangemaakt en form gemaakt.
- Tegen probleem aangelopen dat pagina ID niet gevonden kon worden als error werd aangegeven
- Online gezocht en aan mede studenten om hulp gevraagd. Uiteindelijk lag het probleem in de volgorde van routes in mijn web.php

## 16-10-2024
Acties:
- Gewerkt aan databases linken met een op veel relaties

Bronnen:
- Geen

Wat verliep goed:
- Het aanpassen aan een andere klas en gezien de omstandigheden nog steeds 


## 15-10-2024
Acties:
- Geleerd over databases in phpstorm
- Gewerkt met migrations
- tabel aangemaakt met migrations
- database gevuld met dummy data
- data uit database weergegeven op webpagina
- Read van Crud deels toegevoegd aan mijn webpagina

Bronnen:
- Chatgpt gebruikt om dummy data te maken prompt: kan jij meer dummy data voor mij aanmaken in deze format: autoincrement ID DUS LEEG ,Holland straat,wow dit is een huis in de hollandstraat voor 40000000000000 chillings,20,koop,1,noord-holland,leeg,1,1,, 
- EN vervolg vraag: geef meer viariate in de straat naam en de prijs en omschrijving en proninvcie en of het koop/huur is

Wat verliep goed:
- Het volgen van de les en bij elke stap bij zijn met eigen project en heel de les mijn aandacht erbij kunnen houden


Wat was lastig:
- Deze dag had zijn uitdagingen maar ik zat nergens op vast.


Wat heb ik geleerd:
- Het is netjes om ENUM te gebruiken in je database MAAR makkelijker om met 1 en 2 enz te werken met intergers

Feedback:
- Het maken van de ERD moet in een gepaste tool gemaakt zijn.
- Vervang reviews voor categories in de ERD
## 14-10-2024


Acties:
- User stories gemaakt
- ERD gemaakt
- Planning gemaakt
- Geleerd over components en partials

Bronnen:
- Geen

Wat verliep goed:
- Het toepassen van de feedback op mijn ERD


Wat was lastig:
- Het vinden van de code in mijn Laravel project die verwijst naar de login/register voor de opdracht van de les


Wat heb ik geleerd:
- Het is netjes om ENUM te gebruiken in je database MAAR makkelijker om met 1 en 2 enz te werken met intergers

Feedback:
- Het maken van de ERD moet in een gepaste tool gemaakt zijn.
- Vervang reviews voor categories in de ERD

## 10-10-2024


Acties:
- Laravel eindproject opnieuw aangemaakt en op github gezet.
- Geleerd over views en opdrachten hierover gemaakt
- Geleerd over controllers en opdrachten hierover gemaakt

Bronnen:
- Geen

Wat verliep goed:
- Het maken va nde opdrachten


Wat was lastig:
- nvt



## 8-10-2024

Acties:
- Instalatie van twee andere PHP MVC frameworks namenlijk: Yii 2 en CodeIgniter
- Basis Controller, Route en view maken in deze 2 niewe frameworks
- Bijwerken onderzoeksverslag

Bronnen:
- https://www.yiiframework.com/doc/guide/2.0/en/start-installation
- https://www.codeigniter.com/


Wat verliep goed:
- Het instaleren van de nieuwe frameworks. Ookal waren er errors die ik moest oplossen lukte mij het deze keer veel beter dan bij de aller eerste instalatie wat liet zien dat ik vooruit ben gegaan als probleemoplossende developer. Dit gaf mij veel zelfvertrouwen


Wat was lastig:
- Uitvinden hoe het maken van een nieuwe pagina met 'Route', Controller en view ging in Yii 2


Wat heb ik geleerd:
- Niet alleen van opdrachten doen kan je veel leren ook een instalatie doen heeft een leercurve


Feedback:
- Uit een peerreview van Kasper, een medestudent, kwam dat ik aan mijn opmaak van het verslag kon werken en de bronnen in APA kon zetten. Dit laatste is echter niet verplicht maar wel een uitstekende oefening voor een eind- stageverslag.

## 7-10-2024
Gewerkt aan instalatie:

Acties:
- Composer geinstaleerd
- Het project aangemaakt in php storm
- DATABASE gemaakt in php storm gebruik gemaakt van sqllite
- Het .env bestand aangepast en APP_NAME aangepast
- Server getest door 'php artisan serve' te runnen
- Laravel Plugin geinstaleerd en door student is het gratis
- Changelog aangemaakt
- Veel Errors gefixed


Bronnen:
- https://www.shiksha.com/online-courses/articles/framework-vs-library/
- https://nl.wikipedia.org/wiki/Model-view-controller-model#:~:text=Model%2Dview%2Dcontroller%20(of,)%20en%20applicatielogica%20(controller).
- https://www.freecodecamp.org/news/model-view-architecture/
- https://stackoverflow.com/questions/41274829/php-error-the-zip-extension-and-unzip-command-are-both-missing-skipping

Wat verliep goed:
- Het stellen van vragen deed ik waardoor ik goed door kon werken, terwijl ik normaal eerst lang zelf probeer uit te vogelen. Dat heb ik nu ook gedaan, maar niet te lang zoals voorheen. Door sneller hulp te vragen, kon ik beter doorwerken en voorkwam ik tijdverlies.

Wat was lastig:
- Sommige errors tijdens het installeren kon ik prima oplossen, maar andere waren wat lastiger, zelfs na hulp. Uiteindelijk ben ik er toch uitgekomen en is de installatie succesvol afgerond.

Wat heb ik geleerd:
- k heb geleerd wat een MVC-framework is en in abstracte termen hoe je ermee werkt. Daarnaast heb ik geleerd hoe het installeren van Laravel werkt.

Feedback:
- Voor deze eerste dag was er nog geen feedback te geven, zie de docent.




