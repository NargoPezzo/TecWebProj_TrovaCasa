require('./bootstrap');

$().ready(function() {
    // Selezione form e definizione dei metodi di validazione
    $("#form").validate({
        // Definiamo le nostre regole di validazione
        rules : {
            nome : {
                required : true
            },
            cognome : {
                required : true
            },
            età : {
                required : true,
                digits : true
            },
            genere : {
                required : true
            },
            email : {
                required : true,
                // Definiamo il campo email come un campo di tipo email
                email : true
            },
            cellulare : {
                required : true,
                digits : true,
                maxlength : 14
            },
            username : {
                required : true,
                minlength : 8
            },
            
            password : {
                required : true,
                // Settiamo la lunghezza minima e massima per il campo password
                minlength : 8
            }
        },
        // Personalizzimao i mesasggi di errore
        messages: {
            login: "Inserisci la login",
            password: {
                required: "Inserisci una password",
                minlength: "La password deve essere lunga minimo 5 caratteri",
                maxlength: "La password deve essere lunga al massimo 8 caratteri"
            },
            email: "Inserisci la tua email correttamente"
            
            /////////////////////altre!!!
        },
        // Settiamo il submit handler per la form
        submitHandler: function(form) {
            form.submit();
        }
    });
});
