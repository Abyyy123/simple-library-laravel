<?php

// File: app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
// Tambahkan untuk validasi
use Illuminate\Validation\Rule; 

class BookController extends Controller
{
    // Fungsi: index() -> menampilkan semua data buku
    public function index()
    {
        $books = Book::all();
        return response()->json($books); // Kembalikan dalam format JSON
    }

    // Fungsi: store() -> menyimpan data buku baru
    public function store(Request $request)
    {
        // --- 6. Bonus (Validasi) ---
        $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y'), // Tahun angka & tidak lebih besar dari tahun sekarang
        ]);
        // ---------------------------

        $book = Book::create($request->all());
        return response()->json($book, 201); // 201 Created
    }

    // Fungsi: show($id) -> menampilkan detail 1 buku
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    // Fungsi: update($id) -> mengubah data buku
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        // --- 6. Bonus (Validasi) ---
        $request->validate([
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'year' => 'nullable|integer|max:' . date('Y'),
        ]);
        // ---------------------------

        $book->update($request->all());
        return response()->json($book);
    }

    // Fungsi: destroy($id) -> menghapus data buku
    public function destroy(string $id)
    {
        Book::findOrFail($id)->delete();
        // Berikan respon sukses tanpa konten (204 No Content)
        return response()->json(null, 204); 
    }
}
