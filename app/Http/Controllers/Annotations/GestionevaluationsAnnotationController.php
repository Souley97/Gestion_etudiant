<?php

namespace App\Http\Controllers\Annotations ;

/**
 * @OA\Security(
 *     security={
 *         "BearerAuth": {}
 *     }),

 * @OA\SecurityScheme(
 *     securityScheme="BearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"),

 * @OA\Info(
 *     title="Your API Title",
 *     description="Your API Description",
 *     version="1.0.0"),

 * @OA\Consumes({
 *     "multipart/form-data"
 * }),

 *

 * @OA\POST(
 *     path="/api/evaluations/note/{etudiantId}/{matiereId}",
 *     summary="Ajouter note pour un etudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="201", description="Created successfully"),
 * @OA\Response(response="400", description="Bad Request"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 *     @OA\Parameter(in="path", name="etudiantId", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="path", name="matiereId", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 type="object",
 *                 properties={
 *                     @OA\Property(property="date", type="string"),
 *                     @OA\Property(property="value", type="integer"),
 *                     @OA\Property(property="matiereId", type="integer"),
 *                     @OA\Property(property="etudiantId", type="integer"),
 *                     @OA\Property(property="created_at", type="string"),
 *                     @OA\Property(property="updated_at", type="string"),
 *                 },
 *             ),
 *         ),
 *     ),
 *     tags={"Gestion evaluations"},
*),


 * @OA\DELETE(
 *     path="/api/evaluations/{evaluationId}",
 *     summary="Supprimer note pour un étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="204", description="Deleted successfully"),
 * @OA\Response(response="401", description="Unauthorized"),
 * @OA\Response(response="403", description="Forbidden"),
 * @OA\Response(response="404", description="Not Found"),
 *     @OA\Parameter(in="path", name="evaluationId", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"Gestion evaluations"},
*),


 * @OA\PUT(
 *     path="/api/evaluations/{evaluationId}",
 *     summary=" Modifier note pour étudiant",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="path", name="evaluationId", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/x-www-form-urlencoded",
 *             @OA\Schema(
 *                 type="object",
 *                 properties={
 *                     @OA\Property(property="value", type="string"),
 *                 },
 *             ),
 *         ),
 *     ),
 *     tags={"Gestion evaluations"},
*),


 * @OA\GET(
 *     path="/api/evaluations/",
 *     summary="Voir liste des notes",
 *     description="",
 *         security={
 *    {       "BearerAuth": {}}
 *         },
 * @OA\Response(response="200", description="OK"),
 * @OA\Response(response="404", description="Not Found"),
 * @OA\Response(response="500", description="Internal Server Error"),
 *     @OA\Parameter(in="header", name="User-Agent", required=false, @OA\Schema(type="string")
 * ),
 *     tags={"Gestion evaluations"},
*),


*/

 class GestionevaluationsAnnotationController {}
