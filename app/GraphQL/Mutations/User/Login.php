<?php

namespace App\GraphQL\Mutations\User;

use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\GraphQL\Exceptions\AuthenticationException;

class Login
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
        $user = User::where('email', $args['email'])->firstOrFail();

        $user->tokens()->delete();
    
        if (! $user || ! Hash::check($args['password'], $user->password)) {
            throw new AuthenticationException('Authentication exception', 'Incorrect username or password');
        }

        $request = $user->createToken('access_token')->plainTextToken;

        return [
            'access_token' => $request,
            'user' => $user,
        ];

    }
}
