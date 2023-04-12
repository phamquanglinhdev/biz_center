<?php

namespace App\Domain\Staffs\Contract;

interface StaffRepositoryInterface
{
    public function list();

    public function create($staffStoreDto);

    public function show($id);

    public function update($id, $staffUpdateDto);

    public function delete($id);
}
