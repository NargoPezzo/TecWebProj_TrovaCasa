<!-- ***** Logo Start ***** -->
<a href="{{ url('home') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <!-- MODIFICARE ROTTE!!! -->
    <li><a href="{{ route('admin') }}" title="Va alla Home di Admin">Home</a></li>
    <li><a href="{{ route('') }}" title="Visualizza le statistiche">Catalogo</a></li>
    <li><a href="{{ route('newproduct') }}" title="Inserisce nuovi prodotti">Inserisci</a></li>
    <li><a href="{{ route('admin') }}" title="Modifica i Prodotti">Modifica</a></li>
    <li><a href="{{ route('admin') }}" title="Cancella o prodotti">Cancella</a></li>
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth
    
    
    <li><a href="{{ route('offerte') }}" title="Il nostro catalogo">Offerte</a></li>
    <li><a href="{{ route('chisiamo') }}" title="La nostra azienda">Chi Siamo</a></li>
    <li><a href="{{ route('dovesiamo') }}" title="Dove potete trovarci">Dove Siamo</a></li>
    <li><a href="mailto:info@trovacasa.it" title="Scrivici pure">Contattaci</a></li>
    <li><a href="{{ route('faq') }}" title="Risposte alle domande più comuni">F.A.Q.</a></li>
    <li><a href="{{ route('condizioni') }}" title="Condizioni generali d' uso">Condizioni</a></li>
    <li><a href="{{ route('login') }}" title="Iscriviti o Accedi">Login / Sign Up</a></li>
</ul>

<!-- ***** INSERIRE ALTRI COMANDI NAVBAR PER VARI TIPI DI UTENTI ***** -->

<!-- ***** Navbar End ***** -->

<!-- ***** Menu Start ***** -->
<a class='menu-trigger'>
    <span>Menu</span>
</a>

<!-- ***** Menu End ***** -->
