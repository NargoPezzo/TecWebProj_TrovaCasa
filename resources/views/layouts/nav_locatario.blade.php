<!-- ***** Logo Start ***** -->
<a href="{{ url('locatario') }}" class="logo">
    <img src="assets/images/logo.png">
                            
</a>
<!-- ***** Logo End ***** -->

<!-- ***** Navbar Start ***** -->
<ul class='nav'>
    <li><a href="{{ url('locatario') }}" title="Va alla Home del Locatario">Torna alla home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Account</a>
                                <ul>
                                    <li><a href="{{ route('chisiamo') }}" title="Va alle chat">Sezione messaggistica</a></li>
                                    <li><a href="{{ route('modificautente') }}" title="Modificare dati personali">Modifica dati utente</a></li>
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
