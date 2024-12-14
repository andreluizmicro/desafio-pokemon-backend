<?php

declare(strict_types=1);

namespace Core\Infrastructure\Http\Controller;

use App\Http\Controllers\Controller;
use Core\Application\UseCase\Pokemon\FetchPokemon\FetchPokemonInputDto;
use Core\Application\UseCase\Pokemon\FetchPokemon\FetchPokemonUseCase;
use Core\Application\UseCase\Pokemon\ListPokemon\ListPokemonsInputDto;
use Core\Application\UseCase\Pokemon\ListPokemon\ListPokemonsUseCase;
use Core\Infrastructure\Http\Resources\PokemonResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class PokemonController extends Controller
{
    public function __construct(
        protected FetchPokemonUseCase $fetchPokemonUseCase,
        protected ListPokemonsUseCase $listPokemonsUseCase,
    ) {
    }

    public function list(Request $request): JsonResponse
    {

        $output = $this->listPokemonsUseCase->execute(
            inputDto: new ListPokemonsInputDto(
                offset: (int) $request->get('offset', 0),
                limit: (int) $request->get('limit', 10),
            )
        );

       return (new PokemonResource($output))->response();
    }

    public function fetch(Request $request): JsonResponse
    {
        try {
            $output = $this->fetchPokemonUseCase->execute(
                inputDto: new FetchPokemonInputDto(
                    id: (int) $request->route('id')
                )
            );

            return response()->json([
                'id' => $output->id,
                'name' => $output->name,
                'types' => $output->types,
                'heigth' => $output->height,
                'weight' => $output->weight,
            ]);
        } catch (Throwable $exception) {
            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
