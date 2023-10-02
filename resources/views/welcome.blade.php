<!DOCTYPE html>
<html>
<head>
    <title>Ma Page d'Accueil</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Ma Page d'Accueil</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            @auth
                <li><a href="/dashboard">Tableau de Bord</a></li>
                <li><a href="/profil">Mon Profil</a></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="/login">Connexion</a></li>
                <li><a href="/register">Inscription</a></li>
            @endauth
        </ul>
    </nav>

    <main>
    @auth
        <!-- Contenu pour les utilisateurs connectés -->
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
            <p>Contenu réservé aux utilisateurs connectés.</p>
    @else
        <!-- Contenu pour les utilisateurs non connectés -->
            <p>Bienvenue, visiteur!</p>
            <p>Contenu pour les utilisateurs non connectés.</p>
        @endauth
    </main>
</div>
</body>
</html>
