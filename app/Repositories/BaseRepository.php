<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * Retorna todos los registros
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
    /**
     * Retorna un registro por su id
    */
    public function find($id)
    {
        return $this->model->find($id);
    }
    /**
     * Guarda la instancia del modelo en la base de datos
    */
    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }
    /**
     * Elimina un registro de la base de datos
    */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
