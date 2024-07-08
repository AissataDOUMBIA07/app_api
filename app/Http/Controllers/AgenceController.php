<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\agence;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AgenceController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Info(
        * title="API Auto Ecole documentation",
        * version="1.0.0",
        * )
     * @OA\Get(
     * path="/api/agence",
     * summary="Get a list of agences",
     * tags={"agences"},
     * @OA\Response(
     * response=200,
     * description="List of agences",
     * ),
     * )
     */
    public function index()
    {
        $agences = agence::all();

        return $agences->toJson(JSON_PRETTY_PRINT);
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
     * path="/api/agence",
     * summary="POST to create agences",
     * tags={"agences"},
     *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="fullname", type="string"),
 *             @OA\Property(property="email", type="email"),
 *             @OA\Property(property="password", type="password"),
 *             @OA\Property(property="adresse", type="string"),
 *             @OA\Property(property="phone", type="string"),
 *             @OA\Property(property="inmmatriculation", type="string")
 *         )
 *     ),
  *     @OA\Response(
 *         response=200,
 *         description="Create agences",
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
    // $agences = agence::create($request->all());
    // Validation des données
    $validatedData = $request->validate([
        'fullname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
        'adresse' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'inmmatriculation' => 'required|string|max:255'
    ]);

    // Cryptage du mot de passe
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Création de l'agence avec les données validées
    $agences = agence::create($validatedData);


    $response = array_merge($request->all(), ['id' => $agences->id]);

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
        // <table>
        //     <thead>
        //         <th></th>
        //         <th></th>
        //         <th></th>
        //         <th></th>
        //     </thead>
        //     <tbody>
        //         <tr>
        //             <td></td>
        //             <td></td>
        //             <td></td>
        //             <td></td>
        //         </tr>
        //     </tbody>
        // </table>
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
     *   path="/api/agence/{id}",
     *   summary="Update an agence",
     *   tags={"agences"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the agence to update"
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(
     *       type="object",
     *       @OA\Property(property="fullname", type="string"),
     *       @OA\Property(property="email", type="string"),
     *       @OA\Property(property="password", type="string"),
     *       @OA\Property(property="adresse", type="string"),
     *       @OA\Property(property="phone", type="string"),
     *       @OA\Property(property="inmmatriculation", type="string")
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Agence updated successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Agence not found"
     *   )
     * )
     */
    public function update(Request $request,  $id)
    {
        try {

            $agence = agence::findOrFail($id);
            // Validation des données
            $validatedData = $request->validate([
                'fullname' => 'string|max:255',
                'email' => 'string|max:255',
                'password' => 'string|max:255',
                'adresse' => 'string|max:255',
                'phone' => 'string|max:255',
                'inmmatriculation' => 'required|string|max:255',
                // Ajoutez d'autres règles de validation selon vos besoins
            ]);

            // Remplir l'objet agence avec les nouvelles données
            $agence->fill($validatedData);

            // Enregistrer les modifications
            if ($agence->save()) {
                return response()->json([
                    'success' => 'Les informations ont été modifiées avec succès'
                ], 200);
            } 

        } catch (\Exception $e) {
            // Log l'erreur pour le débogage
            \Log::error('Exception capturée: ' . $e->getMessage());

            // Retourner une réponse JSON avec le type d'erreur
            return response()->json([
                'error' => 'Une erreur s\'est produite lors de la mise à jour des informations',
                'type' => get_class($e),  // Obtient le nom de la classe de l'exception
                'message' => $e->getMessage()
            ], 500);
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
     *   path="/api/agence/{id}",
     *   summary="Delete an agence",
     *   tags={"agences"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(type="integer"),
     *     description="ID of the agence to delete"
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Agence deleted successfully"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Agence not found"
     *   )
     * )
     */
    public function destroy( $id)
    {
        $agence = agence::findOrFail($id);
        $agence->delete();
    }
}
