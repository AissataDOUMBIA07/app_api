<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permis;
use App\Models\agence;
use App\Models\Client;

class PermisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     /**
     * @OA\Get(
     * path="/api/permis",
     * summary="Get a list of permis",
     * tags={"Permis"},
     * @OA\Response(
     * response=200,
     * description="List of permis",
     * ),
     * )
     */
    public function index()
    {
        $permis=Permis::all();
        return $permis->toJson(JSON_PRETTY_PRINT);
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
     * path="/api/permis",
     * summary="POST to create permis",
     * tags={"Permis"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="type", type="string"),
 *             @OA\Property(property="date", type="date"),
 *             @OA\Property(property="agence_id", type="integer"),
 *             @OA\Property(property="client_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create permis",
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
        $permis=Permis::create($request->all());
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
     *   path="/api/permis/{id}",
     *   summary="Update an permis",
     *   tags={"Permis"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the permis to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="type", type="string"),
     *       @OA\Property(property="date", type="date"),
     *       @OA\Property(property="agence_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Permis updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Permis not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $permis=Permis::findOrFail($id);

        if($permis->update($request->all())){
            return response()->json([
                'message' => 'succes'
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
     *   path="/api/permis/{id}",
     *   summary="Delete an permis",
     *   tags={"Permis"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the permis to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="permis deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="permis not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $permis=Permis::findOrFail($id);
        $permis->delete();
    }
}
