<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\VoituresController;

use Illuminate\Http\Request;

use App\Models\agence;
use\App\Models\personels;
use\App\Models\Voiture;

class VoituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Get(
     * path="/api/voitures",
     * summary="Get a list of voitures",
     * tags={"Voiture"},
     * @OA\Response(
     * response=200,
     * description="List of voitures",
     * ),
     * )
     */
    public function index()
    {
        $voitures=Voiture::all();
        return $voitures->toJson(JSON_PRETTY_PRINT);
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
     * @OA\POST(
     * path="/api/voitures",
     * summary="POST to create voitures",
     * tags={"Voiture"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="libelle", type="string"),
 *             @OA\Property(property="nombreplace", type="integer"),
 *             @OA\Property(property="matricule", type="string"),
 *             @OA\Property(property="marque", type="string"),
 *             @OA\Property(property="couleur", type="string"),
 *             @OA\Property(property="agence_id", type="integer"),
 *             @OA\Property(property="personnel_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create voitures",
 *         @OA\JsonContent(
 *             type="object"
 *         )
 *     )
     * )
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voitures=Voiture::create($request->all());
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
     *   path="/api/voitures/{id}",
     *   summary="Update an voitures",
     *   tags={"Voiture"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the voitures to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="libelle", type="string"),
     *       @OA\Property(property="nombreplace", type="integer"),
     *       @OA\Property(property="matricule", type="string"),
     *       @OA\Property(property="marque", type="string"),
     *       @OA\Property(property="couleur", type="string"),
     *       @OA\Property(property="agence_id", type="integer"),
     *       @OA\Property(property="personnel_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Voiture updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Voiture not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $voitures=Voiture::findOrFail($id);
        if($voitures->update($request->all())){
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
     *   path="/api/voitures/{id}",
     *   summary="Delete an voitures",
     *   tags={"Voiture"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the voitures to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="voitures deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="voitures not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $voitures=Voiture::findOrFail($id);
        $voitures->delete();
    }
}
