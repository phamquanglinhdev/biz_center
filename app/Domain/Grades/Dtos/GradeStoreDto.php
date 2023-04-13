<?php

namespace App\Domain\Grades\Dtos;

class GradeStoreDto
{
    private string $thumbnail;
    private string $name;
    private string $program;
    private int $time;
    private int $lessons;
    private int $status;

    /**
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getLessons(): int
    {
        return $this->lessons;
    }

    /**
     * @return int
     */
    public function getProgram(): string
    {
        return $this->program;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    public function __construct()
    {
        $this->thumbnail = "https://i.pinimg.com/236x/0f/4f/55/0f4f55fbb092d217cb6bc42250941c44.jpg";
    }

    public function setProperty($propertyName, $value): void
    {
        $this->{$propertyName} = $value;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function toArray()
    {
        return [
            'thumbnail' => $this->getThumbnail(),
            'name' => $this->getName(),
            'program' => $this->getProgram(),
            'lessons' => $this->getLessons(),
            'time' => $this->getTime(),
            'status' => $this->getStatus(),
        ];
    }


}
