<?php

namespace KaanTanis\Coderator;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Coderator
 */
class Coderator
{
    /**
     * @var string|null
     */
    private ?string $prefix = null;
    /**
     * @var string|Model
     */
    private string|Model $model;
    /**
     * @var string
     */
    private string $field;
    /**
     * @var int|null
     */
    private ?int $length = null;

    /**
     * @param $model
     * @return $this
     */
    public function model($model): static
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param string $field
     * @return $this
     */
    public function field(string $field): static
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function prefix(string $prefix): static
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @param int|null $length
     * @return $this
     */
    public function length(?int $length): static
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function random(): string
    {
        if ($this->length == null) {
            $this->length = config('coderator.length');
        }

        return $this->prefix . Str::upper(Str::random($this->length));
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        $code = $this->random();
        $model = $this->model;

        // if code exists, generate new one
        while ($model::query()->where($this->field, $code)->exists()) {
            $code = $this->generate();
        }

        return $code;
    }
}
