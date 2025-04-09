<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    // get and show all listings
    public function index()
    {

        return view('listings.index', [

            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)

        ]);
    }


    // show single listing
    public function show(Listing $listing)
    {

        return view(
            'listings.show',
            [

                'listing' => $listing
            ]
        );
    }


    // show create form
    public function create()
    {
        // solo retorna la viste de create form
        return view(
            'listings.create'
        );
    }


    // store listing form data
    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formfields = $request->validate([

            'title' => 'required',
            // busca en db "listing" , la tabla 'company',para que no se ingrese una misma compañia
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);


        // store the logo ,if any is provided
        if ($request->hasFile('logo')) {

            // almacena el logo , en la carpeta /storage/app/public/app/logos
            $formfields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // inserta en la db una nueva fila , con los datos del formulario
        Listing::create($formfields);

        return redirect('/')->with("message", "listing created");
    }
}
