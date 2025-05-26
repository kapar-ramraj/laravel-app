<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\BookLoan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateBookLoanStatusReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-book-loan-status-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $books = Book::all();
        foreach ($books as $book) {
            $bookStatusCount = BookLoan::select(
                'book_id',
                DB::raw('COUNT(CASE WHEN status = "borrowed" THEN 1 END) as status_borrowed'),
                DB::raw('COUNT(CASE WHEN status = "returned" THEN 1 END) as status_returned'),
                DB::raw('COUNT(CASE WHEN status = "overdue" THEN 1 END) as status_overdue')
            )
                ->where('book_id', $book->id)
                ->groupBy('book_id')
                ->first();

            if ($bookStatusCount) {
                $bookStatus = $book->quantity - ($bookStatusCount->status_borrowed + $bookStatusCount->status_overdue);
                if ($bookStatus < 0) {
                    if ($bookStatusCount->status_overdue >= abs($bookStatus)) {
                        BookLoan::where('book_id', $book->id)->where('status', 'overdue')->update(['status' => 'returned']);
                    } else {
                        BookLoan::where('book_id', $book->id)->where('status', 'overdue')->update(['status' => 'returned']);

                        $neededMore = abs($bookStatus) - $bookStatusCount->status_overdue;

                        $bookIds = BookLoan::where('status', 'borrowed')->take($neededMore)->pluck('id');

                        BookLoan::whereIn('id', $bookIds)->update(['status' => 'returned']);
                    }
                }
            }
        }
    }
}
