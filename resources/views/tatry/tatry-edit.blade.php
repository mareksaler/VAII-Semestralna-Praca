@extends('layouts.layout')

@section('head')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
@endsection


@section('main')
<div class="container-lg bleda mt-3 pt-3 pb-3">
    <div class="row">
        <div class="col-12">
            <h1 class="zarovanaj-na-sted">Uprav túru</h1>
        </div>
    </div>

    @include('includes.flash-message')

    <form action="{{ route('hikes.update', $hike) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- Nazov --}}
        <div class="row pb-2  justify-content-center">
            <div class="col-md-6">
                <label for="nazov" class="form-label">Názov</label>
                <input type="text" class="form-control" value="{{ $hike->title }}" id="nazov" placeholder="Nazov" name="title" required minlength="3" maxlength="100">
            </div>
            @error('title')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Obrazok --}}
        <div class="row pb-2 justify-content-center">
            <div class="col-md-6">
                <label for="formFile" class="form-label">Obrazok</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>
            @error('image')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Dlzka tury --}}
        <div class="row pb-2 justify-content-center">
            <div class="col-md-6">
                <label for="dlzka" class="form-label">Dĺžka túry (v km):</label>
                <input type="number" id="dlzka" value="{{ $hike->distance }}" name="dlzka" class="form-control" step="0.01" min="0.01" max="100">
            </div>
            @error('distance')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Cas tury --}}
        <div class="row pb-2 justify-content-center">
            <div class="col-md-6">
                <label for="cas" class="form-label">Čas túry (v hod):</label>
                <input type="number" id="cas" name="cas" value="{{ $hike->time }}" class="form-control" step="0.1" min="0.1" max="100">
            </div>
            @error('time')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kategoria/area --}}
        <div class="row pb-2 justify-content-center">
            <div class="col-md-6">
                <label for="area" class="form-label">Kategória:</label>
                <select class="form-select" aria-label="Default select example" name="area" id="area">
                    @foreach ($categories as $category)
                    @if ($category === $hike->category_id)
                    <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @error('category_id')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>


        {{-- Obsah --}}
        <div class="row pb-2  justify-content-center">
            <div class="col-md-6">
                <label for="body" class="form-label">Obsah</label>
                <textarea class="form-control" placeholder="Obsah..." id="body" name="body" minlength="5">{!! $hike->text !!}</textarea>
            </div>
            @error('body')
            <p style="color: red; margin-bottom: 25px;">{{ $message }}</p>
            @enderror
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Upraviť</button>
                <!-- Button -->
            </div>
        </div>

    </form>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ URL::asset('js/javascript.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
