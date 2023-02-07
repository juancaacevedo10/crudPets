<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $appointment = Appointment::all();
        $events =[];
        foreach ($appointment as $event){
            $events[]=[
                'title'=>$event->id,
                'start'=>$event->appointment_date,
                'end'=>$event->appointment_time,
            ];
        }


        $pets=$request->user()->pets()->get();

        
        return view('calendar.index',compact('pets','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'id_pet'=>'required|max:255',
            'name_pet'=>'required|max:255',
            'typePet'=>'required'

        ]);
        $request->user()->pets()->create([
            'id_pet'=> $request->id_pet,
            'pet_name'=>$request->name_pet,
            'pet_type'=>$request->typePet,
        ]);

        return redirect(to:'/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $pet)
    {
        //    
        $pets = Pet::find($pet);


        if(empty($pets)){
            return redirect(to:'/calendar');
        }

        $pets->pet_name=$request->name_pet;
        $pets->pet_type=$request->typePet;
        $pets->save();  
        return redirect(to:'/calendar');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pet)
    {
        

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($pet)
    {
        //
        $pets = Pet::find($pet);
        if(empty($pets)){
            return redirect(to:'/calendar');
        }
        $pets->delete();
        return redirect(to:'/calendar');
    }
}
