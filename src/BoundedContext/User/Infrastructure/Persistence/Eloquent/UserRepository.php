<?php


namespace Src\BoundedContext\User\Infrastructure\Persistence\Eloquent;

use Src\BoundedContext\User\Domain\{
    User,
    Users,
    UserAlreadyExists,
    UserRepository as UserRepositoryContract,
    ValueObjects\UserId,
};

use Src\Shared\Infrastructure\Persistence\Eloquent\EloquentException;
use Exception;
use Illuminate\Support\Facades\DB;

final class UserRepository implements UserRepositoryContract {

    public function __construct(private UserModel $model) {}

    private function toDomain(UserModel $eloquentUserModel): User {

        return User::fromPrimitives(
            $eloquentUserModel->id,
            $eloquentUserModel->name,
            $eloquentUserModel->email,
            $eloquentUserModel->password
        );
    }


    public function find(UserId $id): ?User {
        $userModel = $this->model->find($id->value());

        if (null === $userModel) {
            return null;
        }

        return $this->toDomain($userModel);
    }


    public function list(): Users {

        $eloquentUsers = $this->model->all();

        $users = $eloquentUsers->map(
            function (UserModel $eloquentUser){
                return $this->toDomain($eloquentUser);
            }
        )->toArray();

        return new Users($users);
    }

    public function save(User $user): void
    {
        $userModel = $this->model->find($user->id()->value());

        if(null === $userModel){

            $userModel = new UserModel();
            $userModel->id = $user->id()->value();
        }

        $userModel->name = $user->name()->value();
        $userModel->email = $user->email()->value();
        $userModel->password = $user->password()->value();

        DB::beginTransaction();

        try{


            $userModel->save();

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();

            throw new EloquentException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious(),
            );
        }
    }



    public function delete(UserId $id): void
    {
        $user = $this->model->findOrFail($id->value());

        $user->delete();
    }

}
