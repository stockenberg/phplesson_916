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

##Delete
- Wir haben:
    - Daten in DB
    - HTML Template
        - Tabelle mit Daten
        - Formular
    - PageController
        - Cases
            - Delete
- Wir Brauchen:
    - DeleteButton
        - href
            - p=xy-edit
            - action=delete
            - id=ID Aus Datenbank
                - Schleife aus dem DBArray
    - Model
        - delete(int $id = NULL) : void
            - $SQL Statement
                DELETE FROM table WHERE id = :ID
    - redirect auf xy-edit
        - header('Location: ?p=xy');
        - exit()
        
        
##Edit
- Wir haben:
    - Formular
    - Daten
    - HTML Template
    - PageController - Edit-Case
    - PageController - UpdateCase

- Wir Brauchen:
    - Button
        - href
            p = xy-edit
            action = edit
            id = XY_ID
            
    - Formaction
        - wir müssen insert gegen edit tauschen
            - pfad
                p = xy-edit
                action = update
                id = XY_ID
                
- Ablauf:
    - ###Schritt 1 
        - Klick auf den Edit Button
            - Hole Daten anhand der korrekten ID aus der DB
            - Schreibe die Daten in das Formular in die Value-Felder
            - Tausche die Formaction gegen die Update Action wenn Daten vorhanden sind
        
    - ### Schritt 2
        - Klick auf Submit Button
        - PageController
            - Validierung der Edit-Daten
            - instanz von XYModel
                - Aufruf der Update Funktion
                    - $SQL = 'UPDATE table SET col = :value WHERE id = :id'
                    
                    
                
        
