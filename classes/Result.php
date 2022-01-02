<?php

class Result
{
    protected $id;
    protected $name;
    protected $grades = [];
    protected $averageGrade;
    protected $ifPass;

    public function __construct($id, $name, array $grades, $averageGrade, $ifPass)
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->grades       = $grades;
        $this->averageGrade = $averageGrade;
        $this->ifPass       = $ifPass;
    }

    /**
     *  Get array formated result
     *
     * @return array
     */
    public function getArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'grades' => $this->grades,
            'average' => $this->averageGrade,
            'pass' => $this->ifPass ? 'Pass' : 'Fail',
        ];
    }
}
