<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class BookLoanStatus implements Rule
{
    protected $userId;
    protected $status;

    public function __construct($userId, $status = '')
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
        // $value is the book_id
        $exists = DB::table('book_loans')
            ->where('user_id', $this->userId)
            ->where('book_id', $value)
            ->where('status', $this->status)
            ->exists();

        return !$exists;
    }

    public function message()
    {
        return 'This user has already borrowed this book and has not returned it yet.';
    }
}
