<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Our Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-app-layout>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<div class="container mx-auto mt-10">
    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Welkom</h1>
        <p class="text-gray-700 text-lg mb-6">
            Bij NatHomes, Helpen wij je perfecte huis te vinden. Of je nu wilt kopen of huren, onze missie is om jou de beste huizen te tonen.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Onze missie</h2>
        <p class="text-gray-700 text-lg">
            Onze missie is simpel: het kopen van huizen zo makkelijk mogelijk te maken. Wij hebben een breed aanbod, van betaalbaar tot luxe, alles speciaal voor u gemaakt.
        </p>

        <h2 class="text-2xl font-semibold text-gray-800 mb-2"><a href="{{ route('houses.list') }}">Bekijk huizen</a></h2>
    </div>
</div>

</body>
    </x-app-layout>
</html>
