<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Salle;
use App\Models\agence;//pour l'id de l'agence dans salle

class SallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Get(
     * path="/api/salles",
     * summary="Get a list of salles",
     * tags={"Salle"},
     * @OA\Response(
     * response=200,
     * description="List of salles",
     * ),
     * )
     */
    public function index()
    {
        $salles = Salle::all();
        return $salles->toJson(JSON_PRETTY_PRINT);
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
     * path="/api/salles",
     * summary="POST to create salles",
     * tags={"Salle"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="libelle", type="string"),
 *             @OA\Property(property="nombreplace", type="integer"),
 *             @OA\Property(property="agence_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create salles",
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
        $salles=Salle::create($request->all());
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
     *   path="/api/salles/{id}",
     *   summary="Update an salles",
     *   tags={"Salle"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the salles to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="libelle", type="string"),
     *       @OA\Property(property="nombreplace", type="integer"),
     *       @OA\Property(property="agence_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Salle updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Salle not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $salles=Salle::findOrFail($id);

        if($salles->update($request->all())){
            return response()->json([
                'message'=>'Salle updated successfully'
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
     *   path="/api/salles/{id}",
     *   summary="Delete an salles",
     *   tags={"Salle"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the salles to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="salles deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="salles not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $salles=Salle::findOrFail($id);
        $salles->delete();
    }
}
