<?php

namespace App\GraphQL\Mutations\Bales;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Models\Bale;

class CreateBale
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
        $bale = new Bale;
        
        $bale->number = $args['number'];
        $bale->grade_id = $args['grade_id'];
        $bale->weight_at_reception = $args['weight_at_reception'];
        $bale->farmer_id = $args['farmer_id'];
        $bale->balereception_id = $args['balereception_id'];
        $bale->creation_date = $args['creation_date'];
        $bale->state = 'reception';

        $bale->save();

        return ['bale' => $bale];
    }
}
