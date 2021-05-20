@if(session()->has('success'))
<p> {{ session()->get('success') }}</p>
@endif
<form action=" {{ route('book_update', $book->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <label for="code">Kode Buku :</label>
    <input type="text" name="code">
    @if ($errors->has('code'))
    <span class="text-danger">{{ $errors->first('code') }}</span>
    @endif
    <br>

    <label for="kind_id">Choose a Kindbook:</label>
    <select name="kind_id" id="kind_id">
        @forelse ($kinds as $kind)
        @if ($kind->id === $book->kind_id)
        <option value="{{ $book->kind_id }}" selected>{{ $kind->name }}</option>
        @else
        <option value="{{ $kind->id }}">{{ $kind->name }}</option>
        @endif
        @empty
        <option value="" hidden>Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('kind_id'))
    <span class="text-danger">{{ $errors->first('kind_id') }}</span>
    @endif
    <br>

    <label for="category_id">Choose a Category:</label>
    <select name="category_id" id="category_id">
        @forelse ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @empty
        <option value="" hidden>Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('category_id'))
    <span class="text-danger">{{ $errors->first('category_id') }}</span>
    @endif
    <br>

    <label for="writer_id">Choose a Writer:</label>
    <select name="writer_id" id="writer_id">
        @forelse ($writers as $writer)
        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
        @empty
        <option value="" hidden>Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('writer_id'))
    <span class="text-danger">{{ $errors->first('writer_id') }}</span>
    @endif
    <br>

    <label for="publisher_id">Choose a Publisher:</label>
    <select name="publisher_id" id="publisher_id">
        @forelse ($publishers as $publisher)
        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
        @empty
        <option value="" hidden>Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('publisher_id'))
    <span class="text-danger">{{ $errors->first('publisher_id') }}</span>
    @endif
    <br>

    <label for="grade_id">Choose a Grade:</label>
    <select name="grade_id" id="grade_id">
        <option value="0">Tidak Mempunyai Kelas</option>
        @forelse ($grades as $grade)
        <option value="{{ $grade->id }}">{{ $grade->level }}</option>
        @empty
        <option value="" hidden>Kosong</option>
        @endforelse
    </select>
    @if ($errors->has('grade_id'))
    <span class="text-danger">{{ $errors->first('grade_id') }}</span>
    @endif
    <br>

    <label for="title">Title:</label>
    <input type="text" name="title">
    @if ($errors->has('title'))
    <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
    <br>

    <label for="description">Description:</label>
    <input type="text" name="description">
    @if ($errors->has('description'))
    <span class=" text-danger">{{ $errors->first('description') }}</span>
    @endif
    <br>

    <label for="image">Image:</label>
    <input type="file" name="image">
    @if ($errors->has('image'))
    <span class="text-danger">{{ $errors->first('image') }}</span>
    @endif
    <br>

    {{-- Hidden Avaibilaibility --}}
    <label for="availability">Avaibility:</label>
    <select name="availability" id="availability">
        <option value="1">Tersedia</option>
        <option value="0">Habis</option>
    </select>
    @if ($errors->has('availability'))
    <span class="text-danger">{{ $errors->first('availability') }}</span>
    @endif
    <br>

    <label for="isbn">ISBN :</label>
    <input type="text" name="isbn">
    @if ($errors->has('isbn'))
    <span class="text-danger">{{ $errors->first('isbn') }}</span>
    @endif
    <br>

    <button type="submit">Edit</button>
</form>
