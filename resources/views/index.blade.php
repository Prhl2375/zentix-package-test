<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Контакти</title>
    <link rel="stylesheet" href="{{asset("prhl2375/zentix-package-test/css/styles.css")}}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
<div class="container">
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <h2>Додати контакт</h2>
        <form id="contactForm" action="{{route("zentixpackage.store")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="first_name">Ім'я:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Прізвище:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group phone-group">
                <label>Телефон:</label>
                <div class="phone-field">
                    <input type="text" name="phones[]" required>
                    <button type="button" class="btn-add-phone">+</button>
                </div>
            </div>
            <button type="submit" class="btn-submit">Додати</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Список контактів</h2>
        <table id="contactsTable">
            <thead>
            <tr>
                <th>Ім'я</th>
                <th>Прізвище</th>
                <th>Телефони</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact['first_name']}}</td>
                    <td>{{$contact['last_name']}}</td>
                    <td>
                        <ul>
                            @foreach($contact['phones'] as $phone)
                                <li>{{$phone["phone"]}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <form action="{{route("zentixpackage.destroy", $contact['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{$contacts->links()}}
        </div>
    </div>
</div>
<script src="{{asset("prhl2375/zentix-package-test/js/script.js")}}"></script>
</body>
</html>
