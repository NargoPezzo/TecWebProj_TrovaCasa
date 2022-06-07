<!-- ***** Logo Start ***** -->
<a href="{{ url('home') }}" class="logo">
    <img src="{{ asset('assets/images/logo.png')}}">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ route('offerte') }}" title="Il nostro catalogo">Offerte</a></li>
    <li><a href="{{ route('chisiamo') }}" title="La nostra azienda">Chi Siamo</a></li>
    <li><a href="{{ route('dovesiamo') }}" title="Dove potete trovarci">Dove Siamo</a></li>
    <li><a href="mailto:info@trovacasa.it" title="Scrivici pure">Contattaci</a></li>
    <li><a href="{{ route('condizioni') }}" title="Condizioni generali d' uso">Condizioni</a></li>
    
    @cannot('isAdmin')
    <li><a href="{{ route('faq') }}" title="Risposte alle domande più comuni">F.A.Q.</a></li>
    @endcan
    
    @can('isAdmin')
    <li><a href="{{ route('statistiche') }}" title="Visualizza le statistiche">Statistiche</a></li>
    <li class="submenu">
        <a href="javascript:;">F.A.Q</a>
            <ul>
                <li><a href="{{ route('inseriscifaq') }}" title="Inserisci FAQ">Inserisci Nuova FAQ</a></li>
                <li><a href="{{ route('faq') }}" title="Gestisci FAQ">Gestisci/Visualizza FAQ</a></li>
            </ul>
    </li>
   
    @endcan
    
    @guest
        <li><a href="{{ route('login') }}" title="Iscriviti o Accedi">Login / Registrati</a></li>
    @endguest
    
    @can('isLocatore')
        <li class="submenu">
            <a href="javascript:;">Alloggio</a>
            <ul>
                <li><a href="{{ route('chisiamo') }}" title="Lista delle richieste ricevute">Visualizza Richieste</a></li>
                <li><a href="{{ route('inseriscialloggio') }}" title="Inserisci un alloggio">Inserisci Alloggio</a></li>
                <li><a href="{{ route('gestiscialloggi') }}" title="Gestisci Alloggi">Gestisci Alloggi</a></li>
                
            </ul>
        </li>
    @endcan    
    
    @auth
        <li class="submenu">
            <a href="javascript:;">Account</a>
                <ul>
                    @can('isLocatore')
                    
                    <li><a href="{{ route('modificalocatore') }}" title="Modificare dati personali">Modifica dati utente</a></li>
                    @endcan
                    
                    @can('isLocatario')
                    <li><a href="{{ route('modificalocatario') }}" title="Modificare dati personali">Modifica dati utente</a></li>
                    @endcan
                    
                    @cannot('isAdmin')
                    <li><a href="{{ route('messaggistica') }}" title="Va alle chat">Sezione messaggistica</a></li>
                    @endcan
                    
                    <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                    
                                    
                </ul>
        </li>
    @endauth
</ul>

<!-- ***** Navbar End ***** -->

<!-- ***** Menu Start ***** -->
<a class='menu-trigger'>
    <span>Menu</span>
</a>

