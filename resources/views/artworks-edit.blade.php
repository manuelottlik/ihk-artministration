@extends('layouts.app') 
@section('content')

<div class="card">
    <div class="card-header">
        @if($artwork->id) Kunstwerk bearbeiten @else Kunstwerk erstellen @endif
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('artworks.store')}}" method="post" id="aw-edit" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{$artwork->id}}">

            <div class="form-group">
                <label>Bild</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="aw-file" name="file">
                    <label class="custom-file-label text-truncate" for="aw-file">Bild auswählen</label>
                </div>
            </div>
            <div class="form-group">
                <label for="aw-name">Name</label>
                <input type="text" name="name" id="aw-name" value="{{$artwork->name}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="aw-location">Ort</label>
                <input type="text" name="location" id="aw-location" value="{{$artwork->location}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="aw-description">Beschreibung</label>
                <textarea name="description" id="aw-description" class="form-control">{{$artwork->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="aw-collection">Sammlung</label> @if (!count($collections))
                <div class="alert alert-danger">Sie müssen eine <a href="{{route('collections.create')}}">Sammlung erstellen</a>, bevor Sie ein Kunstwerk
                    hinzufügen können!
                </div>
                @else @foreach ($collections as $collection)
                <select class="custom-select" id="aw-collection" name="collection_id">
                @if ($collection->id == $artwork->collection_id)
                <option value="{{$collection->id}}" selected>{{$collection->name}}</option>
                @else
                    <option value="{{$collection->id}}">{{$collection->name}}</option>
                @endif

                @endforeach
            </select> @endif
            </div>

            <div class="form-group">
                <label for="aw-artist">Künstler</label> @if (!count($artists))
                <div class="alert alert-danger">Sie müssen einen <a href="{{route('artists.create')}}">Künstler erstellen</a>, bevor Sie ein Kunstwerk hinzufügen
                    können!
                </div>
                @else @foreach ($artists as $artist)
                <select class="custom-select" id="aw-artist" name="artist_id">
                            @if ($artist->id == $artwork->collection_id)
                            <option value="{{$artist->id}}" selected>{{$artist->name}}</option>
                            @else
                                <option value="{{$artist->id}}">{{$artist->name}}</option>
                            @endif

                            @endforeach
                        </select> @endif
            </div>
            <div class="form-row">

                <div class="col">
                    <div class="form-group">
                        <label for="aw-meas_x">Breite</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" name="meas_x" id="aw-meas_x" value="{{$artwork->meas_x}}">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="aw-meas_y">Höhe</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" name="meas_y" id="aw-meas_y" value="{{$artwork->meas_y}}">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="aw-meas_z">Tiefe</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" name="meas_z" id="aw-meas_z" value="{{$artwork->meas_z}}">
                            <div class="input-group-append">
                                <span class="input-group-text">cm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="aw-value">Wert in Euro</label>

                <div class="input-group">

                    <input type="number" class="form-control" min="0" name="value" id="aw-value" value="{{$artwork->value}}">
                    <div class="input-group-append">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="aw-published_at">Datum der Veröffentlichung</label>
                <input type="date" name="published_at" id="aw-published_at" max="{{ now()->format('Y-m-d') }}" value="{{optional($artwork->published_at)->format('Y-m-d')}}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="aw-purchased_at">Datum des Kaufes</label>
                <input type="date" name="purchased_at" id="aw-purchased_at" max="{{ now()->format('Y-m-d') }}" value="{{optional($artwork->purchased_at)->format('Y-m-d')}}"
                    class="form-control">
            </div>


        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-sm btn-success float-right" form="aw-edit">Kunstwerk speichern</button>
    </div>
</div>
<script>
    $(function() {
    $('#aw-file').change(function() {
        $('label[for="aw-file"]').html($(this)[0].files[0].name);
    });
});

</script>
@endsection