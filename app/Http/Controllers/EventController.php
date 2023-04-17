<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventAttendees;

class EventController extends Controller
{
    /*Retorna la vista de inicio con todos los eventos almacenados en la base de datos*/
    public function home()
    {
        $events = Event::all();

        return view('home', compact('events'));
    }

    /*Retorna la vista del listado de eventos creados por el usuario autenticado*/
    public function index()
    {
        $user = auth()->user();
        $events = Event::where('user_id', $user->id)->get();

        return view('index', ['events' => $events]);
    }

    /*Retorna la vista del formulario para crear un nuevo evento*/
    public function create()
    {
        return view('create');
    }

    /*Almacena un nuevo evento en la base de datos con los datos proporcionados por el usuario a través del formulario de creación*/
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $event = new Event;
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['location'];
        $event->date = $validatedData['date'];
        $event->user_id = Auth::user()->id;
        $event->save();

        return redirect('/events')->with('success', 'Evento creado exitosamente!');
    }

    /*Retorna la vista con los detalles de un evento específico*/
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $users = User::all();
        return view('show', compact('event', 'users'));
    }

    /*Retorna la vista para que un usuario registrado pueda inscribirse en un evento específico*/
    public function register($id)
    {
        $event = Event::findOrFail($id);
        return view('show', compact('event'));
    }

    /*Agrega un usuario a un evento específico*/
    public function addUser(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $user = User::findOrFail($request->input('user'));
        $event->users()->syncWithoutDetaching($user); //evito que se repitan usuarios
        $users = User::all();
        return redirect()->route('events.show', ['id' => $event->id])->with('success', 'Usuario añadido exitosamente.');
    }

    /*Retorna la vista del formulario para editar un evento específico*/
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('edit', compact('event'));
    }

    /*Actualiza los detalles de un evento específico con los datos proporcionados por el usuario a través del formulario de edición*/
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['location'];
        $event->date = $validatedData['date'];
        $event->save();

        return redirect('/events')->with('success', 'Evento actualizado exitosamente!');
    }
}
