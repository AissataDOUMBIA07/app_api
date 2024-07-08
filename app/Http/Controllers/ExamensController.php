<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\agence;
use App\Models\Examen;

class ExamensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      /**
     * @OA\Get(
     * path="/api/examens",
     * summary="Get a list of examens",
     * tags={"Examen"},
     * @OA\Response(
     * response=200,
     * description="List of examens",
     * ),
     * )
     */
    public function index()
    {
        $examens=Examen::all();
        return $examens->toJson(JSON_PRETTY_PRINT);
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
     * path="/api/examens",
     * summary="POST to create examens",
     * tags={"Examen"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="type", type="string"),
 *             @OA\Property(property="lieu", type="string"),
 *             @OA\Property(property="heure", type="heure"),
 *             @OA\Property(property="date", type="date"),
 *             @OA\Property(property="agence_id", type="integer")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create examens",
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
        $examens=Examen::create($request->all());
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
     *   path="/api/examens/{id}",
     *   summary="Update an examens",
     *   tags={"Examen"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the examens to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="type", type="string"),
     *       @OA\Property(property="lieu", type="string"),
     *       @OA\Property(property="heure", type="heure"),
     *       @OA\Property(property="date", type="date"),
     *       @OA\Property(property="agence_id", type="integer")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Examen updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Examen not found"
     *   )
     * )
     */
    public function update(Request $request, $id)
    {
        $examens=Examen::findOrFail($id);

        if($examens->update($request->all())){
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
     *   path="/api/examens/{id}",
     *   summary="Delete an examens",
     *   tags={"Examen"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the examens to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="examens deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="examens not found"
     *   )
     * )
     */
    public function destroy($id)
    {
        $examens=Examen::findOrFail($id);
        $examens->delete();
    }
}
