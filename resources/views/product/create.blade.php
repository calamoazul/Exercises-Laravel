<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Crear Producto</title>
</head>
<body class="bg-amber-950 flex flex-col justify-center w-full h-full items-center">
    <form action="{{ route('products.store') }}" method="post" class="grid grid-cols-1 gap-3 p-7 m-auto bg-amber-700 text-white">
        @csrf
        <label for="name">Nombre</label>
        <input class="text-dark" type="text" name="name" id="">
        <label for="description">Descripción</label>
        <input class="text-dark" type="text" name="description" id="">
        <label for="price">Precio</label>
        <input class="text-dark" type="number" name="price" id="">
        <input class="bg-amber-950 p-4" type="submit" value="Enviar">
    </form>
    <form action="{{ route('products.destroy', 1) }}" method="post" class="grid grid-cols-1 mt-5 gap-3 p-7 m-auto bg-amber-700 text-white">
        @csrf
        @method('DELETE')
        <input class="bg-amber-950 p-4" type="submit" value="Borrar">
    </form>
</body>
</html>