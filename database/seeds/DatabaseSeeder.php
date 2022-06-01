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
            ['nome' => 'Luca', 'cognome' => 'Tore', 'età' => 20, 'genere' => 'M', 'email' => 'loca@loca.it', 
                'cellulare' => '334567890', 'username' => 'lorelore','password' => Hash::make('i4z5zipq'), 'livello' => 'locatore',],
            ['nome' => 'Luca', 'cognome' => 'Tario', 'età' => 69, 'genere' => 'M', 'email' => 'lario@lario.it', 
                'cellulare' => '335567890', 'username' => 'lariolario','password' => Hash::make('i4z5zipq'), 'livello' => 'locatario',],
            ['nome' => 'Alex', 'cognome' => 'Alex', 'età' => 69, 'genere' => 'M', 'email' => 'lari@lario.it', 
                'cellulare' => '335567891', 'username' => 'alexalex','password' => Hash::make('alexalex'), 'livello' => 'locatario',],
            ['nome' => 'Elia', 'cognome' => 'Elia', 'età' => 69, 'genere' => 'M', 'email' => 'lar@lario.it', 
                'cellulare' => '335567892', 'username' => 'eliaelia','password' => Hash::make('eliaelia'), 'livello' => 'locatore',],
            ['nome' => 'Tommi', 'cognome' => 'Tommi', 'età' => 69, 'genere' => 'M', 'email' => 'la@lario.it', 
                'cellulare' => '335567893', 'username' => 'tommitommi','password' => Hash::make('tommitommi'), 'livello' => 'admin',],
        ]);
        

        DB::table('houses')->insert([
            ['id' => 1, 'locatore_id' => 6, 'titolo' => 'Appartamento1', 'prezzo' => 280, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 3, 'n_posti_letto_totali' => 3, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Simeoni, 6', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'età_min' => '18', 
                'superficie' => '150','immagine' => 'casa1.jpg']
        ]);
            
        DB::table('houses')->insert([
            ['id' => 2, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '22', 'superficie' => '250']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 3, 'locatore_id' => 5, 'locatore_id' => 5, 'titolo' => 'Appartamento3', 'prezzo' => 370, 'descrizione' => 'Appartamento situato in periferia, a 10 minuti a piedi dalla fermata del pullman. Presenti due bagni, una cucina e un ampio salone, wi-fi, posto auto',
                'tipologia' => 'appartamento', 'n_camere' => 3, 'n_posti_letto_totali' => 5, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Pinocchio, 24', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'M', 
                'età_min' => '20', 'superficie' => '200','immagine' => 'casa3.jpg']
        ]);
         
        DB::table('houses')->insert([
            ['id' => 4, 'locatore_id' => 5, 'titolo' => 'Appartamento4', 'prezzo' => 200, 'descrizione' => 'Appartamento situato in pieno centro, a 10 minuti di autobus dalla facoltà di Ingegneria . Presente un bagno, una cucina e un salone, wi-fi,asciugatrice',
                'tipologia' => 'appartamento', 'n_camere' => 2, 'n_posti_letto_totali' => 2, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Martin Luther King, 6', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => null, 
                'età_min' => null, 'età_max' => '30', 'superficie' => '70','immagine' => 'casa4.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 5, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa5.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 6, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa6.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 7, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa7.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 8, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa8.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 9, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa9.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 10, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa10.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 11, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa11.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 12, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa12.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 13, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa13.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 14, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa14.jpg']
        ]);
        
        DB::table('houses')->insert([
            ['id' => 15, 'locatore_id' => 5, 'titolo' => 'Appartamento2', 'prezzo' => 480, 'descrizione' => 'Appartamento situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'appartamento', 'n_camere' => 4, 'n_posti_letto_totali' => 6, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg']
        ]);
        DB::table('houses')->insert([
            ['id' => 16, 'locatore_id' => 5, 'titolo' => 'Posto Letto Singolo', 'prezzo' => 480, 'descrizione' => 'Posto Letto situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'posto_letto_singolo', 'n_camere' => 1, 'n_posti_letto_totali' => 1, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg']
        ]);
        DB::table('houses')->insert([
            ['id' => 17, 'locatore_id' => 5, 'titolo' => 'Posto Letto Doppio', 'prezzo' => 480, 'descrizione' => 'Posto Letto situato in pieno centro, 250m dalla fermata principale del pullman, a 2 minuti a piedi da piazza Cavour. Presenti due bagni, una cucina e un ampio salone',
                'tipologia' => 'posto_letto_doppio', 'n_camere' => 1, 'n_posti_letto_totali' => 2, 'data_inserimento' => date("Y-m-d H:i:s"),
                'indirizzo' => 'Via Marcelletta, 17', 'cap' => '60121','città' => 'Ancona', 'provincia' => 'AN', 'genere' => 'F', 
                'età_min' => '30', 'superficie' => '250','immagine' => 'casa15.jpg']
        ]);
        

