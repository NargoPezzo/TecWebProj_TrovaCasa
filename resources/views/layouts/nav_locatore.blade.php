<!-- ***** Logo Start ***** -->
<a href="{{ url('locatore') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ route('locatore') }}" title="Va alla Home del Locatore">Torna alla home</a></li>
    
    
                            <li class="submenu">
                                <a href="javascript:;">Alloggio</a>
                                <ul>
                                    <li><a href="{{ route('chisiamo') }}" title="Inserisci un alloggio">Inserisci Alloggio</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Modifica un alloggio">Modifica Alloggio</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Elimina un alloggio">Elimina Alloggio</a></li>
                                    
                                </ul>
                            </li>
                            
                            <li class="submenu">
                                <a href="javascript:;">Account</a>
                                <ul>
                                    <li><a href="{{ route('chisiamo') }}" title="Lista delle richieste ricevute">Visualizza Richieste</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Modificare dati personali">Sezione messaggistica</a></li>
                                    <li><a href="{{ route('chisiamo') }}" title="Modificare dati personali">Modifica dati utente</a></li>
                                    @auth
                                    <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                        </form>
                                @endauth
                                </ul>
                            </li>
    
    
        
</ul>

<!-- ***** INSERIRE ALTRI COMANDI NAVBAR PER VARI TIPI DI UTENTI ***** -->

<!-- ***** Navbar End ***** -->

<!-- ***** Menu Start ***** -->
<a class='menu-trigger'>
    <span>Menu</span>
</a>

<!-- ***** Menu End ***** -->
