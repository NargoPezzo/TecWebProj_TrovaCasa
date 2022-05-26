<!-- ***** Logo Start ***** -->
<a href="{{ url('home') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ route('user') }}" title="Va alla Home del Locatore">Torna alla home</a></li>
    <li><a href="{{ route('newproduct') }}" title="Lista delle richieste ricevute">Visualizza richieste</a></li>
    <li><a href="{{ route('newproduct') }}" title="Inserisci nuovo alloggio">Inserisci alloggio</a></li>
    <li><a href="{{ route('newproduct') }}" title="Modifica i tuoi alloggi">Modifica alloggi</a></li>
    <li><a href="{{ route('newproduct') }}" title="Elimina i tuoi alloggi">Elimina alloggi</a></li>
    <li><a href="{{ route('catalog1') }}" title="Va alle chat">Sezione messaggistica</a></li>
    <li><a href="{{ route('user') }}" title="Modificare dati personali">Modifica dati utente</a></li>
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
