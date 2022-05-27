<!-- ***** Logo Start ***** -->
<a href="{{ url('locatore') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ route('locatore') }}" title="Va alla Home del Locatore">Torna alla home</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Lista delle richieste ricevute">Visualizza richieste</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Inserisci nuovo alloggio">Inserisci alloggio</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Modifica i tuoi alloggi">Modifica alloggi</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Elimina i tuoi alloggi">Elimina alloggi</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Va alle chat">Sezione messaggistica</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Modificare dati personali">Modifica dati utente</a></li>
        @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
</ul>

<!-- ***** INSERIRE ALTRI COMANDI NAVBAR PER VARI TIPI DI UTENTI ***** -->

<!-- ***** Navbar End ***** -->

<!-- ***** Menu Start ***** -->
<a class='menu-trigger'>
    <span>Menu</span>
</a>

<!-- ***** Menu End ***** -->
