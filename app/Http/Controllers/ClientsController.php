<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    public function index(Request $request) {
        
        $search = $request->search;
        $data = Clients::where(function ($query) use ($search) {
        $query->where('first_name', 'like', '%'.$search.'%')
              ->orWhere('middle_name', 'like', '%'.$search.'%')
              ->orWhere('last_name', 'like', '%'.$search.'%')
              ->orWhere('father_first_name', 'like', '%'.$search.'%')
              ->orWhere('father_middle_name', 'like', '%'.$search.'%')
              ->orWhere('father_last_name', 'like', '%'.$search.'%')
              ->orWhere('email', 'like', '%'.$search.'%')
              ->orWhere('phone', 'like', '%'.$search.'%')
              ->orWhere('dob', 'like', '%'.$search.'%')
              ->orWhere('aadhar', 'like', '%'.$search.'%')
              ->orWhere('pan_card', 'like', '%'.$search.'%');
            })->get();
        

        return view('client.index', compact('data', 'search'));
    }

    public function create() {
        return view('client.create');
    }
    


    public function store(Request $request)
    {
        // ------------------------
        // VALIDATION (CLEANED)
        // ------------------------
        $validated = $request->validate([
            'first_name'         => 'required|string|max:50',
            'middle_name'        => 'nullable|string|max:50',
            'last_name'          => 'required|string|max:50',

            'father_first_name'  => 'required|string|max:50',
            'father_middle_name' => 'nullable|string|max:50',
            'father_last_name'   => 'required|string|max:50',

            'dob'                => 'required|date|before:today',
            'aadhar'             => 'required|digits:12|unique:clients,aadhar',
            'pan_card'           => 'required|digits:10|unique:clients,pan_card',
            'phone'              => 'required|digits:10',
            'email'              => 'required|email',

            // Address
            'house_no'           => 'nullable|string|max:20',
            'building'           => 'nullable|string|max:50',
            'street'             => 'nullable|string|max:50',
            'landmark'           => 'nullable|string|max:50',
            'area'               => 'nullable|string|max:50',
            'city'               => 'nullable|string|max:50',
            'state'              => 'nullable|string|max:50',
            'pin_code'           => 'nullable|digits:6',

            // Files
            'passport_picture'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'signature'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'aadhar_front'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'aadhar_back'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'pan_card'           => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);


        // ------------------------
        // STORE IN DATABASE
        // ------------------------
        try {

            DB::beginTransaction();

            // Insert client basic details
            $client = Clients::create([
                'first_name'        => $validated['first_name'],
                'middle_name'       => $validated['middle_name'] ?? null,
                'last_name'         => $validated['last_name'],
                'father_first_name' => $validated['father_first_name'],
                'father_middle_name'=> $validated['father_middle_name'] ?? null,
                'father_last_name'  => $validated['father_last_name'],
                'dob'               => $validated['dob'],
                'aadhar'            => $validated['aadhar'],
                'phone'             => $validated['phone'],
                'email'             => $validated['email'],
            ]);

            // Insert Address
            $client->address()->create([
                'client_id' => $client->id,
                'house_no'  => $validated['house_no'] ?? null,
                'building'  => $validated['building'] ?? null,
                'street'    => $validated['street'] ?? null,
                'landmark'  => $validated['landmark'] ?? null,
                'area'      => $validated['area'] ?? null,
                'city'      => $validated['city'] ?? null,
                'state'     => $validated['state'] ?? null,
                'pin_code'  => $validated['pin_code'] ?? null,
            ]);

            // ------------------------
            // FILE UPLOAD HANDLING
            // ------------------------
            $fileFields = [
                'passport_picture',
                'signature',
                'aadhar_front',
                'aadhar_back',
                'pan_card'
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store('clients/'.$client->id, 'public');

                    $client->media()->create([
                        'model_type' => Clients::class,
                        'model_id'   => $client->id,
                        'name'       => $field,
                        'type'       => 'image',
                        'path'       => $path,
                        'url'        => asset('storage/'.$path),
                    ]);
                }
            }

            DB::commit();

        return redirect()->route('admin.client.index')->with('success', 'Client created successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function edit($id){

        $data = Clients::find($id);

        if(!$data){
            return back()->withErrors('Client Not found');
        }

        return view('client.create', compact('data'));
    }


    public function update(Request $request , $id)
    {
        // ------------------------
        // VALIDATION (CLEANED)
        // ------------------------
        $validated = $request->validate([
            'first_name'         => 'required|string|max:50',
            'middle_name'        => 'nullable|string|max:50',
            'last_name'          => 'required|string|max:50',

            'father_first_name'  => 'required|string|max:50',
            'father_middle_name' => 'nullable|string|max:50',
            'father_last_name'   => 'required|string|max:50',

            'dob'                => 'required|date|before:today',
            'aadhar'             => 'required|digits:12',
            'phone'              => 'required|digits:10',
            'email'              => 'required|email',

            // Address
            'house_no'           => 'nullable|string|max:20',
            'building'           => 'nullable|string|max:50',
            'street'             => 'nullable|string|max:50',
            'landmark'           => 'nullable|string|max:50',
            'area'               => 'nullable|string|max:50',
            'city'               => 'nullable|string|max:50',
            'state'              => 'nullable|string|max:50',
            'pin_code'           => 'nullable|digits:6',

            // Files
            'passport_picture'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'signature'          => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'aadhar_front'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'aadhar_back'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'pan_card'           => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);


        // ------------------------
        // STORE IN DATABASE
        // ------------------------
        try {

            DB::beginTransaction();

            // Insert client basic details
            $client = Clients::updateOrcreate(
                ['id' => $id],[
                'first_name'        => $validated['first_name'],
                'middle_name'       => $validated['middle_name'] ?? null,
                'last_name'         => $validated['last_name'],
                'father_first_name' => $validated['father_first_name'],
                'father_middle_name'=> $validated['father_middle_name'] ?? null,
                'father_last_name'  => $validated['father_last_name'],
                'dob'               => $validated['dob'],
                'aadhar'            => $validated['aadhar'],
                'phone'             => $validated['phone'],
                'email'             => $validated['email'],
            ]);

            // Insert Address
            $client->address()->updateOrcreate(
                ['clients_id' => $client->id],
                [
                'house_no'  => $validated['house_no'] ?? null,
                'building'  => $validated['building'] ?? null,
                'street'    => $validated['street'] ?? null,
                'landmark'  => $validated['landmark'] ?? null,
                'area'      => $validated['area'] ?? null,
                'city'      => $validated['city'] ?? null,
                'state'     => $validated['state'] ?? null,
                'pin_code'  => $validated['pin_code'] ?? null,
            ]);

            // ------------------------
            // FILE UPLOAD HANDLING
            // ------------------------
            $fileFields = [
                'passport_picture',
                'signature',
                'aadhar_front',
                'aadhar_back',
                'pan_card','pan_card_receipt'
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store('clients/'.$client->id, 'public');

                    $client->media()->updateOrcreate([
                        'model_type' => Clients::class,
                        'model_id'   => $client->id,
                        'name'       => $field],
                        [
                        'type'       => 'image',
                        'path'       => $path,
                        'url'        => asset('storage/'.$path),
                    ]);
                }
            }

            DB::commit();

        return redirect()->route('admin.client.index')->with('success', 'Client update successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            dd($e->getMessage());
            return back()
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

public function delete($id)
{
    $data = Clients::find($id);

    if (!$data) {
        return back()->withErrors('Client not found');
    }

    // Delete related address if exists
    if ($data->address) {
        $data->address()->delete();
    }

    // Delete related media if exists
    if ($data->media) {
        $data->media()->delete(); // works on morphMany relationship
    }

    // Delete client
    $data->delete();

    return redirect()->route('admin.client.index')->with('success', 'Client deleted successfully');
}
}
