<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// Usar el modelo Libro
use App\Models\Libro;



class LibroController extends Controller
{
    /**
     * Mostrar lista de libros (Consulta)
     */
    public function index()
    {
        // Obtener todos los registros de libros
        $libros = Libro::all();
        // Se manda la variable de los registros a la vista
        return view('libros.index', compact('libros'));
    }

    /**
     * Mostrar la vista para el formulario
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Guardar en la base de datos
     */
    public function store(Request $request)
    {
        Libro::create([
            // <NombreFormulario> => $request-><NombreBD>
            'nombre' => $request->nombre,
            'autor' => $request->autor,
            'editorial' => $request->editorial,
            'precio' => $request->precio
        ]);
        // Redirección a una ruta específica
        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Editar registro
     */
    public function edit(Libro $libro)
    {
        // Se manda la vista para la consulta de 1 registro
        return view('libros.edit', compact('libro'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Libro $libro)
    {
        // Se hace una validación del listado de campos.
        $request->validate([
            'nombre' => 'required',
            'autor' => 'required',
            'editorial' => 'required',
            'precio' => 'required'
        ]);   

        // Se realiza la actualización de todos los registros
        $libro->update($request->all());

        // Se retorna el estado de la actualización al index
        return redirect()->route('libros.index')
        ->with('success', 'Actualización exitosa :D');
    }

    /**
     * ELIMINAR
     */
    public function destroy(Libro $libro)
    {
        // Se usa la función delete() para
        // borrar el registro
        $libro -> delete();

        return redirect()->route('libros.index')
        ->with('success', 'Libro eliminado');

    }

    // CONSULTAR LIBROS DE API
    public function home(){
        // Se maneja la respuesta con la URL base de la API
        $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
            // Se incluyen los parámetros de la consulta a la API con GET
            'q' => 'subject:fiction',
            'maxResults' => 12,
            'key' => config('services.google_books.key')
        ]);

        // En una variable se guarda el resultado JSON
        // ['items'] hace referencia a las propiedades del libro
        $libros = $response->json()['items'] ?? [];

        return view('libros.home', compact('libros')); 
    }
}
