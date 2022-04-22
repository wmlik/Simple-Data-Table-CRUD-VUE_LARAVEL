<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all()->toArray();
        return array_reverse($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient([
                'num_securite_sociale' => $request->input('num_securite_sociale'),
                'caisse' => $request->input('caisse'),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'etat_civile' => $request->input('etat_civile'),
                'date_naiss' => $request->input('date_naiss'),
                'adresse' => $request->input('adresse'),
                'tel' => $request->input('tel'),
                'image' => $request->input('image'),
                
        ]);
        $patient->save();
        return response()->json('Patient créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return response()->json($patient);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->update($request->all());
        return response()->json('Patient MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $patient = Patient::find($id);
        $patient->delete();
        return response()->json('Patient supprimé !');
    }
}
