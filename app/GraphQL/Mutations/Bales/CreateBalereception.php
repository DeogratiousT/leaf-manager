<?php

namespace App\GraphQL\Mutations\Bales;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\Balereception;

class CreateBalereception
{
    /**
     * Return a value for the field.
     *
     * @param  @param  null  $root Always null, since this field has no parent.
     * @param  array<string, mixed>  $args The field arguments passed by the client.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Shared between all fields.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Metadata for advanced query resolution.
     * @return mixed
     */
    public function __invoke($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $balereception =  Balereception::create([
            'station_id' => $args['station_id'],
            'store_id' => $args['store_id'],
            'number_of_bales' => $args['number_of_bales'],
            'officer' => $args['officer'],
            'farmer_id' => $args['farmer_id']
        ]);

        return [ 'balereception' => $balereception];
    }
}
