#CRUD Ablauf
##Basics
- HTML Struktur
    - datei erstellen: xy-edit.php
        - Formular
            - method
            - Name
            - action
                - p=CASE_IN_APP
                - action=CASE_IN_XY_CONTROLLER
                - id=ID_FROM_ENTRY - Wichtig fürs Model
            - submit
            
- Neue Seite in die Whitelist schreiben
- Case für die neue Seite erstellen (case 'xy')
- Neuen Controller anlegen
    - run()
        - switch-case für ACTION
- Model erstellen
    - extends Model
    
##Create
- Request flow: App->PageController->Run()->case
    - Case = Action
- Request Validieren
    - Wurde der Submitbutton gedrückt
    - Sind die Felder ausgefüllt
        Ja: alles schick
        NEIN: Fehlermeldung!
        - Erweiterte Validierung (zeichen, email etc..)
    Pass: keine Fehlermeldungen
    Fail: Wenn Fehlermeldungen
    ->Abgeschlossen!
    
- Speichern
    - Wenn erfolgreich validiert
        - Instanz vom Model
            - save / speicher Funktion schreiben
                - SQL Statement
                    - INSERT INTO table (col...) VALUES (val..)
                - $stmt = prepare($SQL) : stmt
                - $stmt->execute(
                    [key->value]
                )
                
--------------------------

##Read

- Wir haben:
    - Daten
    - HTML Template
    - Whitelist Eintrag
    - App:Case
    
- Wir Brauchen:
    - $content in App
    - Model
        - getStuff() : array
    RequestFlow:
        - App
            - Case (XY)
                - Instanz vom PageController
                - $content = $pageController->requestStuff()
                    - Instanz PageModel
                    - return PageModel->getStuff()
                        - SQL
                        - Prepare
                        - Execute
                        - return FetchAll
    - HTML Template
        - $app->content['pageContent']
            - Foreach
                    
                
                
        
