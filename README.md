<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Over het project

Dit project is gemaakt voor het vak Cloud computing en toepassingen aan de Uhasselt. Dit project bevat de volgende componenten

- Centrale Laravel web applicatie
- REST Api service in laravel
- Flask REST API in docker
- SOAP Api in .net framework

Het centrale thema van het project is een online duikboek. Dit geeft de user de mogelijkheid om online een logboek bij te houden van zijn/haar duiken.

## Centrale Laravel applicatie

De centrale laravel applicatie bevat volgende functies:

- Authenticatie (elke duiker heeft zijn eigen account)
- De mogelijkheid om duiken te updaten/verwijderen/toevoegen aan het logboek
- Een pagina om alle behaalde duikgraden van de duiker te bewaren
- Een review page waar duikers reviews kunnen posten en opvragen van duiklocaties
- Mogelijkheid om locaties op een kaart te bekijken


## Laravel REST Api

Deze api geeft de mogelijkheid om reviews van duikplaatsen te posten naar een database en reviews op te vragen van een bepaalde locatie.

/postGradesBook
-Update het gradesbook met de inkomende data.
-POST
-Input arguments: id as int (id van de duiker); 
eenster,tweester,driester,vierster,eensterI,tweesterI,basicNitrox,advancedNitrox,basicTrimix as string (alle mogelijke duikgraden).
-Input arguments kunnen null zijn buiten het id.
-Geen retrun. 

/getGradesBook
-Vraagt Gradesbook op van een duiker.
-GET
-Input argument id als int (id van de duiker).
-Input argument kan niet null zijn.
-return Json array met booleaanse waarden of graad al dan niet behaald is.


## Flask REST Api

Deze api geeft de mogelijkheid om reviews te posten naar de database of reviews van een bepaalde locatie op te vragen. Deze api draait in een docker containter.
Documentatie van api kan worden gevonden op de api server op de route /docs/api

## SOAP APi in .net

Deze api geeft statistische data van de duikboek terug. Er is de mogelijkheid om het totaal aantal duiken en totaal aantal duikuren van een duiker op te vragen?
Doculentatie van de api kan worden gevonden op de api server.

## Sources

-Laravel leren gebruiken: https://www.youtube.com/watch?v=EU7PRmCpx-0&list=PLillGF-RfqbYhQsN5WMXy6VsDMKGadrJ-
-Flask leren gebruiken: https://www.youtube.com/watch?v=s_ht4AKnWZg
-Flask in docker zetten: https://medium.com/@doedotdev/docker-flask-a-simple-tutorial-bbcb2f4110b5
-Soap client in aws plaatsen: https://www.youtube.com/watch?v=pgRzdZeNxD8&t=1346s
-Google maps autocomplete Api gebruiken: https://developers.google.com/maps/documentation/javascript/places-autocomplete
-Google maps in javacript oproepen: https://developers.google.com/maps/documentation/javascript/places-autocomplete

