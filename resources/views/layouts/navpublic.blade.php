<!-- ***** Logo Start ***** -->
<a href="{{ url('home') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ route('offerte') }}" title="Il nostro catalogo">Offerte</a></li>
    <li><a href="{{ route('chisiamo') }}" title="La nostra azienda">Chi Siamo</a></li>
    <li><a href="{{ route('dovesiamo') }}" title="Dove potete trovarci">Dove Siamo</a></li>
    <li><a href="mailto:info@trovacasa.it" title="Scrivici pure">Contattaci</a></li>
    <li><a href="{{ route('faq') }}" title="Risposte alle domande più comuni">F.A.Q.</a></li>
    <li><a href="{{ route('condizioni') }}" title="Condizioni generali d' uso">Condizioni</a></li>
    
    @can('isAdmin')
        <li><a href="{{ route('admin') }}" class="highlight" title="Home Admin">Home Admin</a></li>
    @endcan
    @can('isLocatore')
        <li><a href="{{ route('admin') }}" class="highlight" title="Home Locatore">Home Locatore</a></li>
    @endcan
    @can('isLocatario')
        <li><a href="{{ route('locatario') }}" class="highlight" title="Home Locatario">Home Locatario</a></li>
    @endcan
    @auth
        <li><a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth  
    @guest
        <li><a href="{{ route('login') }}" title="Iscriviti o Accedi">Login / Registrati</a></li>
    @endguest
</ul>

<!-- ***** Navbar End ***** -->

<!-- ***** Menu Start ***** -->
<a class='menu-trigger'>
    <span>Menu</span>
</a>

<!-- ***** Menu End ***** -->