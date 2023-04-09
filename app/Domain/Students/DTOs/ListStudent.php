<?php

namespace App\Domain\Students\DTOs;

class ListStudent
{
    public string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public string $code;
    public string $name;
    public string $phone;
    public string $parent;
    public string $staff;
    public string $grade;
    public string $gradeStatus;
    public string $invoiceStatus;
    public string $role;

    public function __construct()
    {
        $this->staff = "-";
        $this->grade = "-";

        $this->gradeStatus = "Chưa học";
        $this->status = "Chưa học";
        $this->invoiceStatus = "Chưa học";
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * @param string $parent
     */
    public function setParent(string $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getStaff(): string
    {
        return $this->staff;
    }

    /**
     * @param string $staff
     */
    public function setStaff(string $staff): void
    {
        $this->staff = $staff;
    }

    /**
     * @return string
     */
    public function getGrade(): string
    {
        return $this->grade;
    }

    /**
     * @param string $grade
     */
    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }

    /**
     * @return string
     */
    public function getGradeStatus(): string
    {
        return $this->gradeStatus;
    }

    /**
     * @param string $gradeStatus
     */
    public function setGradeStatus(string $gradeStatus): void
    {
        $this->gradeStatus = $gradeStatus;
    }

    /**
     * @return string
     */
    public function getInvoiceStatus(): string
    {
        return $this->invoiceStatus;
    }

    /**
     * @param string $invoiceStatus
     */
    public function setInvoiceStatus(string $invoiceStatus): void
    {
        $this->invoiceStatus = $invoiceStatus;
    }
}
