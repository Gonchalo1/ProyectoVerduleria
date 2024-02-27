<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function getToken() 
    {
        $token = csrf_token();
        return response()->json(['token' => $token]);
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        // Obtener el token CSRF
        $token = csrf_token();
        
        // Construir los datos del nuevo usuario
        $userData = [
            'nombre' => $request->input('nombre'),
            // Completa con el resto de campos del usuario
        ];

        // Realizar la solicitud POST al backend
        $response = Http::withHeaders([
            'X-CSRF-TOKEN' => $token, // Incluir el token CSRF en las cabeceras
        ])->post('http://127.0.0.1:8000/usuarios', $userData);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // La solicitud fue exitosa, puedes manejar la respuesta aquí
            return $response->json();
        } else {
            // La solicitud falló, puedes manejar el error aquí
            return response()->json(['error' => 'Error en la solicitud'], $response->status());
        }
    }
}
