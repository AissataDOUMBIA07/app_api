<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\agence;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     /**
     * @OA\Get(
     * path="/api/clients",
     * summary="Get a list of clients",
     * tags={"Client"},
     * @OA\Response(
     * response=200,
     * description="List of clients",
     * ),
     * )
     */


    public function index()
    {
        $clients=Client::all();
        return $clients->toJson(JSON_PRETTY_PRINT);
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
     * path="/api/clients",
     * summary="POST to create clients",
     * tags={"Client"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="fullname", type="string"),
 *             @OA\Property(property="conatct", type="string"),
 *             @OA\Property(property="adresse", type="string"),
 *             @OA\Property(property="age", type="integer"),
 *             @OA\Property(property="agence_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create clients",
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
        $clients=Client::create($request->all());
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
     *   path="/api/clients/{id}",
     *   summary="Update an clients",
     *   tags={"Client"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the clients to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="fullname", type="string"),
     *       @OA\Property(property="conatct", type="integer"),
     *       @OA\Property(property="adresse", type="string"),
     *       @OA\Property(property="age", type="integer"),
     *       @OA\Property(property="agence_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Client updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Client not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $clients=Client::findOrFail($id);

        if($clients->update($request->all())){
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
     *   path="/api/clients/{id}",
     *   summary="Delete an agence",
     *   tags={"Client"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the clients to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="clients deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="clients not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $clients=Client::findOrFail($id);
        $clients->delete();
    }
}
