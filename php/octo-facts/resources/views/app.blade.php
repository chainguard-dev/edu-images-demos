<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-600 via-indigo-500 to-blue-950">

    <div class="container max-w-xl mx-auto my-10 bg-gray-50 rounded-md shadow-lg p-4">
        <h1 class="text-4xl font-bold underline pb-10">
            Octopus Facts!
        </h1>

        <img src="img/{{ $image }}" alt="Octopus facts"/>
        <p class="text-2xl text-center py-4">{{ $fact->fact }}</p>
        <p class="text-sm text-center mt-10 mb-4 text-gray-600">Images from <a href="https://unsplash.com" class="underline" title="https://unsplash.com">Unsplash</a>, facts from <a href="https://en.wikipedia.org/wiki/Octopus" class="underline" title="Wikipedia">Wikipedia</a>. </p>
    </div>
</body>
</html>
