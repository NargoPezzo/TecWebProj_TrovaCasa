<!-- ***** Logo Start ***** -->
<a href="{{ url('/home') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <!-- MODIFICARE ROTTE!!! -->
    <li><a href="{{ route('home') }}" title="Va alla Home dell'Admin">Torna alla home</a></li>
    <li><a href="{{ route('chisiamo') }}" title="Visualizza le statistiche">Statistiche</a></li>
                            <li class="submenu">
                                <a href="javascript:;">F.A.Q</a>
                                <ul>
                                    <li><a href="{{ route('inseriscifaq') }}" title="Inserisci nuova FAQ">Inserisci FAQ</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Modifica le FAQ">Modifica FAQ</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Elimina le FAQ">Elimina FAQ</a></li>
                                </ul>
                            </li>
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