/*          DB::table('product')->insert([
            ['name' => 'NetBook Modello2', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook2', 'descLong' => self::DESCPROD,
                'price' => 219.34, 'discountPerc' => 12, 'discounted' => 0, 'image' => ''],
            ['name' => 'HardDisk Modello2', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk2', 'descLong' => self::DESCPROD,
                'price' => 86.37, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Italy.gif'],
            ['name' => 'Desktop Modello1', 'catId' => 3,
                'descShort' => 'Caratteristiche Desktop1', 'descLong' => self::DESCPROD,
                'price' => 1230.49, 'discountPerc' => 25, 'discounted' => 1, 'image' => 'Brazil.gif'],
            ['name' => 'Laptop Modello1', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 455.37, 'discountPerc' => 17, 'discounted' => 1, 'image' => ''],
            ['name' => 'Laptop Modello2', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 1889.67, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Argentina.gif'],
            ['name' => 'Netbook Modello3', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook3', 'descLong' => self::DESCPROD,
                'price' => 259.99, 'discountPerc' => 17, 'discounted' => 0, 'image' => 'Red Apple.gif'],
            ['name' => 'Laptop Modello3', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop3', 'descLong' => self::DESCPROD,
                'price' => 998.99, 'discountPerc' => 23, 'discounted' => 1, 'image' => 'UK.gif'],
            ['name' => 'HardDisk Modello1', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk1', 'descLong' => self::DESCPROD,
                'price' => 88.93, 'discountPerc' => 5, 'discounted' => 0, 'image' => 'USA.gif'],
            ['name' => 'HardDisk Modello4', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk4', 'descLong' => self::DESCPROD,
                'price' => 78.66, 'discountPerc' => 7, 'discounted' => 01, 'image' => 'Ukraine.gif']
        ]);*/
        
        DB::table('faqs')->insert([
            ['id' => 1, 'domanda' => 'Di cosa tratta questo sito?', 'risposta' =>"Il nostro sito è classificabile come un sito dedicato agli annunci d'affitto"],
            ['id' => 2, 'domanda' => 'Devo essere registrato per usufruire del vostro sito?', 'risposta' =>'Si, nella home page potrai visualizzare le case, ma se vuoi mettere una inserzione o affittare una casa la registrazione è necessaria.'],
            ['id' => 3, 'domanda' => 'Come affitto una casa?', 'risposta' =>'É semplicissimo, basta andare nella casa che tu vuoi affittare e cliccare il tasto idoneo.'],
            ['id' => 4, 'domanda' => 'Come creo un annuncio?', 'risposta' =>'Basta registrarsi come locatore andare nella sezione privata e cliccare il bottone apposito'],
            ['id' => 5, 'domanda' => 'Come funziona il motore di ricerca "TrovaCasa.it"?', 'risposta' =>'Il motore di ricerca "TrovaCasa.it" presente sulle pagine del sito si appoggia al database creato appositamente per voi.'],
            ['id' => 6, 'domanda' => 'Posso pubblicizzare i miei servizi tramite il vostro sito?', 'risposta' =>'Contattateci in privato per publlicità e/o collaborazioni'],
            ]);
