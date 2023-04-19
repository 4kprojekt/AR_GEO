# Rozszerzona rzeczywistość (augmented reality) w edukacji

Projekt realizowany dla Wydziału Geografii Społeczno-Ekonomicznej i Gospodarki Przestrzennej uniwersytetu Adama Mickiewicza w Poznaniu. 

## Opis

Aplikacja umożliwia wyświetlanie na urządzeniu mobilnym (przeglądarka chrome lub inna wspierająca webxr) obrazów, animacji, filmów na predefiniowanych markerach

## Działanie

Sprawdź demo, wydrukuj marker dostępny 
```
doc_files/earth_marker.png
```
następnie wejdź z urządzenia mobilnego spełniającego wymagania na stronę [demo](https://4kprojekt.home.pl/ar_demo/) wybierz scenę "ziemia" i zeskanuj wydrukowany marker


[video](https://4kprojekt.home.pl/ar_demo/doc_files/demo.mp4)

### Zależności

aplikacja wykorzystuje biblioteki:
* https://github.com/hiukim/mind-ar-js
* https://aframe.io/
* https://getbootstrap.com/

wykorzystane technologie
* php
* html
* javascript

### Tworzenie markerów

marker można wygenerować na tej [stronie](https://hiukim.github.io/mind-ar-js-doc/tools/compile)

przygotuj obraze, wgraj go na stronę i pobierz wygenerowany marker (plik .mind)

### Instalacja

* sklonuj repozytorium na serwer umożliwający hostowanie stron PHP
```
git clone https://github.com/4kprojekt/AR_GEO.git
```
### Uruchomienie

po umieszczeniu plików na serwerze, wejdź na stronę główną aplikacji i zeskanuj marker

## Dodawanie nowych markerów

...

