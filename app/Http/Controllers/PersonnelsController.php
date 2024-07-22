<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController;
use App\Models\personels;
use App\Models\agence;
use Illuminate\Support\Facades\Hash;



class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Get(
     * path="/api/personnels",
     * summary="Get a list of personnels",
     * tags={"personels"},
     * @OA\Response(
     * response=200,
     * description="List of personnels",
     * ),
     * )
     */
    public function index()
    {
        $personnels = personels::all();

        return $personnels->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * @OA\POST(
     * path="/api/personnels",
     * summary="POST to create personnels",
     * tags={"personels"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="fullname", type="string"),
 *             @OA\Property(property="adresse", type="string"),
 *             @OA\Property(property="phone", type="string"),
 *             @OA\Property(property="status", type="string"),
 *             @OA\Property(property="email", type="email"),
 *             @OA\Property(property="password", type="password"),
 *             @OA\Property(property="agence_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create personnels",
 *         @OA\JsonContent(
 *             type="object"
 *         )
 *     )
     * )
     
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
        // $personnels = personels::create($request->all());

         // Validation des données
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'agence_id' => 'required|integer|exists:agences,id',
        ]);

        // Cryptage du mot de passe
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Création de l'agence avec les données validées
        $personels = personels::create($validatedData);


        $response = array_merge($request->all(), ['id' => $personels->id]);

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Put(
     *   path="/api/personnels/{id}",
     *   summary="Update an personnels",
     *   tags={"personels"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the personnels to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="fullname", type="string"),
     *       @OA\Property(property="adresse", type="string"),
     *       @OA\Property(property="phone", type="string"),
     *       @OA\Property(property="status", type="string"),
     *       @OA\Property(property="email", type="email"),
     *       @OA\Property(property="password", type="password"),
     *       @OA\Property(property="agence_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Personnels updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Personnels not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $personnels = personels::findOrFail($id);

        if($personnels->update($request->all())){
            return response()->json([
                'message' => 'success'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

          /**
     * @OA\Delete(
     *   path="/api/personnels/{id}",
     *   summary="Delete an personnels",
     *   tags={"personels"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the personnels to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="personnels deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="personnels not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $personnels=personels::findOrFail($id);
        $personnels->delete();
    }
}
