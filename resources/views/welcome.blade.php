<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="../css/stilus.css" rel="stylesheet" type="text/css" />
    <script src="../js/ajax.js"></script>
    <script src="../js/bejegyzes.js"></script>
    <script src="../js/script.js"></script>

    <title>Laravel</title>

</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Bejelentkezés</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Regisztrálás</a>
            @endif
            @endauth
        </div>
        @endif



        <article>
            <form action="">
                @if(Session::has('sikeres'))
                <div class="alert alert-sikeres">{{Session::get('sikeres')}}</div>
                @endif
                @csrf
                <fieldset>
                    <legend>Mit tettél ma a földért?</legend>

                    <select name="osztaly_id" id="osztaly_id">
                        <option value="1">1.osztaly</option>
                        <option value="2">2.osztaly</option>
                    </select>

                    <select name="tevekenyseg_id" id="tevekenyseg_id">
                        <option value="1">Fa ültetés</option>
                        <option value="2">Biciglziés</option>
                        <option value="3">stb</option>
                    </select>

                    <input type="button" class="kuld" value="Küld">
                </fieldset>
            </form>
            <article id="sablonhoz">
                <table>
                    <tr class="bejegyzes">
                        <td class="osztaly_id"></td>
                        <td class="tevekenyseg_nev"></td>
                        <td class="pontszam"></td>
                        <td class="allapot"></td>
                    </tr>
                </table>
            </article>

            <section class="diagram">

            </section>
            <section class="szures">
                <div>
                    <form>
                        <label for="kereso">Keresés:</label>
                        <input type="text" id="kereso">
                    </form>
                </div>
                <div>
                    <select id="rendezesiszempont">
                        <option value="alap">Rendezés pontszám alapján</option>
                        <option value="RendezNo">Pont szerint növekvő</option>
                        <option value="RendezCsokken">Pont szerint csökkenő</option>
                    </select>
                </div>
            </section>
            <table>
                <thead>
                    <tr>
                        <th>Osztály</th>
                        <th>Tevékenység</th>
                        <th>Pont</th>
                        <th>Státusz</th>
                    </tr>
                </thead>
                <tbody class="bejegyzes_tabla">

                </tbody>
            </table>

        </article>

    </div>
</body>

</html>