/*        
        DB::table('category')->insert([
            ['catId' => 1, 'name' => 'Computer', 'parId' => 0, 'desc' => 'Desktop, Laptop, Netbook'],
            ['catId' => 2, 'name' => 'Periferiche', 'parId' => 0, 'desc' => 'Hard Disk, Tastiere, Mouse'],
            ['catId' => 3, 'name' => 'Desktop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Desktop'],
            ['catId' => 4, 'name' => 'Laptop', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Laptop'],
            ['catId' => 5, 'name' => 'NetBook', 'parId' => 1, 'desc' => 'Descrizione dei Prodotti Netbook'],
            ['catId' => 6, 'name' => 'HardDisk', 'parId' => 2, 'desc' => 'Descrizione dei Dischi Rigidi'],
        ]);
 */
        DB::table('services')->insert([
            ['id' => 1, 'house_id' => 1, 'nome' => 'Locale ricreativo', 'presente' => 1],
            ['id' => 2, 'house_id' => 1, 'nome' => 'Lavatrice', 'presente' => 1],
            ['id' => 3, 'house_id' => 3, 'nome' => 'Wifi',  'presente' => 1],
            ['id' => 4, 'house_id' => 3, 'nome' => 'Posto Auto',  'presente' => 1],
            ['id' => 5, 'house_id' => 4, 'nome' => 'Asciugatrice',  'presente' => 1],
            ['id' => 6, 'house_id' => 4, 'nome' => 'Wifi',  'presente' => 1],
            ['id' => 7, 'house_id' => 4, 'nome' => 'Lavatrice', 'presente' => 1],
        ]);
 /* 

        DB::table('product')->insert([
            ['name' => 'NetBook Modello2', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook2', 'descLong' => self::DESCPROD,
                'price' => 219.34, 'discountPerc' => 12, 'discounted' => 0, 'image' => ''],
            ['name' => 'HardDisk Modello2', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk2', 'descLong' => self::DESCPROD,
                'price' => 86.37, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Italy.gif'],
            ['name' => 'Desktop Modello1', 'catId' => 3,
                'descShort' => 'Caratteristiche Desktop1', 'descLong' => self::DESCPROD,
                'price' => 1230.49, 'discountPerc' => 25, 'discounted' => 1, 'image' => 'Brazil.gif'],
            ['name' => 'Laptop Modello1', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 455.37, 'discountPerc' => 17, 'discounted' => 1, 'image' => ''],
            ['name' => 'Laptop Modello2', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop1', 'descLong' => self::DESCPROD,
                'price' => 1889.67, 'discountPerc' => 15, 'discounted' => 1, 'image' => 'Argentina.gif'],
            ['name' => 'Netbook Modello3', 'catId' => 5,
                'descShort' => 'Caratteristiche NetBook3', 'descLong' => self::DESCPROD,
                'price' => 259.99, 'discountPerc' => 17, 'discounted' => 0, 'image' => 'Red Apple.gif'],
            ['name' => 'Laptop Modello3', 'catId' => 4,
                'descShort' => 'Caratteristiche Laptop3', 'descLong' => self::DESCPROD,
                'price' => 998.99, 'discountPerc' => 23, 'discounted' => 1, 'image' => 'UK.gif'],
            ['name' => 'HardDisk Modello1', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk1', 'descLong' => self::DESCPROD,
                'price' => 88.93, 'discountPerc' => 5, 'discounted' => 0, 'image' => 'USA.gif'],
            ['name' => 'HardDisk Modello4', 'catId' => 6,
                'descShort' => 'Caratteristiche HardDisk4', 'descLong' => self::DESCPROD,
                'price' => 78.66, 'discountPerc' => 7, 'discounted' => 01, 'image' => 'Ukraine.gif']
        ]);*/

    }

}
