<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run() {
        
        DB::table('users')->insert([
            ['nome' => 'Admin', 'cognome' => 'Admin', 'età' => 55, 'genere' => 'M', 'email' => 'admin@admin.it', 
                'cellulare' => '333567890', 'username' => 'adminadmin','password' => Hash::make('i4z5zipq'), 'livello' => 'admin',], //password criptata in phpmyadmin
            ['nome' => 'Luca', 'cognome' => 'Tore', 'età' => 69, 'genere' => 'M', 'email' => 'loca@loca.it', 
                'cellulare' => '334567890', 'username' => 'lorelore','password' => Hash::make('i4z5zipq'), 'livello' => 'locatore',],
            ['nome' => 'Luca', 'cognome' => 'Tario', 'età' => 20, 'genere' => 'M', 'email' => 'lario@lario.it', 
                'cellulare' => '335567890', 'username' => 'lariolario','password' => Hash::make('i4z5zipq'), 'livello' => 'locatario',],
            ['nome' => 'Alex', 'cognome' => 'Alex', 'età' => 69, 'genere' => 'M', 'email' => 'lari@lario.it', 
                'cellulare' => '335567891', 'username' => 'alexalex','password' => Hash::make('alexalex'), 'livello' => 'locatario',],
            ['nome' => 'Elia', 'cognome' => 'Elia', 'età' => 69, 'genere' => 'M', 'email' => 'lar@lario.it', 
                'cellulare' => '335567892', 'username' => 'eliaelia','password' => Hash::make('eliaelia'), 'livello' => 'locatore',],
            ['nome' => 'Tommi', 'cognome' => 'Tommi', 'età' => 69, 'genere' => 'M', 'email' => 'la@lario.it', 
                'cellulare' => '335567893', 'username' => 'tommitommi','password' => Hash::make('tommitommi'), 'livello' => 'admin',],
        ]);
        

        DB::table('houses')->insert([
            ['id' => 1, 'locatore_id' => 2, 'titolo' => 'Appartamento1', 'prezzo' => 280, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 3, 'n_posti_letto_totali' => 3, 'data_inserimento' => date("Y-m-d H:i:s"),
                'data_min' => '2020-01-01', 'data_max' => '2023-01-01','indirizzo' => 'Via Simeoni, 6', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'età_min' => '18', 
                'superficie' => '150','immagine' => 'casa1.jpg', 'opzionato' =>1]
        ]);
            
        DB::table('houses')->insert([
            ['id' => 2, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'data_min' => '2020-01-01', 'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '22', 'superficie' => '250', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 3, 'locatore_id' => 5, 'titolo' => 'Appartamento3', 'prezzo' => 370, 'descrizione' => 'Appartamento situato in periferia, a 10 minuti a piedi dalla fermata del pullman. Presenti due bagni, una cucina e un ampio salone, wi-fi, posto auto',
                'tipologia' => 'Appartamento', 'n_camere' => 3, 'n_posti_letto_totali' => 5, 'data_inserimento' => date("Y-m-d H:i:s"),
                'data_max' => '2023-01-01', 'indirizzo' => 'Via Pinocchio, 24', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'M', 
                'età_min' => '20', 'superficie' => '200','immagine' => 'casa3.jpg', 'opzionato' =>0]
        ]);
         
        DB::table('houses')->insert([
            ['id' => 4, 'locatore_id' => 2, 'titolo' => 'Appartamento4', 'prezzo' => 200, 'descrizione' => 'Appartamento situato in pieno centro, a 10 minuti di autobus dalla facoltà di Ingegneria . Presente un bagno, una cucina e un salone, wi-fi,asciugatrice',
                'tipologia' => 'Appartamento', 'n_camere' => 2, 'n_posti_letto_totali' => 2, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Martin Luther King, 6', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => null, 
                'età_min' => null, 'età_max' => '30', 'superficie' => '70','immagine' => 'casa4.jpg', 'opzionato' =>1]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 5, 'locatore_id' => 2, 'titolo' => 'Appartamento5', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa5.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 6, 'locatore_id' => 5, 'titolo' => 'Appartamento6', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa6.jpg', 'opzionato' =>1]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 7, 'locatore_id' => 5, 'titolo' => 'Appartamento7', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa7.jpg', 'opzionato' =>1]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 8, 'locatore_id' => 2, 'titolo' => 'Appartamento8', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa8.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 9, 'locatore_id' => 5, 'titolo' => 'Appartamento9', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa9.jpg', 'opzionato' =>1]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 10, 'locatore_id' => 2, 'titolo' => 'Appartamento10', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa10.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 11, 'locatore_id' => 5, 'titolo' => 'Appartamento11', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa11.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 12, 'locatore_id' => 2, 'titolo' => 'Appartamento12', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa12.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 13, 'locatore_id' => 2, 'titolo' => 'Appartamento13', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa13.jpg', 'opzionato' =>1]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 14, 'locatore_id' => 2, 'titolo' => 'Appartamento14', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa14.jpg', 'opzionato' =>0]
        ]);
        
        DB::table('houses')->insert([
            ['id' => 15, 'locatore_id' => 2, 'titolo' => 'Appartamento15', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg', 'opzionato' =>1]
        ]);
        DB::table('houses')->insert([
            ['id' => 16, 'locatore_id' => 5, 'titolo' => 'Posto Letto Singolo', 'prezzo' => 480, 'descrizione' => 'Posto Letto situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Posto letto singolo', 'n_camere' => 0, 'n_posti_letto_totali' => 1, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg', 'opzionato' =>1]
        ]);
        DB::table('houses')->insert([
            ['id' => 17, 'locatore_id' => 5, 'titolo' => 'Posto Letto Doppio', 'prezzo' => 480, 'descrizione' => 'Posto Letto situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'Posto letto doppio', 'n_camere' => 0, 'n_posti_letto_totali' => 2, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg', 'opzionato' =>0]
        ]);
        


        
        DB::table('faqs')->insert([
            ['id' => 1, 'domanda' => 'Di cosa tratta questo sito?', 'risposta' =>"Il nostro sito è classificabile come un sito dedicato agli annunci d'affitto"],
            ['id' => 2, 'domanda' => 'Devo essere registrato per usufruire del vostro sito?', 'risposta' =>'Si, nella home page potrai visualizzare le case, ma se vuoi mettere una inserzione o affittare una casa la registrazione è necessaria.'],
            ['id' => 3, 'domanda' => 'Come affitto una casa?', 'risposta' =>'É semplicissimo, basta andare nella casa che tu vuoi affittare e cliccare il tasto idoneo.'],
            ['id' => 4, 'domanda' => 'Come creo un annuncio?', 'risposta' =>'Basta registrarsi come locatore andare nella sezione privata e cliccare il bottone apposito'],
            ['id' => 5, 'domanda' => 'Come funziona il motore di ricerca "TrovaCasa.it"?', 'risposta' =>'Il motore di ricerca "TrovaCasa.it" presente sulle pagine del sito si appoggia al database creato appositamente per voi.'],
            ['id' => 6, 'domanda' => 'Posso pubblicizzare i miei servizi tramite il vostro sito?', 'risposta' =>'Contattateci in privato per publlicità e/o collaborazioni'],
            ]);

        DB::table('services')->insert([
            ['id' => 1,  'nome' => 'Locale ricreativo'],
            ['id' => 2,  'nome' => 'Lavatrice'],
            ['id' => 3,  'nome' => 'Wifi'],
            ['id' => 4,  'nome' => 'Posto Auto'],
            ['id' => 5,  'nome' => 'Bagni'],
            ['id' => 6,  'nome' => 'Camino'],
            ['id' => 7,  'nome' => 'Giardino'],
            ['id' => 8,  'nome' => 'Balcone'],
            ['id' => 9,  'nome' => 'Asciugatrice'],
            ['id' => 10,  'nome' => 'TV'],
            ['id' => 11,  'nome' => 'Angolo studio'],
            
        ]);
        
        DB::table('house_services')->insert([
            ['house_id' => 1,  'services_id' => 1,],
            ['house_id' => 2,  'services_id' => 2,],
            ['house_id' => 3,  'services_id' => 3,],
            ['house_id' => 4,  'services_id' => 3,],
            ['house_id' => 5,  'services_id' => 11,],
           
        ]);
        
        DB::table('opzione')->insert([
            ['locatario_id' => 3,  'house_id' => 1,],
            ['locatario_id' => 3,  'house_id' => 2,],
            ['locatario_id' => 3,  'house_id' => 3,],
            ['locatario_id' => 4,  'house_id' => 3,],
            ['locatario_id' => 4,  'house_id' => 4,],
           
        ]);
 
            DB::table('messaggi')->insert([
            ['destinatario' => 'eliaelia', 'mittente' => 'alexalex', 'testo' =>
            'Buongiorno, ho visto il tuo annuncio, volevo chiederti alcune informazioni.', 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'alexalex', 'mittente' => 'eliaelia', 'testo' =>
            "Ciao, chiedi pure", 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'eliaelia', 'mittente' => 'alexalex', 'testo' =>
            "Vorrei sapere quanto dista l' Università dall' abitazione che hai messo in vendita", 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'alexalex', 'mittente' => 'eliaelia', 'testo' =>
            "Dovrebbe distare circa 5 minuti con l' autobus o 10 minuti a piedi", 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'lorelore', 'mittente' => 'lariolario', 'testo' =>
            'Buongiorno, ho visto il tuo annuncio, volevo chiederti alcune informazioni.', 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'lariolario', 'mittente' => 'lorelore', 'testo' =>
            "Ciao, chiedi pure", 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'lorelore', 'mittente' => 'lariolario', 'testo' =>
            "Vorrei sapere quanto dista l' Università dall' abitazione che hai messo in vendita", 'dataOraInvio' => date("Y-m-d H:i:s")],
            ['destinatario' => 'lariolario', 'mittente' => 'lorelore', 'testo' =>
            "Dovrebbe distare circa 5 minuti con l' autobus o 10 minuti a piedi", 'dataOraInvio' => date("Y-m-d H:i:s")],
             ]);
        
        
            DB::table('chat')->insert([
            ['user1' => 'alexalex', 'user2' => 'eliaelia'],
            ['user1' => 'lorelore', 'user2' => 'alexalex'],
            ['user1' => 'lorelore', 'user2' => 'lariolario'],
            /*['user1' => 'eliaelia', 'user2' => 'lariolario'],*/
            ]);   
            
            }
            
}