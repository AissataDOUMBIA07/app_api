<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\agence;
use App\Models\Salle;
use App\Models\personels;
use App\Models\Formation;

class FormationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Get(
     * path="/api/formations",
     * summary="Get a list of formations",
     * tags={"Formation"},
     * @OA\Response(
     * response=200,
     * description="List of formations",
     * ),
     * )
     */
    public function index()
    {
        $formations = Formation::all();
        return $formations->toJson(JSON_PRETTY_PRINT);
    }

    /**
      * @OA\POST(
     * path="/api/formations",
     * summary="POST to create formations",
     * tags={"Formation"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="libelle", type="string"),
 *             @OA\Property(property="lieu", type="string"),
 *             @OA\Property(property="datedebut", type="date"),
 *             @OA\Property(property="datefin", type="date"),
 *             @OA\Property(property="agence_id", type="integer"),
 *             @OA\Property(property="salle_id", type="integer"),
 *             @OA\Property(property="personnel_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create formations",
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
        $formations=Formation::create($request->all());
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
     *   path="/api/formations/{id}",
     *   summary="Update an formations",
     *   tags={"Formation"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the formations to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="libelle", type="string"),
     *       @OA\Property(property="lieu", type="string"),
     *       @OA\Property(property="datedebut", type="date"),
     *       @OA\Property(property="datefin", type="date"),
     *       @OA\Property(property="agence_id", type="integer"),
     *       @OA\Property(property="salle_id", type="integer"),
     *       @OA\Property(property="personnel_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Formation updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Formation not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $formations=Formation::findOrFail($id);

        if($formations->update($request->all())){
            return response()->json([
                'message'=>'Formation updated successfully'
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
     *   path="/api/formations/{id}",
     *   summary="Delete an formations",
     *   tags={"Formation"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the formations to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="formations deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="formations not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $formations=Formation::findOrFail($id);
        $formations->delete();
    }
}
